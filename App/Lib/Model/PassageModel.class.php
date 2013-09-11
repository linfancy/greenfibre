<?php
class PassageModel extends Model{
	private $_sfield='product_type,title,line1_title,line1_title_en,line1_text,line1_text_en';
	private $_zhfield='title,banner,line1_title,line1_text,line1_pic,line2_title,line2_text,line2_pic,line2_spic';
	private $_enfield='title,banner,line1_title_en,line1_text_en,line1_pic,line2_title_en,line2_text_en,line2_pic,line2_spic';

	public function getSimpleItem($type){
		return ($this->field($this->_sfield)->where(array('product_type'=>$type))->select());
	}

	public function getIntroduce($type,$product_type){
		if($type=='en-us'){$language = $this->_enfield;}
		else{$language = $this->_zhfield;}
		return ($this->field($language)->where(array('product_type'=>$product_type))->find());
	}
	public function getAllIntroduce($product_type){
		return ($this->where(array('product_type'=>$product_type))->find());	
	}


}