<?php
class database_controller_class extends main_controller_class{
	public $model_name = array();
	public $get_data_array = array();
	
	public $admin_login_info_table 	= "CREATE TABLE `admin_login_info_table` ( `admin_id` INT NOT NULL AUTO_INCREMENT , `admin_name` VARCHAR(255) NOT NULL , `admin_email` VARCHAR(255) NOT NULL , `admin_password` VARCHAR(255) NOT NULL , `admin_code` VARCHAR(255) NOT NULL , `admin_level` INT NOT NULL DEFAULT '0' , `admin_image` VARCHAR(255) NOT NULL DEFAULT 'logo.png' , `admin_mobile` INT NOT NULL , PRIMARY KEY (`admin_id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	public $user_login_info_table 	= "CREATE TABLE `user_login_info_table` (`user_id` int(11) NOT NULL AUTO_INCREMENT,`user_name` varchar(255) NOT NULL,`user_email` varchar(255) NOT NULL,`user_password` varchar(255) NOT NULL,`user_code` varchar(255) NOT NULL,`user_status` int(11) NOT NULL DEFAULT '0',`user_image` varchar(255) NOT NULL DEFAULT 'logo.png',`user_mobile` int(11) NOT NULL,PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	public $blog_category_table 	= "CREATE TABLE `blog_category_table` ( `category_id` INT NOT NULL AUTO_INCREMENT , `category_sn` INT NOT NULL DEFAULT '0' , `category_name` VARCHAR(255) NOT NULL , `category_title` VARCHAR(255) NOT NULL DEFAULT 'Blog title' , `category_icon` VARCHAR(255) NOT NULL DEFAULT 'logo.png' , `category_font_awesome` VARCHAR(255) NOT NULL DEFAULT 'fas fa-blog' , PRIMARY KEY (`category_id`)) ENGINE = InnoDB;";
	public $blog_table 				= "CREATE TABLE `blog_table` ( `blog_id` INT NOT NULL AUTO_INCREMENT , `blog_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `admin_id` INT NOT NULL , `category_id` INT NOT NULL DEFAULT '0' , `blog_title` TEXT NOT NULL , `blog_content` TEXT NOT NULL , `blog_status` INT NOT NULL DEFAULT '0' , `blog_icon` VARCHAR(255) NOT NULL DEFAULT 'logo.png' , `ip_address` VARCHAR(255) NOT NULL DEFAULT 'not set' , `total_watch` INT NOT NULL DEFAULT '0' , `total_like` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`blog_id`)) ENGINE = InnoDB;";
	public $blog_comment_table 		= "CREATE TABLE `blog_comment_table` ( `comment_id` INT NOT NULL AUTO_INCREMENT , `blog_id` INT NOT NULL , `user_id` INT NOT NULL , `blog_commnet` TEXT NOT NULL , `blog_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `session_id` VARCHAR(255) NOT NULL , PRIMARY KEY (`comment_id`)) ENGINE = InnoDB;";
	public $comment_reply_table 	= "CREATE TABLE `comment_reply_table` ( `reply_id` INT NOT NULL AUTO_INCREMENT , `blog_id` INT NOT NULL , `user_id` INT NOT NULL , `comment_id` INT NOT NULL , `comment_reply` TEXT NOT NULL , `reply_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `session_id` VARCHAR(255) NOT NULL , PRIMARY KEY (`reply_id`)) ENGINE = InnoDB;";
	public $blog_like_table 		= "CREATE TABLE `blog_like_table` ( `like_id` INT NOT NULL AUTO_INCREMENT , `blog_id` INT NOT NULL , `user_id` INT NOT NULL , `session_id` VARCHAR(255) NOT NULL , `ip_address` VARCHAR(255) NOT NULL , `like_count` INT NOT NULL , `browser_info` VARCHAR(255) NOT NULL , PRIMARY KEY (`like_id`)) ENGINE = InnoDB;";
	public $blog_watch_table 		= "CREATE TABLE `blog_watch_table` ( `watch_id` INT NOT NULL AUTO_INCREMENT , `blog_id` INT NOT NULL , `session_id` VARCHAR(255) NOT NULL , `ip_address` VARCHAR(255) NOT NULL , `browser_info` VARCHAR(255) NOT NULL , `watch_count` INT NOT NULL , PRIMARY KEY (`watch_id`)) ENGINE = InnoDB;";
	public $blog_contact_table 		= "CREATE TABLE `blog_contact_table` ( `contact_id` INT NOT NULL AUTO_INCREMENT , `contact_email` VARCHAR(255) NOT NULL , `contact_title` VARCHAR(255) NOT NULL , `contact_message` TEXT NOT NULL , `contact_status` INT NOT NULL DEFAULT '0' , `contact_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`contact_id`)) ENGINE = InnoDB;";
	public $user_interface_table 	= "";
	public $page_table 				= "CREATE TABLE `page_table` ( `page_id` INT NOT NULL AUTO_INCREMENT , `page_icon` VARCHAR(255) NOT NULL DEFAULT 'logo.png' , `page_font_awesome` VARCHAR(255) NOT NULL DEFAULT 'fas fa-blog' , `page_title` TEXT NOT NULL , `page_content` TEXT NOT NULL , PRIMARY KEY (`page_id`)) ENGINE = InnoDB;";
	public $admin_level_table 		= "CREATE TABLE `admin_level_table` ( `id` INT NOT NULL AUTO_INCREMENT , `admin_level` INT NOT NULL DEFAULT '0' , `admin_level_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	

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
		$this->get_data_array['database'] = simplexml_load_file("app/view/admin/xml/database.xml");
		$this->page_model_validation_object_array->page_load_function("admin/database", $this->get_data_array);
	}



	
	public function  database_update_after_login_function(){
	   	$xml = simplexml_load_file("app/view/admin/xml/database.xml");
       	$db_name = $_POST['db_name'];
       	$db_host = $_POST['db_host'];
       	$db_user = $_POST['db_user'];
       	$db_password = $_POST['db_password'];
		foreach($xml->database as $database){
			if($database["id"]=="admin"){
				$database->db_name = $db_name;
				$database->db_host = $db_host;
				$database->db_user = $db_user;
				$database->db_password = $db_password;
				break;
			}
		}
		file_put_contents("app/view/admin/xml/database.xml",$xml->asXML());
		header("location:".BASE_URL."database_controller_class");
	}
	
	
	public function delete_all_table_function(){
		$this->model_name['database_db_model']->table_model("DROP TABLE `admin_login_info_table`");
	}

