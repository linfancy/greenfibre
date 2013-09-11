<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }

    public function about(){
        $this->display();
    }

    public function contact(){
        $this->display();
    }

    public function advice(){
    	 $this->display();
    }

    public function product(){
        $this->display();
    }

    public function introduce(){
        $language = $this->_get('l');
        $product_type = $this->_get('type');
        if(!isset($language)&&empty($language)){$language = 'zh-cn';}
        if(!isset($product_type)&&empty($product_type)){$product_type = 1;}
        $model = D('Passage');
        $result = $model -> getIntroduce($language,$product_type);
        $result['banner']=explode(':', $result['banner']);
        $result['line2_spic']=explode(':', $result['line2_spic']);
        $this->assign('result',$result);
        $this->display();
    }

    public function doAdvice(){
    	if(isset($_POST)){
            $cookie = session('userip');
            if(!session('userip')){
                session(array('expire'=>3600*2));
                session('userip',get_client_ip());
                $name = $this->_post('q_name');
                $address = $this->_post('q_add');
                $tel = $this->_post('q_tel');
                $email = $this->_post('q_mail');
                $userip=get_client_ip();
                $msg = nl2br(str_replace(' ', '&nbsp;', $this->_post('q_msg')));;
                $model=D('Admin');
                $toEmail = $model->getEmail();
                $subject = $name.'的意见信';
                $body = "用户：".$name."<br>地址：".$address."<br>电话：".$tel."<br>邮箱：".$email."<br>用户ip：".$userip."<br>意见：<br>".$msg;
                $result = $this->sendEmail($toEmail,$subject,$body);
                if($result){
                    $this->saveQuote($name,$tel,$email,$address,$userip,$msg);
                    $this->ajaxReturn('','您的意见已发送至管理员邮箱',1);
                }else {
                    session('userip',null);
                    $this->ajaxReturn('','您的意见发送失败',0);
                    
                }
            }else{
                $this->ajaxReturn('','您已发送过意见，请于两个小时之后再进行发送',0);
            }
    		
    	}
    	

    }

    public function sendEmail($toEmail,$subject,$body){
    	import('@.ORG.phpmailer');
    	ini_set("magic_quotes_runtime",0);
        try { 
            $mail = new PHPMailer(true); 
            $mail->IsSMTP(); 
            $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
            $mail->SMTPAuth = true; //开启认证 
            $mail->Port = 25; 
            $mail->Host = "smtp.163.com"; 
            $mail->Username = "fancy612215@163.com"; 
            $mail->Password = "xxl=fan=.togethe"; 
            //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
            $mail->AddReplyTo("fancy612215@163.com","mckee");//回复地址 
            $mail->From = "fancy612215@163.com"; 
            $mail->FromName = "www.phpddt.com"; 
            $to = $toEmail; 
            $mail->AddAddress($to); 
            $mail->Subject = $subject; 
            $mail->Body =$body; 
            $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
            $mail->WordWrap = 80; // 设置每行字符串的长度 
            //$mail->AddAttachment("f:/test.png"); //可以添加附件 
            $mail->IsHTML(true); 
            $mail->Send(); 
            return true; 
        } catch (phpmailerException $e) { 
            return false;
        } 
    }

/*    public function shishi(){
        $result = $this->saveQuote('dd','dd','dd','dd','dd','dd');
        var_dump($result);
    }*/

    protected function saveQuote($name,$tel,$email,$address,$userip,$msg){
        if(session('?userip')){
            $model = D('Quote');
            $result = $model->saveQuote($name,$tel,$email,$address,$userip,$msg);
            return $result;
        }else{
            return false;
        }
    }

    public function logout(){
        session('userip',null);
    }

}