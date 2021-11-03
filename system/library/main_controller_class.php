<?php
class main_controller_class{
	protected $page_model_validation_object_array = array();
	public function __construct(){
		$this->page_model_validation_object_array = new model_view_validation_load_class();
	}
}
?>