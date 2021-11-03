<?php
class delete_db_model_class extends main_model_class{
	function __construct(){
		parent::__construct();
	}

   function delete_method($table_name, $delete_by){
        return $this->db_array->remove($table_name, $delete_by);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>