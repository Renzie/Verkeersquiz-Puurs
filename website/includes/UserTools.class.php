<?php

require_once 'Database.class.php';

class UserTools extends Database{
	protected function getAllUsers(){
		$connection= $this->connect();
		$sql = "SELECT * FROM user";
		return $this->getData($sql,$connection);
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

	public function login($username, $password){
		$connection= $this->connect();
		//$password = password_hash($password, PASSWORD_DEFAULT);

		//echo "<p>firstpass:".$password."</p>";

			if ($stmt = $connection->prepare("SELECT password FROM login WHERE username=?")) {

	    	/* bind parameters for markers */
		    $stmt->bind_param("s", $username);

		    /* execute query */
			if(!$stmt->execute()){
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}

		    /* bind result variables */
				//$resultPassword = $stmt->get_result();
		    $stmt->bind_result($resultPassword);



			//echo "<p>resultPassword:".$resultPassword."</p>";

		    /* fetch value */
		    $stmt->fetch();

			/*
			echo "<p>password:</p>";
			printf($resultPassword);
			*/

		    //printf("%s is in district %s\n", $city, $district);

		    /* close statement */
		    $stmt->close();

			/* check passwords */


			}
		return password_verify($password, $resultPassword);

	}

	protected function getAllQuizzes(){
		$connection= $this->connect();
		$sql = "SELECT * FROM quiz";

		$result = $connection->query($sql);
		$numRows = $result->num_rows;
		$data = array();

		if($numRows > 0){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			$connection->close();

		}

		return $data;

	}

	protected function getAllOrganization(){
		$connection= $this->connect();
		$sql = "SELECT * FROM organization";

		return $this->getData($sql,$connection);
	}

	protected function getAllDepartmentsById($organizationId){}

	protected function getAllQuestionsById($quizId){}

	protected function getAllAnswersById($questionId){}

	protected function getLogs(){
		$connection= $this->connect();
		$sql = "SELECT * FROM logs";

		return $this->getData($sql,$connection);
	}

	protected function getAnswersByUser($userId){}

	protected function getStatisticsByOragnization($organizationId){}




}
?>
