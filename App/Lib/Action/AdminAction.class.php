<?php
class AdminAction extends Action{
	public function index(){
		if(session('?username')){
			$model = D('Admin');
			$result = $model->getUserInfo('user_id',session('user_id'));
			$this->assign('result',$result);
			$this->display();
		}else{$this->redirect('Admin/login');}
		
	}


	/**
	*登陆页面
	*/
	public function login(){
		if(session('?username')){
			$this->redirect('Admin/index');
		}else{
			$this->display();
		}
	}

	/**
	*处理登陆
	*/
	public function doLogin(){
		if(isset($_POST)){
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			if(!empty($email)&&(!empty($pass))){
				$model = D('Admin');
				$result=$model->getUser($email,$pass);
				if($result){
					session('username',$email);
					session('user_id',$result);
					$data['ip'] = get_client_ip();
					$data['latest_login'] = date('Y-m-d h:i:s');
					$model->where(array("user_id"=>session('user_id')))->save($data);
					if(isset($_POST['remenber'])){
						cookie('username', $email, 3600*24*7);
            			cookie('pass', $pass, 3600*24*7);
					}
					echo 'success';
				}else{
					echo 'fail';
				}
			}else{
				echo 'fail';
			}
		}
	}

	public function logout(){
		session('username',null);
		session('user_id',null);

	}

	public function edit(){
		if(session('?username')){
			$product_type = $this-> _get('type');
			if(!isset($product_type)&&empty($product_type)){$product_type = 1;}
        	$model = D('Passage');
        	$result = $model -> getAllIntroduce($product_type);
        	$result['banner']=explode(':', $result['banner']);
        	$result['line2_spic']=explode(':', $result['line2_spic']);
        	$this->assign('result',$result);
			$this->assign('timestamp',time());
			$this->display();
		}else{
			$this->redirect('Admin/login');
		}
	}

	public function item(){
		if(session('?username')){
		$type = $this->_get('type');
		if(!isset($type)&&empty($type)){$type = 1;}
		$model = D('Passage');
		$result = $model->getSimpleItem($type);
		$this->assign('type',$type);
		$this->assign('item',$result);
		$this->display();
		}else{
			$this->redirect('Admin/login');
		}
	}

	public function quote(){
		if(session('?username')){
			$model = D('Quote');
			$result = $model->showQuote();
			$this->assign('result',$result);
			$this->assign('type','quote');
			$this->display();
		}else{
			$this->redirect('Admin/login');
		}
	}

	public function contact(){
		if(session('?username')){
			$model = D('Admin');
			$result = $model -> getContact();
			$this->assign('result', $result);
			$this->display();
		}else{
			$this->redirect();
		}
	}
}