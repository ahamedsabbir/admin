<?php
class admin_blog_controller_class extends main_controller_class{
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
		$this->get_data_array["post_loop"] = $this->model_name["select_db_model_class"]->select_method("blog_table");
		$this->get_data_array["post_cat"] = $this->model_name["select_db_model_class"]->select_method("blog_category_table");
		$this->page_model_validation_object_array->page_load_function("admin/post_loop", $this->get_data_array);	
	}
	
	
	public function create_page_function(){
		$this->get_data_array["post_cat_name"] = $this->model_name['select_db_model_class']->select_method("blog_category_table");
		$this->page_model_validation_object_array->page_load_function("admin/create_post", $this->get_data_array);
	}
	
	
	
	public function create_post_function(){
			$file_validation = $this->page_model_validation_object_array->validation_load_function("file_validation");
			$parmited_image_extention = array("jpg","png","jpeg","gif");
			$file_validation->file_validate('blog_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);        
			move_uploaded_file($file_validation->valid_data['blog_icon_temp_name'],"upload/".$file_validation->valid_data['blog_icon']);
            $insert_data_array = array(
                'admin_id' => session::get('admin_id'),
                'ip_address' => $_SERVER["SERVER_ADDR"],
                'category_id' => $_POST['category_id'],
                'blog_title' => $_POST['blog_title'],
                'blog_content' => $_POST['blog_content'],
                'blog_icon' => $file_validation->valid_data['blog_icon']
            );
            $this->model_name['insert_db_model_class']->insert_model("blog_table", $insert_data_array);
            header("location:".BASE_URL."admin_blog_controller_class/");
	}

	public function category_page_function(){
		$this->get_data_array["post_cat"] = $this->model_name["select_db_model_class"]->select_by_order_method("blog_category_table");
		$this->page_model_validation_object_array->page_load_function("admin/post_category", $this->get_data_array);
	}

	public function update_category_function($category_id){
		$update_by = "category_id=:category_id";
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$file_validation_object = $this->page_model_validation_object_array->validation_load_function("file_validation");
		$text_validation_object->text_validate("category_sn");
		$text_validation_object->text_validate("category_name");
		$text_validation_object->text_validate("category_title");
		$text_validation_object->text_validate("category_font_awesome");
		if($_FILES['category_icon']['name'] != null){
			$parmited_image_extention = array("jpg", "png", "jpeg", "gif");
			$file_validation_object->file_validate('category_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);
			$get_category_array = array(
				"category_id" => $category_id
			);
			$delete_data = $this->model_name['select_db_model_class']->select_method("blog_category_table", $get_category_array);
			if(isset($delete_data)){
				$icon_chack = file_exists("upload/".$delete_data[0]['category_icon']);
				if($icon_chack == 1){
					unlink("upload/".$delete_data[0]['category_icon']);
				}
			}	
			move_uploaded_file($file_validation_object->valid_data['category_icon_temp_name'],"upload/".$file_validation_object->valid_data['category_icon']);
			$category_icon = $file_validation_object->valid_data['category_icon'];	
		}else{
			$get_category_array = array(
				"category_id" => $category_id
			);
			$delete_data = $this->model_name['select_db_model_class']->select_method("blog_category_table", $get_category_array);
			$category_icon = $delete_data[0]['category_icon'];
		}
		$update_data_array = array(
			"category_id" => $category_id,
			"category_sn" => $text_validation_object->valid_data['category_sn'],
			"category_name" => $text_validation_object->valid_data['category_name'],
			"category_title" => $text_validation_object->valid_data['category_title'],
			"category_font_awesome" => $text_validation_object->valid_data['category_font_awesome'],
			"category_icon" => $category_icon
		);
		$this->model_name['update_db_model_class']->update_model("blog_category_table", $update_data_array, $update_by);
		header('location:'.BASE_URL.'admin_blog_controller_class/category_page_function/');
	}


	public function delete_cat_function($category_id){
		$delete_by = "category_id=$category_id";
        $this->model_name["delete_db_model_class"]->delete_method("blog_category_table", $delete_by);
		header("Location:".BASE_URL."admin_blog_controller_class/category_page_function/"); 
        
	}

	public function unapprove_post_page_function(){
		$blog_status_array = array(
			"blog_status" => 0
		);
        $this->get_data_array["post_loop"] = $this->model_name["select_db_model_class"]->select_method("blog_table", $blog_status_array);
		$this->get_data_array["post_cat"] = $this->model_name["select_db_model_class"]->select_method("blog_category_table");
		$this->page_model_validation_object_array->page_load_function("admin/unapprove_post", $this->get_data_array);
	}
	public function add_category_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin/add_category", $this->get_data_array);
	}
	
	
	public function add_category_function(){
		$file_validation = $this->page_model_validation_object_array->validation_load_function("file_validation");
		$parmited_image_extention = array("jpg","png","jpeg","gif");
		$file_validation->file_validate('category_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);        
		move_uploaded_file($file_validation->valid_data['category_icon_temp_name'],"upload/".$file_validation->valid_data['category_icon']);
		$insert_data_array = array(
			'category_sn' => $_POST['category_sn'],
			'category_name' => $_POST['category_name'],
			'category_title' => $_POST['category_title'],
			'category_icon' => $file_validation->valid_data['category_icon'],
			'category_font_awesome' => $_POST['category_font_awesome']	
		);
		$this->model_name['insert_db_model_class']->insert_model("blog_category_table", $insert_data_array);
		header("location:".BASE_URL."admin_blog_controller_class/category_page_function/");
	}

	public function update_post_page_function($blog_id){
		$blog_id_array = array(
			"blog_id" => $blog_id
		);
		$this->get_data_array["upadet_post"] = $this->model_name["select_db_model_class"]->select_method("blog_table", $blog_id_array);
		$this->get_data_array["post_cat_name"] = $this->model_name["select_db_model_class"]->select_method("blog_category_table");
		$this->page_model_validation_object_array->page_load_function("admin/update_post", $this->get_data_array);
	}

	public function update_post_function($blog_id){
		$update_by = "blog_id=:blog_id";
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$file_validation_object = $this->page_model_validation_object_array->validation_load_function("file_validation");
		$text_validation_object->text_validate("category_id");
		$text_validation_object->text_validate("blog_title");
		$text_validation_object->text_validate("blog_content");
		if($_FILES['blog_icon']['name'] != null){
			$parmited_image_extention = array("jpg", "png", "jpeg", "gif");
			$file_validation_object->file_validate('blog_icon')->chack_error()->file_size("1000000")->file_extention($parmited_image_extention);
			$update_id_array = array(
				"blog_id" => $blog_id
			);
			$delete_data = $this->model_name['select_db_model_class']->select_all_by_blog_id_method("blog_table", $update_id_array);
			if(isset($delete_data)){
				$icon_chack = file_exists("upload/".$delete_data[0]['blog_icon']);
				if($icon_chack == 1){
					unlink("upload/".$delete_data[0]['blog_icon']);
				}
			}	
			move_uploaded_file($file_validation_object->valid_data['blog_icon_temp_name'],"upload/".$file_validation_object->valid_data['blog_icon']);
			$blog_icon = $file_validation_object->valid_data['blog_icon'];	
		}else{
			$update_id_array = array(
				"blog_id" => $blog_id
			);
			$delete_data = $this->model_name['select_db_model_class']->select_all_by_blog_id_method("blog_table", $update_id_array);
			$blog_icon = $delete_data[0]['blog_icon'];
		}
		$update_data_array = array(
			"blog_id" => $blog_id,
			"category_id" => $text_validation_object->valid_data['category_id'],
			"blog_title" => $text_validation_object->valid_data['blog_title'],
			"blog_content" => $text_validation_object->valid_data['blog_content'],
			"blog_icon" => $blog_icon
		);
		$this->model_name['update_db_model_class']->update_model("blog_table", $update_data_array, $update_by);
		header('location:'.BASE_URL.'admin_blog_controller_class/update_post_page_function/'.$blog_id);
	}


	
}
?>