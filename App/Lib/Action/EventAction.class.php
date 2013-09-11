<?php
class EventAction extends Action{

	function uploadPoster(){
        if(session('?username')){
            $dir=date('Ym',time());
            $file=$this->upfile();
            $file['img_src']="/".$dir."/m_".$file['img'][0]['savename'];
            $this->ajaxReturn($file);
        }else{
        	$this->redirect('Admin/login');
        }
		
    }

	protected function upfile(){
        //文件上传类的调用
        import('@.ORG.UploadFile');
        $upload=new UploadFile();
        $upload->maxSize='100000000';
        $upload->saveRule=uniqid;
        $upload->uploadReplace=true;
        $dir=date('Ym',time());
        $upload->allowExts=array('jpg','jpeg','png','gif');
        $upload->savePath='./App/Public/Uploads/'.$dir.'/';
        $upload->allowTypes=array('image/png','image/jpg','image/jpeg','image/gif',"image/docx");
        $upload->thumb=true;//开启缩略图
        $upload->thumbMaxWidth='300,500';
        $upload->thumbMaxHeight='200,400';
        $upload->thumbPrefix='m_,s_';//缩略图文件前缀
        $upload->thumbRemoveOrigin=1;//如果生成缩略图，是否删除原图
        if($upload->upload()){
            $info=$upload->getUploadFileInfo();
            $info['img']=$info;
            $info['savepath']=$dir;
        }else{
            $info['error']=$upload->getErrorMsg();//专门用来获取上传的错误信息的
        }
		return $info;
    }

    public function doEdit(){
        if(session('?username')){
            if(isset($_POST)){
                $product_type = $this->_post('product_type');
                $event['banner']=$this->_post('banner');
                $event['line1_title']=$this->_post('line1_titlezh');
                $event['line1_title_en']=$this->_post('line1_titleen');
                $event['line1_text']=nl2br(str_replace(' ', '&nbsp;', $this->_post('line1_textzh')));
                $event['line1_text_en']=nl2br(str_replace(' ', '&nbsp;', $this->_post('line1_texten')));
                $event['line1_pic']=$this->_post('line1_pic');
                $event['line2_title']=$this->_post('line2_titlezh');
                $event['line2_title_en']=$this->_post('line2_titleen');
                $event['line2_text']=nl2br(str_replace(' ', '&nbsp;', $this->_post('line2_textzh')));
                $event['line2_text_en']=nl2br(str_replace(' ', '&nbsp;', $this->_post('line2_texten')));
                $event['line2_pic']=$this->_post('line2_pic');
                $event['line2_spic']=$this->_post('line2_spic');
                $model = D('Passage');
                $result = $model->where(array('product_type'=>$product_type))->save($event);
            }
        }else{
            $this->redirect('Admin/login');
        }
    }

    public function delQuote(){
        if(session('?username')){
            $quote_id=$this->_post('quote_id');
            $model = D('Quote');
            $model->delQuote($quote_id);
        }else{
            $this->redirect('Admin/index');
        }
    }

    public function doContact(){
        if(session('?username')){
            $event['address']=$this->_post('address');
            $event['quote_email']=$this->_post('email');
            $event['tel']=$this->_post('tel');
            $model = D('Admin');
            $result = $model->where('user_id',session('user_id'))->save($event);
            $this->redirect('Admin/contact');
        }else{
            $this->redirect('Admin/login');
        }
    }
}