	public function data_table_page_method(){
		$this->get_data_array['data_table'] = $this->model_name['database_db_model']->table_model("SHOW TABLES");
		$this->page_model_validation_object_array->page_load_function("admin/datatable", $this->get_data_array);
	}

	public function sql_method(){
		$this->model_name['database_db_model']->table_model($_POST['sql']);
		header("location:".BASE_URL."database_controller_class/data_table_page_method/");
	}

	public function reset_all_table_method(){
		$this->model_name['database_db_model']->table_model("DROP TABLE `admin_login_info_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `user_login_info_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_category_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_comment_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `comment_reply_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_like_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_watch_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `blog_contact_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `user_interface_table`");
		$this->model_name['database_db_model']->table_model("DROP TABLE `page_table`");
		$this->model_name['database_db_model']->table_model($this->admin_login_info_table);
		$this->model_name['database_db_model']->table_model($this->user_login_info_table);
		$this->model_name['database_db_model']->table_model($this->blog_category_table);
		$this->model_name['database_db_model']->table_model($this->blog_table);
		$this->model_name['database_db_model']->table_model($this->blog_comment_table);
		$this->model_name['database_db_model']->table_model($this->comment_reply_table);
		$this->model_name['database_db_model']->table_model($this->blog_like_table);
		$this->model_name['database_db_model']->table_model($this->blog_watch_table);
		$this->model_name['database_db_model']->table_model($this->blog_contact_table);
		$this->model_name['database_db_model']->table_model($this->user_interface_table);
		$this->model_name['database_db_model']->table_model($this->page_table);
		header("location:".BASE_URL."database_controller_class/data_table_page_method/");
	}


	
}
?>