<?php

require_once 'Database.class.php';

class UserTools extends Database
{
    private function zuiverData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data, ENT_QUOTES);
        return $data;
    }

    public function getAllUsers()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM user";
        return $this->getData($sql, $connection);
    }

    public function getUserById($id)
    {

        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM user WHERE id = ?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $firstname, $familyname, $departmentId);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "name" => $firstname,
                "familyName" => $familyname,
                "departmentId" => $departmentId
            ];
            $stmt->close();
        }
        return $data;
    }


    public function registerAdmin($username, $password)
    {
        $connection = $this->connect();
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

    public function registerUser($firstname, $familyname, $departmentid)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO user (name, familyName, departmentId) VALUES (?, ?,?)")) {
            echo "FAIL prepare";
            return false;
        }

        if (!$stmt->bind_param("ssi", $firstname, $familyname, $departmentid)) {
            echo "FAIL bind";
            return false;
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }

        $var = $stmt->insert_id;
        $stmt->close();
        $connection->close();

        return $var;
    }


    public function makeOrganization($name, $extrainfo)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO organization (name, extraInfo) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ss", $this->zuiverData($name), $this->zuiverData($extrainfo))) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }

    public function makeTemplate($quizId, $name, $template)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO quiz_template (quizId, name, template) VALUES (?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("iss", $this->zuiverData($quizId), $this->zuiverData($name), $template)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }

    public function updateOrganization($id, $name, $extrainfo)
    {

        $connection = $this->connect();

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

    public function updateTemplate($id, $quizId, $name, $template)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE quiz_template SET name = ? , quizId = ?, template=? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sisi", $name, $quizId, $template, $id)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function updateAnswer($id, $answer, $correct)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE Answer SET answer = ? , correct = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sii", $this->zuiverData($answer), $this->zuiverData($correct), $this->zuiverData($id))) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function deleteDepartment($id)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM department WHERE id = ?")) {
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

    public function deleteOrganization($id)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM department WHERE organizationId = ?")) {
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
        $connection = $this->connect();

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

    public function makeDepartment($name, $organizationid)
    {
        $connection = $this->connect();

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


    public function makeDifficulty($difficulty)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO difficulty (difficulty) VALUES (?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("s", $difficulty)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }

    public function makeCategory($category)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO category (category) VALUES (?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("s", $category)) {
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
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO quiz (name, `extraInfo`) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ss", $this->zuiverData($name), $this->zuiverData($extrainfo))) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }


        $stmt->close();
        $connection->close();
    }

    private function linkQuestionToQuiz($quizId, $questionId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO quiz_questions (quizId, questionId) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ii", $quizId, $questionId)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function makeQuestion($question, $difficulty, $imgLink, $time, $category, $quizId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO question (question, difficulty, imageLink, time, category) VALUES (?, ?, ?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sisss", $this->zuiverData($question), $difficulty, $imgLink, $time, $category)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        //echo "<script>console.log('test')</script>";
        //$this->linkQuestionToQuiz($quizId, $stmt->insert_id);

        $this->linkQuestionToQuiz($quizId, $stmt->insert_id);

        $stmt->close();
        $connection->close();


    }

    //DANGER -> This will remove every child
    public function deleteQuizandQuestions($quizId)
    {
        $connection = $this->connect();
        if ($stmt = $connection->prepare("SELECT * FROM quiz_questions WHERE quizId = ?")) {
            $stmt->bind_param("i", $quizId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            if ($stmt->bind_result($id, $questionId)) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            $data = array();

            while ($stmt->fetch()) {
                array_push($data, $questionId);
                $this->deleteQuestionWithId($questionId);
            }
            $stmt->close();

            foreach ($data as $value) {
                $this->deleteQuestionWithId($value);
            }

        }


        $connection = $this->connect();

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


        $connection = $this->connect();

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

    public function deleteQuiz($id)
    {


        $connection = $this->connect();

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

    public function deleteDifficultyWithId($id)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM difficulty WHERE id = ?")) {
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

    public function deleteTemplate($id)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM quiz_template WHERE id = ?")) {
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


    public function deleteCategory($id)
    {


        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM category WHERE id = ?")) {
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


    public function updateQuestion($id, $question, $difficulty, $category, $imgLink, $time)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE question SET question = ? , difficulty = ? , category = ? , imageLink = ? , time = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("siissi", $question, $difficulty, $category, $imgLink, $time, $id)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function updateDepartment($id, $name)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE department SET name = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("si", $name, $id)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function updateQuiz($id, $name, $extrainfo)
    {

        $connection = $this->connect();

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

    public function updatedifficulty($id, $difficulty)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE difficulty SET difficulty = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("si", $difficulty, $id)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function updateCategory($id, $category)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE category SET category = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("si", $category, $id)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function makeAnswer($questionid, $answer, $correct)
    {
        $connection = $this->connect();

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

    public function deleteQuestionWithId($qid)
    {

        $connection = $this->connect();

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

        $connection = $this->connect();

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

    public function deleteAnswerWithId($aid)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM answer WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("i", $aid)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }


    public function makeUserAnswer($userid, $answerid, $time)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO answer_user (userId, awnserId, time) VALUES (?, ?, ?)")) {
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
        $connection = $this->connect();
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

    public function changeSchema($demapartmentId, $schemeId)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE department SET schemeId = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ii", $schemeId, $demapartmentId)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function getAllQuizzes()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM quiz";
        return $this->getData($sql, $connection);
    }

    public function getAllTemplates()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM quiz_template";
        return $this->getData($sql, $connection);
    }

    public function getAllDifficulties()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM difficulty";
        return $this->getData($sql, $connection);
    }

    public function getAllCategories()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM category";
        return $this->getData($sql, $connection);
    }

    public function getAllOrganization()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM organization";
        return $this->getData($sql, $connection);
    }

    public function getAllDepartmentsById($organizationId)
    {

        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM department WHERE organizationId =?")) {
            $stmt->bind_param("i", $organizationId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $organizationId, $schemeId);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "name" => $name,
                    "organizationId" => $organizationId,
                    "schemeId" => $schemeId
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            return $data;
        }
    }

    public function getAllDepartments()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM department";
        return $this->getData($sql, $connection);


    }

    public function getQuizInfoById($id)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM quiz WHERE id=?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $extraInfo);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "name" => $name,
                "extraInfo" => $extraInfo
            ];
            $stmt->close();
        }
        return $data;
    }


    public function getQuestionById($id)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM question WHERE id=?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $question, $difficulty, $imageLink, $time, $category);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "question" => $question,
                "difficulty" => $difficulty,
                "imageLink" => $imageLink,
                "time" => $time,
                "category" => $category
            ];
            $stmt->close();
        }
        return $data;
    }


    public function getAllQuestionsByQuizId($quizId)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE quizId = ?")) {
            $stmt->bind_param("i", $quizId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $question, $difficulty, $imageLink, $time, $category, $quizidextra, $questionidextra);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "question" => $question,
                    "difficulty" => $difficulty,
                    "imageLink" => $imageLink,
                    "time" => $time,
                    "category" => $category
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            return $data;
        }
    }


    public function getAllAnswersByQuestionId($questionId)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM answer WHERE questionId =?")) {
            $stmt->bind_param("i", $questionId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $answer, $quistionId, $correct, $category);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "answer" => $answer,
                    "quistionId" => $questionId,
                    "correct" => $correct,
                    "category" => $category
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            return $data;
        }
    }


    public function getLogs()


    {
        $connection = $this->connect();
        $sql = "SELECT * FROM logs";

        return $this->getData($sql, $connection);
    }

    public function getAnswersByUser($userId)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT answer.id, answer.answer, answer.questionId, answer.correct  FROM answer JOIN answer_user ON answer.id = answer_user.awnserId WHERE userId = ?")) {
            $stmt->bind_param("i", $userId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $answer, $questionId, $correct);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "answer" => $answer,
                    "questionId" => $questionId,
                    "correct" => $correct
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            return $data;
        }
    }


    public function getRandomQuestionsByTemplate($templateId, $quizid)
    {

        //$templateId = 3;

        $connection = $this->connect();

<<<<<<< HEAD
      $stmt = $connection->prepare("SELECT template from quiz_template where id = ?");
      $stmt->bind_param("i",$templateId);
      if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}else{
        //echo "succesfull";
      }
      //echo "<h3>DIKKE TEST</h3>";
