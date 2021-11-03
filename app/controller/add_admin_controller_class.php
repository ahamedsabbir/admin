<?php
class add_admin_controller_class extends main_controller_class{
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
		$this->get_data_array["admin_loop"] = $this->model_name["select_db_model_class"]->select_method("admin_login_info_table");
		$this->page_model_validation_object_array->page_load_function("admin/admin_loop", $this->get_data_array);	
	}
	
	
	
	public function add_admin_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin/add_admin", $this->get_data_array);
	}
	
	
	
    public function add_admin_function(){
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$text_validation_object->text_validate("admin_name");
		$text_validation_object->text_validate("admin_email");
		$text_validation_object->text_validate("admin_mobile");
		$text_validation_object->text_validate("admin_password");
        $row_count = $this->model_name['row_db_model_class']->row_count_by_email_model("user_login_table", $text_validation_object->valid_data['admin_email']);
        if($row_count == 0){
            $insert_array = array(
                "admin_name" => $text_validation_object->valid_data['admin_name'],
                "admin_email" => $text_validation_object->valid_data['admin_email'],
                "admin_mobile" => $text_validation_object->valid_data['admin_mobile'],
                "admin_password" => md5($text_validation_object->valid_data['admin_password']),
                "admin_code" => $text_validation_object->valid_data['admin_password']
            );
            
            $result = $this->model_name['insert_db_model_class']->insert_model("admin_login_info_table", $insert_array);
			//mail($text_validation_object->valid_data['email'], "restart password", $message, $headers);
    		header("Location:".BASE_URL."add_admin_controller_class/");
        }else{
            //$post_msg_array['email_Pass_match'] = "email and password alrady have";
            //$this->page_model_validation_object_array->page_load_function("admin_login/include/admin_sign_up_page", $post_msg_array);
        }
	}

	public function admin_asign_page_function($admin_id){
		$assin_by_array = array(
			"admin_id" => $admin_id
		);
		$this->get_data_array["admin_asign_profile"] = $this->model_name["select_db_model_class"]->select_method("admin_login_info_table", $assin_by_array);
		$this->get_data_array["admin_level_name"] = $this->model_name["select_db_model_class"]->select_method("admin_level_table");
		$this->page_model_validation_object_array->page_load_function("admin/admin_asign", $this->get_data_array);
	}

	public function admin_asign_function($admin_id){
		$update_by = "admin_id=:admin_id";
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$text_validation_object->text_validate("admin_level");
		$update_data_array = array(
			"admin_id" => $admin_id,
			"admin_level" => $text_validation_object->valid_data['admin_level']
		);
		$this->model_name['update_db_model_class']->update_model("admin_login_info_table", $update_data_array, $update_by);
		header('location:'.BASE_URL.'add_admin_controller_class/admin_asign_page_function/'.$admin_id);
	}



	
}
?>