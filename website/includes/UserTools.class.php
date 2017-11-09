<?php

require_once 'Database.class.php';

class UserTools extends Database
{
    protected function getAllUsers()
    {
        $connection= $this->connect();
        $sql = "SELECT * FROM user";
        return $this->getData($sql, $connection);
    }

    protected function registerAdmin($username, $password)
    {
        $connection= $this->connect();
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt = $connection->prepare("INSERT INTO login (username, password) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ss", $username, $password)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }

	protected function registerUser($firstname, $familyname, $departmentid)
    {
        $connection= $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO user (name, familyName, departmentId) VALUES (?, ?,?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ssi", $firstname, $familyname, $departmentid)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }





  public function makeOrganization($name, $extrainfo)
  {
	  $connection= $this->connect();

	  if (!$stmt = $connection->prepare("INSERT INTO organization (name, extraInfo) VALUES (?, ?)")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("ss", $name, $extrainfo)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();
  }

  public function updateOrganization($id,$name,$extrainfo){

    $connection= $this->connect();

	  if (!$stmt = $connection->prepare("UPDATE organization SET name = ? , extraInfo = ? WHERE id = ?")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("ssi", $name, $extrainfo, $id)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();

  }

  public function deleteOrganization($id){

    $connection= $this->connect();

	  if (!$stmt = $connection->prepare("DELETE FROM organization WHERE id = ?")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("i", $id)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();

  }

  protected function makeDepartment($name, $organizationid){
		$connection= $this->connect();

		if (!$stmt = $connection->prepare("INSERT INTO department (name, organizationId) VALUES (?, ?)")) {
			echo "FAIL prepare";
		}

		if (!$stmt->bind_param("si", $name, $organizationid)) {
			echo "FAIL bind";
		}

		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->close();
		$connection->close();
	}


  protected function makeDifficulty($difficulty)
  {
	  $connection= $this->connect();

	  if (!$stmt = $connection->prepare("INSERT INTO difficulty (difficulty) VALUES (?)")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("s",$difficulty)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();
  }

  public function makeQuiz($name, $extrainfo)
  {
	  $connection= $this->connect();

	  if (!$stmt = $connection->prepare("INSERT INTO quiz (name, `extraInfo`) VALUES (?, ?)")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("ss", $name, $extrainfo)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();
  }

  //DANGER -> This will remove every child
  public function deleteQuizandQuestions($quizId){
    $connection= $this->connect();
    if ($stmt = $connection->prepare("SELECT * FROM quiz_questions WHERE quizId = ?")) {
        $stmt->bind_param("i", $quizId);

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if($stmt->bind_result($id, $questionId)){
          echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }


        $data = array();

        while($stmt -> fetch()){
          array_push($data,$questionId);
          $this->deleteQuestionWithId($questionId);
        }
        $stmt->close();

        foreach ($data as $value) {
          $this->deleteQuestionWithId($value);
        }

    }



    $connection= $this->connect();

    if (!$stmt = $connection->prepare("DELETE FROM quiz_questions WHERE quizId = ?")) {
      echo "FAIL prepare";
    }

    if (!$stmt->bind_param("i", $quizId)) {
      echo "FAIL bind";
    }

    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->close();
    $connection->close();


    $connection= $this->connect();

    if (!$stmt = $connection->prepare("DELETE FROM quiz WHERE id = ?")) {
      echo "FAIL prepare";
    }

    if (!$stmt->bind_param("i", $quizId)) {
      echo "FAIL bind";
    }

    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->close();
    $connection->close();


  }

  public function deleteQuiz($id){


    $connection= $this->connect();

	  if (!$stmt = $connection->prepare("DELETE FROM quiz WHERE id = ?")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("i", $id)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();

  }

  public function updateQuiz($id,$name,$extrainfo){

    $connection= $this->connect();

	  if (!$stmt = $connection->prepare("UPDATE quiz SET name = ? , extraInfo = ? WHERE id = ?")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("ssi", $name, $extrainfo, $id)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();

  }

  protected function makeAnswer($answer, $questionid, $correct)
  {
	  $connection= $this->connect();

	  if (!$stmt = $connection->prepare("INSERT INTO answer (answer, questionId, correct) VALUES (?, ?, ?)")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("sii", $answer, $questionid, $correct)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();
  }



  protected function deleteQuestionWithId($qid){

    $connection= $this->connect();

    if (!$stmt = $connection->prepare("DELETE FROM answer WHERE questionId = ?")) {
      echo "FAIL prepare";
    }

    if (!$stmt->bind_param("i", $qid)) {
      echo "FAIL bind";
    }

    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->close();
    $connection->close();

    $connection= $this->connect();

    if (!$stmt = $connection->prepare("DELETE FROM question WHERE id = ?")) {
      echo "FAIL prepare";
    }

    if (!$stmt->bind_param("i", $qid)) {
      echo "FAIL bind";
    }

    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }


    $stmt->close();
    $connection->close();
  }


  protected function makeUserAnswer($userid, $answerid, $time)
  {
	  $connection= $this->connect();

	  if (!$stmt = $connection->prepare("INSERT INTO answer_user (userId, answerId, time) VALUES (?, ?, ?)")) {
		  echo "FAIL prepare";
	  }

	  if (!$stmt->bind_param("iis", $userid, $answerid, $time)) {
		  echo "FAIL bind";
	  }

	  if (!$stmt->execute()) {
		  echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	  }
	  $stmt->close();
	  $connection->close();
  }



    public function login($username, $password)
    {
        $connection= $this->connect();
        if ($stmt = $connection->prepare("SELECT password FROM login WHERE username=?")) {
            $stmt->bind_param("s", $username);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($resultPassword);
            $stmt->fetch();
            $stmt->close();
        }
        return password_verify($password, $resultPassword);
    }

    protected function getAllQuizzes()
    {
        $connection= $this->connect();
        $sql = "SELECT * FROM quiz";
        return $this->getData($sql, $connection);
    }

    protected function getAllOrganization()
    {
        $connection= $this->connect();
        $sql = "SELECT * FROM organization";
        return $this->getData($sql, $connection);
    }

    protected function getAllDepartmentsById($organizationId)
    {

        $connection= $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM department WHERE organizationId =?")) {
            $stmt->bind_param("i", $organizationId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $organizationId);
            $data = array();

            while($stmt -> fetch()){
              $subarray = [
                "id"=>$id,
                "name"=>$name,
                "organizationId"=>$organizationId
              ];
              array_push($data,$subarray);
            }
            $stmt->close();
            return $data;
        }
    }

	public function getQuizInfoById($id){
		$connection= $this->connect();
		$data = array();
        if ($stmt = $connection->prepare("SELECT * FROM quiz WHERE id=?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id,$name,$extraInfo);
            $stmt->fetch();
			$data = [
			  "id"=>$id,
			  "name"=>$name,
			  "extraInfo"=>$extraInfo
			];
            $stmt->close();
        }
		return $data;


	}

    protected function getAllQuestionsByQuizId($quizId)
    {
		$connection= $this->connect();

		if ($stmt = $connection->prepare("SELECT * FROM question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE quizId = ?")) {
			$stmt->bind_param("i", $quizId);

			if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			$stmt->bind_result($id, $question, $difficulty, $imageLink, $time,$quizidextra,$questionidextra);
			$data = array();

			while($stmt -> fetch()){
			  $subarray = [
				"id"=>$id,
				"question"=>$question,
				"difficulty"=>$difficulty,
				"imageLink"=>$imageLink,
				"time"=>$time
			  ];
			  array_push($data,$subarray);
			}
			$stmt->close();
			return $data;
		}
    }

    protected function getAllAnswersByQuestionId($questionId)
    {
		$connection= $this->connect();

		if ($stmt = $connection->prepare("SELECT * FROM answer WHERE questionId =?")) {
			$stmt->bind_param("i", $questionId);

			if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			$stmt->bind_result($id, $answer, $quistionId,$correct);
			$data = array();

			while($stmt -> fetch()){
			  $subarray = [
				"id"=>$id,
				"answer"=>$answer,
				"quistionId"=>$questionId,
				"correct"=>$correct
			  ];
			  array_push($data,$subarray);
			}
			$stmt->close();
			return $data;
		}
    }

    protected function getLogs()
    {
        $connection= $this->connect();
        $sql = "SELECT * FROM logs";

        return $this->getData($sql, $connection);
    }

    protected function getAnswersByUser($userId)
    {
		$connection= $this->connect();

		if ($stmt = $connection->prepare("SELECT answer.id, answer.answer, answer.questionId, answer.correct  FROM answer JOIN answer_user ON answer.id = answer_user.awnserId WHERE userId = ?")) {
			$stmt->bind_param("i", $userId);

			if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			$stmt->bind_result($id, $answer, $questionId, $correct);
			$data = array();

			while($stmt -> fetch()){
			  $subarray = [
				"id"=>$id,
				"answer"=>$answer,
				"questionId"=>$questionId,
				"correct"=>$correct
			  ];
			  array_push($data,$subarray);
			}
			$stmt->close();
			return $data;
		}
    }

	protected function getStatisticsByDepartment($demapartmentId)
	{

	}

    protected function getStatisticsByOragnization($organizationId)
    {
    }
}
