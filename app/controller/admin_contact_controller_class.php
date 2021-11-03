<?php

class admin_contact_controller_class extends main_controller_class{
	public $model_name = array();
	public $get_data_array = array();
	public function __construct(){
		parent::__construct();
		session::init();
		session::session_check();
		$file_list = glob("app/model/*.php");
		foreach($file_list as $file_name){
			$file_name = str_replace(".php","",$file_name);
			$file_name = str_replace("app/model/","",$file_name);
			$this->model_name[$file_name] = $this->page_model_validation_object_array->model_load_function($file_name);
			
		}
		$contact_count_array = array(
			"contact_status" => 0
		);
		$this->get_data_array['new_inbox'] = $this->model_name['row_db_model_class']->get_row_method("blog_contact_table", $contact_count_array);
		$this->get_data_array['total_blog_post'] = $this->model_name['row_db_model_class']->get_row_method("blog_table");
		$blog_count_array = array(
			"blog_status" => 0
		);
		$this->get_data_array['unapprove_post'] = $this->model_name['row_db_model_class']->get_row_method("blog_table", $blog_count_array);
	} 
	
	public function main_page_function(){
		$get_contract_info = array(
			"contact_status" => 0
		);
        $this->get_data_array["all_message"] = $this->model_name["select_db_model_class"]->select_method("blog_contact_table", $get_contract_info);
		$this->page_model_validation_object_array->page_load_function("admin/contact", $this->get_data_array);
	}
    
	public function reply_contant_function(){
        //mail($to, $subject, $message, $form);
	}
    
	public function delete_contant_function($delete_id){
		$delete_by = "contact_id={$delete_id}";
        $this->model_name["delete_db_model_class"]->delete_method("blog_contact_table", $delete_by);
        header("location:".BASE_URL."admin_contact_controller_class/");
	}   
    
}
?>