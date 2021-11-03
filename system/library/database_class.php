<?php
class database_class extends PDO{
	public function __construct($dsn, $user_name, $password){
		parent::__construct($dsn, $user_name, $password);
	}  


	
    public function select($sql, $data = array()){
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
			$stmt->bindValue($key, $value);
		}
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 	
	
    public function auto_select($data_table_name, $data_array = array()){
		if($data_array != null){
		$select_by = null;
			foreach($data_array as $key => $value){
				$select_by .= $key."=:".$key." AND ";
			}
			$select_by = rtrim($select_by," AND ");
			$sql = "SELECT * FROM $data_table_name WHERE $select_by";
		}else{
			$sql = "SELECT * FROM $data_table_name";
		}
        $stmt = $this->prepare($sql);
        if($data_array != null){
			foreach($data_array as $key => $value){
				$stmt->bindValue($key, $value);
			}
		}
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
	
    public function row($sql, $data = array()){
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
			$stmt->bindValue($key, $value);
		}
        $stmt->execute();
        return $stmt->rowCount();
    }
	
    public function auto_row($data_table_name, $data_array = array()){
		if($data_array != null){
			$select_by = null;
			foreach($data_array as $key => $value){
				$select_by .= $key."=:".$key." AND ";
			}
			$select_by = rtrim($select_by," AND ");
			$sql = "SELECT * FROM $data_table_name WHERE $select_by";
		}else{
			$sql = "SELECT * FROM $data_table_name";
		}
        $stmt = $this->prepare($sql);
		if($data_array != null){
			foreach($data_array as $key => $value){
				$stmt->bindValue($key, $value);
			}
		}
        $stmt->execute();
        return $stmt->rowCount();
    } 
	
	public function insert($table_name, $insert_data){
		$keys = implode(", ", array_keys($insert_data));
		$values = ":". implode(", :", array_keys($insert_data));
		$sql = "INSERT INTO $table_name($keys) VALUES ($values)";
		$stmt = $this->prepare($sql);
		foreach($insert_data as $key => $value){
			$stmt->bindValue(":".$key, $value, PDO::PARAM_STR);
		}
		return $stmt->execute();
	}
	
    public function update($table_name, $update_data_array, $update_by){
        $updatekeys = NULL;
        foreach($update_data_array as $key => $value){
            $updatekeys .= "{$key} = :{$key}, "; 
        }
        $updatekeys = rtrim($updatekeys,", ");
        $sql = "UPDATE $table_name SET $updatekeys WHERE $update_by";
        $stmt = $this->prepare($sql);
        foreach($update_data_array as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();
    }
	
	public function remove($table_name, $delete_by){
        $sql = "DELETE FROM $table_name WHERE $delete_by";
        $stmt = $this->prepare($sql);
        return $stmt->execute();
    }
	
	public function table($sql){
		$stmt = $this->prepare($sql);
		return $stmt->execute();
	}	
}
?>