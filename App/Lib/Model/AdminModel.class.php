<?php
class AdminModel extends Model{

	private $_field = 'user_id,user_name,pass,email,ip,latest_login,register_date';

	/**
	*获取用户登陆信息
	*/
	public function getUser($username,$pass){
		$userInfo = $this->getUserInfo('user_name',$username);
		var_dump($userInfo);
		$key=explode(':', $userInfo['pass']);
		$new_pass=$this->getHash($pass,$key[1]);
		if($new_pass==$userInfo['pass']){
			return $userInfo['user_id'];
		}else{
			return false;
		}
	}

	/**
	*获取邮箱设置
	*/
	public function getEmail(){
		return ($this->where('user_id=1')->getField('email'));
	}

	/**
	*获取用户信息
	*/
	public function getUserInfo($key_content,$key){
		return ($this->field($this->_field)->where(array($key_content=>$key))->find());
	}

	/**
	*生成两位随机数
	*/
	function randstr() {
 		$hash = '';
 		$chars = 'abcdefghijklmnopqrstuvwxyz0123456789abcdefghijklmnopqrstuvwxyz';
 		$max = strlen($chars) - 1;
 		mt_srand((double)microtime() * 1000000);
 		for($i = 0; $i < 2; $i++) {
  			$hash .= $chars[mt_rand(0, $max)];
 		}
 		return $hash;
	}


	/**
	*生成加密密码
	*/
	public function getRandomString($len, $chars=null)
	{
    	if (is_null($chars)) {
        	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	}
    	mt_srand(10000000*(double)microtime());
    	for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
        	$str .= $chars[mt_rand(0, $lc)];
    	}
    	return $str;
	}

	/**
	*生成加密密码
	*/
	public function getHash($password, $salt=false)
	{
    	if (is_integer($salt)) {
        	$salt = $this->getRandomString($salt);
    	}
    	return $salt===false ? md5($password) : md5($salt.$password).':'.$salt;
	}

	public function getContact(){
		return $this->field('email,address,tel,address_en')->where(array('user_id'=>session('user_id')))->find();
	}
}