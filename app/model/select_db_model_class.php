<?php
class select_db_model_class extends main_model_class{
	function __construct(){
		parent::__construct();
	}
	public function select_method($data_table_name, $data_array = null){
		return $this->db_array->auto_select($data_table_name, $data_array);
    }
	public function select_by_order_method($data_table_name){
        $sql = "SELECT * FROM $data_table_name ORDER BY CATEGORY_SN";
		return $this->db_array->select($sql);
    }
	
	
}	
?>