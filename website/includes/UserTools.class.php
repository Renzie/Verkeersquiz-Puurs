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
			//$this->connect()->close();
			return $data;
		}
	}

	protected function registerAdmin($username, $password){

		//$password = password_hash($password, PASSWORD_DEFAULT);


		if(!$stmt = $this->connect()->prepare("INSERT INTO login (username, password) VALUES (?, ?)")){
			echo "FAIL prepare";
		}

		if(!$stmt->bind_param("ss", $username, $password)){
			echo "FAIL bind";
		}

		echo "username: " . $username;
		echo "password: " . $password;

		if(!$stmt->execute()){
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
		//$this->connect()->close();
	}

}
?>
