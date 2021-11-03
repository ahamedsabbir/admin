<?php
class admin_profile_controller_class extends main_controller_class{
	
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
		$select_by_id_array = array(
			"admin_id" => session::get('admin_id')
		);
		$this->get_data_array["admin_info"] = $this->model_name['select_db_model_class']->select_method("admin_login_info_table", $select_by_id_array);
		$this->page_model_validation_object_array->page_load_function("admin/profile", $this->get_data_array);
	}
	public function edite_profile_function(){
		$select_by_id_array = array(
			"admin_id" => session::get('admin_id')
		);
		$this->get_data_array["admin_info"] = $this->model_name['select_db_model_class']->select_method("admin_login_info_table", $select_by_id_array);
		$this->page_model_validation_object_array->page_load_function("admin/edit_profile", $this->get_data_array);
	}
	
	public function update_profile_function(){
		$update_by = "admin_id=:admin_id";
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$text_validation_object->text_validate("admin_name");
		$text_validation_object->text_validate("admin_mobile");
		$update_data_array = array(
			"admin_id" => session::get('admin_id'),
			"admin_name" => $text_validation_object->valid_data['admin_name'],
			"admin_mobile" => $text_validation_object->valid_data['admin_mobile']
		);
		$this->model_name['update_db_model_class']->update_model("admin_login_info_table", $update_data_array, $update_by);
		header('location:'.BASE_URL.'admin_profile_controller_class/');
	}
	
	function image_update_method(){
		$update_by = "admin_id=:admin_id";
		$file_validation_object = $this->page_model_validation_object_array->validation_load_function("file_validation");
		$parmited_image_extention = array("jpg", "png", "jpeg", "gif");
		$file_validation_object->file_validate('admin_image')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);
		$select_by_id_array = array(
			"admin_id" => session::get('admin_id')
		);
		$delete_data = $this->model_name['select_db_model_class']->select_method("admin_login_info_table", $select_by_id_array);
		if(isset($delete_data)){
			$icon_chack = file_exists("upload/".$delete_data[0]['admin_image']);
			if($icon_chack == 1){
				unlink("upload/".$delete_data[0]['admin_image']);
			}
		}	
		move_uploaded_file($file_validation_object->valid_data['admin_image_temp_name'],"upload/".$file_validation_object->valid_data['admin_image']);	
		$update_data_array = array(
								'admin_id' => session::get('admin_id'),
                                'admin_image' => $file_validation_object->valid_data['admin_image']
                            );	
		session::set('admin_image', $file_validation_object->valid_data['admin_image']);
		$this->model_name['update_db_model_class']->update_model("admin_login_info_table", $update_data_array, $update_by);	
		header("Location:".BASE_URL."admin_profile_controller_class/");
	
    }	
}
?>