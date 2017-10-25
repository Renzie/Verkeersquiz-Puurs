<?php

require_once 'Database.class.php';

class UserTools extends Database{
	protected function getAllUsers(){
		$connection= $this->connect();
		$sql = "SELECT * FROM user";
		$result = $connection->query($sql);
		$numRows = $result->num_rows;
		$data = array();
		if($numRows > 0){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			$connection->close();
			return $data;
		}
	}

	protected function registerAdmin($username, $password){
		$connection= $this->connect();
		$password = password_hash($password, PASSWORD_DEFAULT);

		if(!$stmt = $connection->prepare("INSERT INTO login (username, password) VALUES (?, ?)")){
			echo "FAIL prepare";
		}

		if(!$stmt->bind_param("ss", $username, $password)){
			echo "FAIL bind";
		}

		if(!$stmt->execute()){
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
		$connection->close();
	}

}
?>
