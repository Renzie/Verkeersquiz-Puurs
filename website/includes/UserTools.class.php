<?php

require_once 'Database.class.php';

class UserTools extends Database{

	protected function getAllUsers(){
		$sql = "SELECT * FROM user";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		$data = array();
		if($numRows > 0){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}


}
?>
