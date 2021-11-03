<?php
class page_controller_class extends main_controller_class{
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
		$this->get_data_array["page_loop"] = $this->model_name["select_db_model_class"]->select_method("page_table");
		$this->page_model_validation_object_array->page_load_function("admin/page_loop", $this->get_data_array);	
	}
	
	
	public function create_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin/add_page", $this->get_data_array);
	}
	
	public function insert_page_function(){
			$file_validation = $this->page_model_validation_object_array->validation_load_function("file_validation");
			$parmited_image_extention = array("jpg","png","jpeg","gif");
			$file_validation->file_validate('page_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);        
			move_uploaded_file($file_validation->valid_data['page_icon_temp_name'],"upload/".$file_validation->valid_data['page_icon']);
            $insert_data_array = array(
				'page_icon' => $file_validation->valid_data['page_icon'],
                'page_font_awesome' => $_POST['page_font_awesome'],
                'page_name' => $_POST['page_name'],
                'page_title' => $_POST['page_title'],
                'page_content' => $_POST['page_content']
                
            );
            $this->model_name['insert_db_model_class']->insert_model("page_table", $insert_data_array);
            header("location:".BASE_URL."page_controller_class/");
	}



	public function update_page_function($page_id){
		$page_update_array = array(
			"page_id" => $page_id
		);
		$this->get_data_array["update_page"] = $this->model_name["select_db_model_class"]->select_method("page_table", $page_update_array);
		$this->page_model_validation_object_array->page_load_function("admin/update_page", $this->get_data_array);
	}

	public function update_function($page_id){
		$update_by = "page_id=:page_id";
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$file_validation_object = $this->page_model_validation_object_array->validation_load_function("file_validation");
		$text_validation_object->text_validate("page_name");
		$text_validation_object->text_validate("page_font_awesome");
		$text_validation_object->text_validate("page_title");
		$text_validation_object->text_validate("page_content");
		if($_FILES['page_icon']['name'] != null){
			$parmited_image_extention = array("jpg", "png", "jpeg", "gif");
			$file_validation_object->file_validate('page_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);
			$page_update_array = array(
				"page_id" => $page_id
			);
			$delete_data = $this->model_name['select_db_model_class']->select_method("page_table", $page_update_array);
			if(isset($delete_data)){
				$icon_chack = file_exists("upload/".$delete_data[0]['page_icon']);
				if($icon_chack == 1){
					unlink("upload/".$delete_data[0]['page_icon']);
				}
			}	
			move_uploaded_file($file_validation_object->valid_data['page_icon_temp_name'],"upload/".$file_validation_object->valid_data['page_icon']);
			$page_icon = $file_validation_object->valid_data['page_icon'];	
		}else{
			$delete_data = $this->model_name['select_db_model_class']->select_all_by_page_id_method("page_table", $page_id);
			$page_icon = $delete_data[0]['page_icon'];
		}
		$update_data_array = array(
			"page_id" => $page_id,
			"page_name" => $text_validation_object->valid_data['page_name'],
			"page_font_awesome" => $text_validation_object->valid_data['page_font_awesome'],
			"page_title" => $text_validation_object->valid_data['page_title'],
			"page_content" => $text_validation_object->valid_data['page_content'],
			"page_icon" => $page_icon
		);
		$this->model_name['update_db_model_class']->update_model("page_table", $update_data_array, $update_by);
		header('location:'.BASE_URL.'page_controller_class/update_page_function/'.$page_id);
	}



	
}
?>