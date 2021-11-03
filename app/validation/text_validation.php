<?php
class text_validation{
    public $current_post_name;
    public $valid_data = array();
    public $errors = array();
    
    public function __construct(){}
    
    public function text_validate($post_name_get_by_page){
        $get_data_value = $_POST[$post_name_get_by_page];
        $get_data_value = trim($get_data_value);
        $get_data_value = stripslashes($get_data_value);
        $get_data_value = htmlspecialchars($get_data_value);
        $this->valid_data[$post_name_get_by_page] = $get_data_value;
        $this->current_post_name = $post_name_get_by_page;
        return $this;
    }
    
    public function chack_empty(){
        if(empty($this->valid_data[$this->current_post_name]) or strlen($this->valid_data[$this->current_post_name]) == 0){
            $this->errors[$this->current_post_name]['chack_empty'] = "Field Must Not Be Empty"; 
        }
        return $this;
    }
    
    public function length_validate($min=0, $max){
        if(strlen($this->valid_data[$this->current_post_name]) < $min OR strlen($this->valid_data[$this->current_post_name]) > $max){
            $this->errors[$this->current_post_name]['length_validate'] = "Text Length Minimum ".$min." And Text Length Maximum ".$max." Caracturs.";
        }
        return $this;
    }
    
    public function email_validate(){
        if(!filter_var($this->valid_data[$this->current_post_name], FILTER_VALIDATE_EMAIL)){
            $this->errors[$this->current_post_name]['email_validate'] = "Email not valid";
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

