<?php
class QuoteModel extends Model{

	public function saveQuote($name,$tel,$email,$address,$userip,$msg){
		$event['name']=$name;
		$event['tel']=$tel;
		$event['address']=$address;
		$event['email']=$email;
		$event['userip']=$userip;
		$event['msg']=$msg;
		$result = $this->add($event);
		return $result;
	}

	public function showQuote(){
		return ($this->order('send_date desc')->select());
	}

	public function delQuote($quote_id){
		return $this->where(array('quote_id'=>$quote_id))->delete();
	}
}