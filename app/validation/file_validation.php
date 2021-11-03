<?php
class file_validation{
    public $current_file_name;
    public $valid_data = array();
    public $errors = array();
    
    public function __construct(){}
    
    public function file_validate($post_file_name_get_by_page){
        $name  = $_FILES[$post_file_name_get_by_page]["name"];
        $name = trim($name);
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        $make_file_array = explode(".",$name);
        $file_extantion = strtolower(end($make_file_array));
        $file_unique_name = substr(md5(time()), 0, 10).".".$file_extantion;
        $this->valid_data[$post_file_name_get_by_page] = $file_unique_name;
        $size   = $_FILES[$post_file_name_get_by_page]["size"];
        $temp   = $_FILES[$post_file_name_get_by_page]["tmp_name"];
        $type   = $_FILES[$post_file_name_get_by_page]["type"];
        $error  = $_FILES[$post_file_name_get_by_page]["error"];
        $this->current_file_name = $post_file_name_get_by_page;
        
        $this->valid_data[$post_file_name_get_by_page.'_size'] = $size;
        $this->valid_data[$post_file_name_get_by_page.'_temp_name'] = $temp;
        $this->valid_data[$post_file_name_get_by_page.'_type'] = $type;
        $this->valid_data[$post_file_name_get_by_page.'_error'] = $error;
        $this->valid_data[$post_file_name_get_by_page.'_extention'] = $file_extantion;
        
        
        return $this;
    }
    public function chack_error(){
        if($this->valid_data[$this->current_file_name."_error"] > 0){
            $this->errors[$this->current_file_name]['chack_empty'] = "data error"; 
        }
        return $this;
    }
    
    public function file_size($size){
        if($this->valid_data[$this->current_file_name."_size"] > $size){
            $this->errors[$this->current_file_name]['file_size'] = "file Big";
        }
        return $this;
    }
    public function file_extention($parmited_file_extention = array()){
        if(in_array($this->valid_data[$this->current_file_name.'_extention'], $parmited_file_extention) === false){
            $this->errors[$this->current_file_name]['file_extention'] = "extention";
        }
        return $this;
    }
    public function submit(){
       if(empty($this->errors)){
           return true;
       }else{
           return false;
       } 
    }    
    
    
}
?>
