<?php

class admin_user_interface_controller_class extends main_controller_class{
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
	
	public function main_page_function(){}
	
	public function gelneral_page_function(){
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/general", $this->get_data_array);
	}
	
	public function icon_page_function(){ 
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/icon", $this->get_data_array);
	}
	
	public function banner_page_function(){ 
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/banner", $this->get_data_array);
	}
	
	public function slider_page_function(){ 
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/slider", $this->get_data_array);
	}
	
	public function settinges_page_function(){ 
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/settinges", $this->get_data_array);
	}
	
	public function social_page_function(){
		$this->get_data_array['user_interface'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		$this->page_model_validation_object_array->page_load_function("admin/social", $this->get_data_array);
	}
	
	
	
	
	public function gelneral_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
       	$site_title = $_POST['site_title'];
       	$meta_tag = $_POST['meta_tag'];
       	$copy_right = $_POST['copy_right'];
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->site_title = $site_title;
				$user_interface->meta_tag = $meta_tag;
				$user_interface->copy_right = $copy_right;
				break;
			}
		}
		file_put_contents("app/view/admin/xml/user_interface.xml", $this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/gelneral_page_function/");
	}
	
	
	
	
	public function icon_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			unlink("upload/".$user_interface->icon);
		}
       	$icon = $_FILES['icon']['name'];
       	$tmp_name = $_FILES['icon']['tmp_name'];
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->icon = $icon;
				break;
			}
		}
		move_uploaded_file($tmp_name,"upload/".$icon);
		file_put_contents("app/view/admin/xml/user_interface.xml",$this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/icon_page_function/");
	}
	
	
	
	
	
	public function social_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
       	$facebook = $_POST['facebook'];
       	$twitter = $_POST['twitter'];
       	$linkedin = $_POST['linkedin'];
       	$youtube = $_POST['youtube'];
       	$instagram = $_POST['instagram'];
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->facebook = $facebook;
				$user_interface->twitter = $twitter;
				$user_interface->linkedin = $linkedin;
				$user_interface->youtube = $youtube;
				$user_interface->instagram = $instagram;
				break;
			}
		}
		file_put_contents("app/view/admin/xml/user_interface.xml",$this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/social_page_function/");
	}
	
	
	public function settinges_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
       	$page = $_POST['page'];
       	$loop_item = $_POST['loop_item'];
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->page = $page;
				$user_interface->loop_item = $loop_item;
				break;
			}
		}
		file_put_contents("app/view/admin/xml/user_interface.xml",$this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/settinges_page_function/");
	}
	
	
	public function banner_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			unlink("upload/".$user_interface->banner);
		}
       	$banner = $_FILES['banner']['name'];
       	$tmp_name = $_FILES['banner']['tmp_name'];
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->banner = $banner;
				break;
			}
		}
		move_uploaded_file($tmp_name,"upload/".$banner);
		file_put_contents("app/view/admin/xml/user_interface.xml",$this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/banner_page_function/");
	}
	
	public function slider_update_function(){
	   	$this->get_data_array['xml'] = simplexml_load_file("app/view/admin/xml/user_interface.xml");
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			unlink("upload/".$user_interface->slider_one);
			unlink("upload/".$user_interface->slider_two);
			unlink("upload/".$user_interface->slider_three);
		}
		
       	$slider_one = $_FILES['slider_one']['name'];
       	$slider_one_tmp_name = $_FILES['slider_one']['tmp_name'];
		
		$slider_two = $_FILES['slider_two']['name'];
       	$slider_two_tmp_name = $_FILES['slider_two']['tmp_name'];
		
		$slider_three = $_FILES['slider_three']['name'];
       	$slider_three_tmp_name = $_FILES['slider_three']['tmp_name'];
		
		foreach($this->get_data_array['xml']->user_interface as $user_interface){
			if($user_interface["id"] == ADMIN_CODE){
				$user_interface->slider_one = $slider_one;
				$user_interface->slider_two = $slider_two;
				$user_interface->slider_three = $slider_three;
				break;
			}
		}
		move_uploaded_file($slider_one_tmp_name, "upload/".$slider_one);
		move_uploaded_file($slider_two_tmp_name, "upload/".$slider_two);
		move_uploaded_file($slider_three_tmp_name, "upload/".$slider_three);
		file_put_contents("app/view/admin/xml/user_interface.xml",$this->get_data_array['xml']->asXML());
		header("location:".BASE_URL."admin_user_interface_controller_class/slider_page_function/");
	}
	
}
?>
	