=======
        $stmt = $connection->prepare("SELECT template from quiz_template where id = ?");
        $stmt->bind_param("i", $templateId);
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            echo "succesfull";
        }
        echo "<h3>DIKKE TEST</h3>";
>>>>>>> 013521482b10ed4244a593c07f09ebf12e73c89b

        if (!$stmt->bind_result($template)) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->fetch();

        //echo "template".$template;

        //print_r($template);

<<<<<<< HEAD
      $phptemplate = json_decode($template);
      //print_r($phptemplate);
      $all = array();

      foreach($phptemplate as $category => $difficultyArray ){
        //echo "category: ".$category;
        foreach ( $difficultyArray as $difficulty => $aantal) {
          if($aantal > 0){
            //array_push($all,$this->getAnswersByCategoryAndDifficulty($category, $difficulty, $quizid, $aantal));
            $all = array_merge($all,$this->getAnswersByCategoryAndDifficulty($category, $difficulty, $quizid, $aantal));
          }
          // echo "<br><br>";
          // echo "<p>all: ";
          // print_r($all);
          // echo "<br><br>";
=======
        $phptemplate = json_decode($template);
        print_r($phptemplate);

        foreach ($phptemplate as $category => $difficultyArray) {
            echo "category: " . $category;
            foreach ($difficultyArray as $difficulty => $aantal) {
                if ($aantal < 0) {
                    //all = getallbyparams($category, $diff)
                    //randoms.push(all(rand($aantal)));
                }
                echo "";

            }
>>>>>>> 013521482b10ed4244a593c07f09ebf12e73c89b
        }

      return $all;
    }

<<<<<<< HEAD
  public function getAnswersByCategoryAndDifficulty($category,$difficulty,$quizId,$aantal){
    //echo "hello";
    $connection= $this->connect();
    //SELECT * from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = 3 and difficulty = 1 and quiz_questions.quizId = 3
    $sql = "SELECT id from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = ? and difficulty = ? and quiz_questions.quizId = ? ";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iii",$category,$difficulty,$quizId);
    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->bind_result($quiestionid);
    $answersarray=array();
    while($stmt -> fetch()){
      array_push($answersarray,$quiestionid);
    };
      $stmt->close();

      // echo "<p>aantal:";
      // echo $aantal;
      // echo "<p>answersarray:</p>";
      // print_r($answersarray);

      $random_keys = array();
      $random_keys=array_rand($answersarray,$aantal);

      $random_answers = array();

      if($aantal > 1){
      for($i = 0;$i<$aantal;$i++){
        $random_answers[$i] = $answersarray[$random_keys[$i]];
      }
      return $random_answers;
    }else{
      return $answersarray;
    }


      // echo "<p>randomkeys:</p>";
      // print_r($random_keys);
      //
      // echo "<p>random_answers:</p>";
      // print_r($random_answers);

      return $random_keys;
  }

	public function getStatisticsByDepartment($demapartmentId){
=======
    public function getAnswersByCategoryAndDifficulty($category, $difficulty, $quizId)
    {
        $connection = $this->connect();
        //SELECT * from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = 3 and difficulty = 1 and quiz_questions.quizId = 3
        $sql = "SELECT id from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = ? and difficulty = ? and quiz_questions.quizId = ? ";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iii", $category, $difficulty, $quizId);
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->bind_result($id, $answer, $questionId, $correct);
        $answersarray = array();
        while ($stmt->fetch()) {
            array_push($id, $answer, $questionId, $correct);
        };
        $stmt->close();
        echo "<p>answersarray:</p>";
        print_r($answersarray);
        return $answersarray;
    }
>>>>>>> 013521482b10ed4244a593c07f09ebf12e73c89b


    public function getCorrectAnswersByUserId($id)  //TODO fix die lelijke typo in de databank (awnserId in answer_user)
    {
        $connection = $this->connect();
        //SELECT * from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = 3 and difficulty = 1 and quiz_questions.quizId = 3
        $sql = "select answer_user.* from answer_user join answer on answer.id = answer_user.awnserId where correct = 1 and userId = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->bind_result($id, $userId, $answerId, $time);
        $data = array();

        while ($stmt->fetch()) {
            $subarray = [
                "id" => $id,
                "userId" => $userId,
                "answerId" => $answerId,
                "time" => $time
            ];
            array_push($data, $subarray);
        }
        $stmt->close();
        return $data;
    }


    public function getStatisticsByDepartment($demapartmentId)
    {

    }


    protected function getRandomQuestionsByQuizId($id)
    {
        return shuffle($this->getAllQuestionsByQuizId($id));
    }


    public function getStatisticsByOragnization($organizationId)
    {
    }


}
