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

        if ($stmt = $connection->prepare("SELECT * FROM department WHERE OrganizationId =?")) {
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

    protected function getAllQuestionsByQuizId($quizId)
    {
		$connection= $this->connect();

		if ($stmt = $connection->prepare("SELECT * FROM question JOIN quiz_questions ON question.id = quiz_questions.QuestionId WHERE QuizId = ?")) {
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

    protected function getAllAnswersById($questionId)
    {
		$connection= $this->connect();

		if ($stmt = $connection->prepare("SELECT * FROM answer WHERE QuestionId =?")) {
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

		if ($stmt = $connection->prepare("SELECT answer.id, answer.answer, answer.questionId, answer.correct  FROM answer JOIN answer_user ON answer.id = answer_user.AwnserId WHERE UserId = ?")) {
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

    protected function getStatisticsByOragnization($organizationId)
    {
    }
}
