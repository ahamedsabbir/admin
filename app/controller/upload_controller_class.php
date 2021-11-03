<?php
class upload_controller_class extends main_controller_class{
	public function __construct(){
		parent::__construct();
	}

	public function main_page_function(){}
	
	function image_upload_method(){
		if(isset($_FILES['upload']['name'])){
			 $file = $_FILES['upload']['tmp_name'];
			 $file_name = $_FILES['upload']['name'];
			 $file_name_array = explode(".", $file_name);
			 $extension = end($file_name_array);
			 $new_image_name = rand() . '.' . $extension;
			 chmod('upload', 0777);
			 $allowed_extension = array("jpg", "gif", "png", "jpeg");
				 if(in_array($extension, $allowed_extension)){
					  move_uploaded_file($file, 'upload/' . $new_image_name);
					  $function_number = $_GET['CKEditorFuncNum'];
					  $url = 'upload/' . $new_image_name;
					  $message = 'seccess';
					  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
				 }
		}	
	}
	
	
	
}	
?>