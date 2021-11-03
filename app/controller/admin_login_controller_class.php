<?php
class admin_login_controller_class extends main_controller_class{
	public $model_name = array();
	public $get_data_array = array();
	public function __construct(){
		parent::__construct();
		session::init();
		session::login_chack();
		$file_list = glob("app/model/*.php");
		foreach($file_list as $file_name){
			$file_name = str_replace(".php","",$file_name);
			$file_name = str_replace("app/model/","",$file_name);
			$this->model_name[$file_name] = $this->page_model_validation_object_array->model_load_function($file_name);
		}
	}
	
	public function main_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin_login/login");
	}
	
	public function login_authention_function(){
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
        $text_validation_object->text_validate("admin_name");
        $text_validation_object->text_validate("admin_password"); 
		$autnentic_array = array(
			"admin_name" => $text_validation_object->valid_data['admin_name'],
			"admin_password" => md5($text_validation_object->valid_data['admin_password'])
		);
        $count = $this->model_name['row_db_model_class']->get_row_method("admin_login_info_table", $autnentic_array);
        if($count > 0){
            $result = $this->model_name['select_db_model_class']->select_method("admin_login_info_table", $autnentic_array);
            session::set('admin_login', true);
            session::set('admin_name', $result[0]['admin_name']);
            session::set('admin_id', $result[0]['admin_id']);
            session::set('admin_image', $result[0]['admin_image']);
            session::set('admin_level', $result[0]['admin_level']);
            header("Location:".BASE_URL."admin_home_page_controller_class");
        }else{
            header("Location:".BASE_URL."admin_login_controller_class");
        }
	}
	
	
	public function signup_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin_login/signup");
	}
	
    public function signup_function(){
		$text_validation_object = $this->page_model_validation_object_array->validation_load_function("text_validation");
		$text_validation_object->text_validate("admin_name");
		$text_validation_object->text_validate("admin_email");
		$text_validation_object->text_validate("admin_mobile");
		$text_validation_object->text_validate("admin_password");
		$autnentic_array = array(
			"admin_email" => $text_validation_object->valid_data['admin_email']
		);
        $row_count = $this->model_name['row_db_model_class']->get_row_method("user_login_table", $autnentic_array);
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
    		header("Location:".BASE_URL."admin_login_controller_class/");
        }else{
            //$post_msg_array['email_Pass_match'] = "email and password alrady have";
            //$this->page_model_validation_object_array->page_load_function("admin_login/include/admin_sign_up_page", $post_msg_array);
        }
	}



    public function logOut(){
        session::destroy();
    } 

	public function database_update_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin_login/database");	
	}

	public function  database_update_function(){
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
		header("location:".BASE_URL."admin_login_controller_class/set_admin_function/");
	}

	public function set_admin_function(){
		$this->model_name['database_db_model']->table_model("admin_login_info_table");
		//$model_object->table_model($this->user_login_info_table);
		$this->page_model_validation_object_array->page_load_function("admin_login/signup");
	}
	
	
	public function forget_password_page_function(){
		$this->page_model_validation_object_array->page_load_function("admin_login/forget_password");	
	}
















	
}
?>