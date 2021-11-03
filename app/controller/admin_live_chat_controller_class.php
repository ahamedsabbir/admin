<?php
class admin_live_chat_controller_class extends main_controller_class{
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
		$this->get_data_array['reply'] = simplexml_load_file("app/view/admin/xml/chat.xml");
		$this->page_model_validation_object_array->page_load_function("admin/live_chat", $this->get_data_array);
	}

	public function reply_chat_function(){
		$xml = simplexml_load_file("app/view/admin/xml/chat.xml");
		$admin_name = session::get('admin_name');
		$text = $_POST['text'];
		$chat = $xml->addChild("chat");
    	$chat->addAttribute('id', session::get('admin_name'));	
    	$chat->addChild("text", $text);		
		file_put_contents("app/view/admin/xml/chat.xml", $xml->asXML());
		header("location:".BASE_URL."admin_live_chat_controller_class/");
	}
	
	public function delete_all_chat_function(){ 
		$xml = simplexml_load_file("app/view/admin/xml/chat.xml");
		unset($xml->chat);
		file_put_contents("app/view/admin/xml/chat.xml", $xml->asXML());
		header("location:".BASE_URL."admin_live_chat_controller_class/");
		
	}
}
?>