<?php
/**
* models সাধারনত database এর data গুলোকে নিয়ে  arry আকারে return করে থাকে।
*  
*/
class database_db_model extends main_model_class{
	function __construct(){
		parent::__construct();
	}
	
	function table_model($sql){
		return $this->db_array->table($sql);
    }
	
	
	
}
?>