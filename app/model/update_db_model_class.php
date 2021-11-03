<?php
class update_db_model_class extends main_model_class{
	function __construct(){
		parent::__construct();
	}

    function update_model($table_name, $update_data_array, $update_by){
		return $this->db_array->update($table_name, $update_data_array, $update_by);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>