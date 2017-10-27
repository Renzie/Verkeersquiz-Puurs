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
        echo $organizationId;
        $connection= $this->connect();
        echo "<p>hello its me</p>";
        if ($stmt = $connection->prepare("SELECT * FROM department WHERE OrganizationId =?")) {
            $stmt->bind_param("i", $organizationId);
            echo "<p>hello its me2</p>";
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            echo "<p>hello its me3</p>";
            $data = array();
            $stmt->get_result($result);
            if ($result->num_rows !=0) {
              echo "<p>hello its me4</p>";
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                  }
            } else {
                echo "<p>hello its me5</p>";
            }
            echo "hello its me";
            $stmt->close();
            return $data;
        }
    }

    protected function getAllQuestionsById($quizId)
    {
    }

    protected function getAllAnswersById($questionId)
    {
    }

    protected function getLogs()
    {
        $connection= $this->connect();
        $sql = "SELECT * FROM logs";

        return $this->getData($sql, $connection);
    }

    protected function getAnswersByUser($userId)
    {
    }

    protected function getStatisticsByOragnization($organizationId)
    {
    }
}
