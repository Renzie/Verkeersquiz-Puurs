<?php

require_once 'Database.class.php';

class UserTools extends Database
{
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
            $stmt->bind_result($id, $firstname, $familyname, $departmentId, $quizId);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "name" => $firstname,
                "familyName" => $familyname,
                "departmentId" => $departmentId,
                "quizId" => $quizId
            ];
            $stmt->close();
            $connection->close();
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

    public function registerUser($firstname, $familyname, $departmentid, $quizId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO user (name, familyName, departmentId, quizId) VALUES (?, ?,?, ?)")) {
            echo "FAIL prepare";
            return false;
        }

        if (!$stmt->bind_param("ssii", $firstname, $familyname, $departmentid, $quizId)) {
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


    public function makeOrganisation($name, $extrainfo)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO organisation (name, extraInfo) VALUES (?, ?)")) {
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

    public function makeTemplate($quizId, $name, $template)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO quiz_template (quizId, name, template) VALUES (?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("iss", $quizId, $name, $template)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }

    public function updateOrganisation($id, $name, $extrainfo)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE organisation SET name = ? , extraInfo = ? WHERE id = ?")) {
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

        //echo "<script>console.log('id: ".$id." correct:".$correct."')</script>";

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE answer SET answer = ? , correct = ? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sii", $answer, $correct, $id)) {
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

    public function deleteOrganisation($id)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("DELETE FROM department WHERE organisationId = ?")) {
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

        if (!$stmt = $connection->prepare("DELETE FROM organisation WHERE id = ?")) {
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

    public function makeDepartment($name, $organisationid)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO department (name, organisationId) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("si", $name, $organisationid)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();
    }


    public function makeDifficulty($difficulty, $time)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO difficulty (difficulty,time) VALUES (?,?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("si", $difficulty, $time)) {
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

        if (!$stmt = $connection->prepare("INSERT INTO quiz (name, extraInfo, active) VALUES (?, ?, 0)")) {
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

    public function makeQuestion($question, $difficulty, $imgLink, $category, $quizId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO question (question, difficulty, imageLink, category) VALUES (?, ?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sisi", $question, $difficulty, $imgLink, $category)) {
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
            $connection->close();

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


    public function updateQuestion($id, $question, $difficulty, $category, $imgLink)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE question SET question = ? , difficulty = ? , category = ? , imageLink = ?  WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("siisi", $question, $difficulty, $category, $imgLink, $id)) {
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

    public function updatedifficulty($id, $difficulty, $time)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE difficulty SET difficulty = ? , time=? WHERE id = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sii", $difficulty, $time, $id)) {
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
            $connection->close();
        }
        return password_verify($password, $resultPassword);
    }

    //TODO Change this to the other schema
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

    public function getAllQuestions(){
        $connection = $this->connect();
        $sql = "SELECT * FROM question";
        return $this->getData($sql, $connection);
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

    public function getAllOrganisation()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM organisation";
        return $this->getData($sql, $connection);
    }

    public function getAllDepartmentsById($organisationId)
    {

        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM department WHERE organisationId =?")) {
            $stmt->bind_param("i", $organisationId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $organisationId);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "name" => $name,
                    "organisationId" => $organisationId
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
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

            $stmt->bind_result($id, $name, $extraInfo, $active);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "name" => $name,
                "extraInfo" => $extraInfo,
                "active" => $active
            ];
            $stmt->close();
            $connection->close();
        }
        return $data;
    }

    public function getUsersByDepartmentId($id)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT * FROM user WHERE departmentId =?")) {
            $stmt->bind_param("i", $id);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $familyName, $departmentId, $quizId);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "name" => $name,
                    "familyName" => $familyName,
                    "departmentId" => $departmentId,
                    "quizId" => $quizId
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
            return $data;
        }
    }

    public function getOrganisationInfoById($id)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM organisation WHERE id=?")) {
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
            $connection->close();
        }
        return $data;
    }

    public function getDifficultyById($id)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM difficulty WHERE id=?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $difficulty, $time);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "difficulty" => $difficulty,
                "time" => $time,

            ];
            $stmt->close();
            $connection->close();
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
            $stmt->bind_result($id, $question, $difficulty, $imageLink, $category);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "question" => $question,
                "difficulty" => $difficulty,
                "imageLink" => $imageLink,
                "category" => $category
            ];
            $stmt->close();
            $connection->close();
        }
        return $data;
    }


    public function getAllQuestionsByQuizId($quizId)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT question.* FROM question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE quizId = ?")) {
            $stmt->bind_param("i", $quizId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->bind_result($id, $question, $difficulty, $imageLink, $category);

            $i = 0;
            while ($stmt->fetch()) {
                $subarray = array();
                $subarray = [
                    "id" => $id,
                    "question" => $question,
                    "difficulty" => $difficulty,
                    "imageLink" => $imageLink,
                    "category" => $category
                ];

                $data[$i++] = $subarray;
            }
            $stmt->close();
            $connection->close();

        }

        return $data;
    }

    public function getAllExtraQuestions($template_department_id)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT question.* FROM question JOIN template_question ON question.id = template_question.questionId WHERE template_question.templateId = ?")) {
            $stmt->bind_param("i", $template_department_id);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $question, $difficulty, $imageLink, $category);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "question" => $question,
                    "difficulty" => $difficulty,
                    "imageLink" => $imageLink,
                    "category" => $category
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
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

            if (!$stmt->bind_result($id, $answer, $quistionId, $correct)) {
                echo "FAIL bind";
            }

            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "answer" => $answer,
                    "quistionId" => $questionId,
                    "correct" => $correct
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
            return $data;
        }
    }

    public function getQuestionAndAnswerByQuizId($quizId){
        $connection = $this->connect();

        if ($stmt = $connection->prepare("select question.*, answer.id, answer.answer, answer.correct from question join answer on answer.questionId = question.id join quiz_questions on quiz_questions.questionId = question.id where quiz_questions.quizId = ? ORDER BY answer.questionId")) {
            $stmt->bind_param("i", $quizId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->bind_result($questionId, $question, $difficulty, $imageLink, $category, $answerId, $answer, $correct)) {
                echo "FAIL bind";
            }

            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "questionId" => $questionId,
                    "question" => $question,
                    "difficulty" => $difficulty,
                    "imageLink" => $imageLink,
                    "category" => $category,
                    "answerId" => $answerId,
                    "answer" => $answer,
                    "correct" => $correct
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
            return json_encode($data);
        }
    }


    public function getLogs()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM logs";

        return $this->getData($sql, $connection);
    }

    public function writeLog($log)
    {
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO logs (message) VALUES (?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("s", $log)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function getAnswersByUser($userId)
    {
        $connection = $this->connect();

        if ($stmt = $connection->prepare("SELECT answer.id, answer.answer, answer.questionId, answer.correct, answer_user.userId  FROM answer JOIN answer_user ON answer.id = answer_user.awnserId WHERE userId = ?")) {
            $stmt->bind_param("i", $userId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $answer, $questionId, $correct, $userId);
            $data = array();

            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "answer" => $answer,
                    "questionId" => $questionId,
                    "correct" => $correct,
                    "userId" => $userId
                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
            return $data;
        }
    }

    public function getDepartmentByDepartmentId($departmentId)
    {
        $connection = $this->connect();
        if ($stmt = $connection->prepare("select * from department where id = ?")) {
            $stmt->bind_param("i", $departmentId);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $name, $organisationId);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "name" => $name,
                "organisationId" => $organisationId
            ];
            $stmt->close();
            $connection->close();
            return $data;
        }
    }

    public function getAnswersByUserId($id)
    {
        $connection = $this->connect();
        if ($stmt = $connection->prepare("select answer.*,question.category from answer_user join answer on answer.id = answer_user.awnserId join question on answer.questionId = question.id  where answer_user.userId = ?")) {
            $stmt->bind_param("i", $id);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $answer, $questionId, $correct, $category);

            $data = array();
            while ($stmt->fetch()) {
                $subarray = [
                    "id" => $id,
                    "answer" => $answer,
                    "questionId" => $questionId,
                    "correct" => $correct,
                    "category" => $category

                ];
                array_push($data, $subarray);
            }
            $stmt->close();
            $connection->close();
            return $data;
        }
    }

    public function getAll(){
        $data = array();
        array_push($data, $this->getAllDepartments());
        array_push($data, $this->getAllOrganisation());
        array_push($data, $this->getAllUsers());
        array_push($data, $this->getAllAnswers());
        array_push($data, $this->getAllQuizzes());
        return $data;
    }

    public function getAllAnswers(){
        $connection = $this->connect();
        $sql = "select answer_user.*, answer.correct from answer_user join answer on answer.id = answer_user.awnserId";
        return $this->getData($sql, $connection);
    }



    public function getRandomQuestionsByTemplate($templateId, $quizid)
    {

        //$templateId = 3;

        $connection = $this->connect();

        $stmt = $connection->prepare("SELECT template from quiz_template where id = ?");
        $stmt->bind_param("i", $templateId);
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!$stmt->bind_result($template)) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->fetch();

        //echo "template".$template;

        //print_r($template);

        $phptemplate = json_decode($template);
        //print_r($phptemplate);
        $all = array();

        foreach ($phptemplate as $category => $difficultyArray) {
            //echo "category: ".$category;
            foreach ($difficultyArray as $difficulty => $aantal) {
                if ($aantal > 0) {
                    //array_push($all,$this->getAnswersByCategoryAndDifficulty($category, $difficulty, $quizid, $aantal));
                    //TODO check if this works
                    $tmp = array();
                    $tmp = $this->getAnswersByCategoryAndDifficulty($category, $difficulty, $quizid, $aantal);
                    if ($tmp != "empty") {
                        $all = array_merge($all, $tmp);
                    }

                }
                // echo "<br><br>";
                // echo "<p>all: ";
                // print_r($all);
                // echo "<br><br>";
            }
        }


        return $all;
    }

    public function getTemplateByDepartmentId($did, $qid)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("select * from template_department where departmentId = ? and quizId = ?")) {
            if (!$stmt->bind_param("ii", $did, $qid)) {
                echo "FAIL bind";
            }
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $schemaId, $departmentId, $quizId);
            $stmt->fetch();


            $data = [
                "id" => $id,
                "schemaId" => $schemaId,
                "departmentId" => $departmentId,
                "quizId" => $quizId

            ];
            $stmt->close();
            $connection->close();
        }
        return $data;

    }

    public function getAnswersByCategoryAndDifficulty($category, $difficulty, $quizId, $aantal)
    {
        //echo "hello";
        $connection = $this->connect();
        //SELECT * from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = 3 and difficulty = 1 and quiz_questions.quizId = 3
        $sql = "SELECT id from question JOIN quiz_questions ON question.id = quiz_questions.questionId WHERE category = ? and difficulty = ? and quiz_questions.quizId = ? ";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iii", $category, $difficulty, $quizId);
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->bind_result($quiestionid);
        $answersarray = array();
        while ($stmt->fetch()) {
            array_push($answersarray, $quiestionid);
        };
        $stmt->close();
        $connection->close();

        // echo "<p>aantal:";
        // echo $aantal;
        // echo "<p>answersarray:</p>";
        // print_r($answersarray);


        $random_answers = array();

        if ($aantal > 1) {
            $random_keys = array();
            $random_keys = array_rand($answersarray, $aantal);
            for ($i = 0; $i < $aantal; $i++) {
                $random_answers[$i] = $answersarray[$random_keys[$i]];
            }
            return $random_answers;
        } else {
            return "empty";
        }


        // echo "<p>randomkeys:</p>";
        // print_r($random_keys);
        //
        // echo "<p>random_answers:</p>";
        // print_r($random_answers);

        //TODO Komt zelfs nooit hier door de if hierboven
        //return $random_keys;
    }

    public function getCategoryById($id)
    {
        $connection = $this->connect();
        $data = array();
        if ($stmt = $connection->prepare("SELECT * FROM category WHERE id = ?")) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $stmt->bind_result($id, $category);
            $stmt->fetch();
            $data = [
                "id" => $id,
                "category" => $category,
            ];
            $stmt->close();
            $connection->close();
        }
        return $data;
    }





    public function checkTemplateDepartment($did, $quizid)
    {
        $data = array();
        $return = false;
        $connection = $this->connect();

        if (!$stmt = $connection->prepare("SELECT * FROM template_department WHERE departmentId=? AND quizId=?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ii", $did, $quizid)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->bind_result($id, $schemaId, $departmentId, $quizid);
        $stmt->fetch();
        if ($stmt->num_rows > 0) {
            $return = true;
        }

        $stmt->close();
        $connection->close();

        $data = [
            $id,
            $schemaId
        ];

        return $data;

    }

    public function addExtraQuestion($template_department_id)
    {

        $connection = $this->connect();

        //params
        $question = "nieuwe extra vraag";
        $difficulty = 1;
        $imgLink = "";
        $category = 1;

        if (!$stmt = $connection->prepare("INSERT INTO question (question, difficulty, imageLink, category) VALUES (?, ?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("sisi", $question, $difficulty, $imgLink, $category)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        //echo "<script>console.log('test')</script>";
        //$this->linkQuestionToQuiz($quizId, $stmt->insert_id);

        $this->linkQuestionToTemplateQuestion($template_department_id, $stmt->insert_id);

        $stmt->close();
        $connection->close();


    }

    public function linkQuestionToTemplateQuestion($template_department_id, $questionId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO template_question (templateId, questionId) VALUES (?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("ii", $template_department_id, $questionId)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function createTemplateDepartment($schemaId, $departmentId, $quizId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("INSERT INTO template_department (schemaId, departmentId, quizId) VALUES (?, ?, ?)")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("iii", $schemaId, $departmentId, $quizId)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function updateTemplateDepartment($schemaId, $departmentId, $quizId)
    {

        $connection = $this->connect();

        if (!$stmt = $connection->prepare("UPDATE template_department SET schemaId = ? WHERE departmentId = ? AND quizId = ?")) {
            echo "FAIL prepare";
        }

        if (!$stmt->bind_param("iii", $schemaId, $departmentId, $quizId)) {
            echo "FAIL bind";
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmt->close();
        $connection->close();

    }

    public function dupeOrganisation($organisationId)
    {
        $connection = $this->connect();

        if (!$stmtOrg = $connection->prepare('insert into organisation(name,extraInfo) select Concat(name, " kopie"), extraInfo from organisation where id= ?')) {
            echo "FAIL prepare";
        }
        if (!$stmtDep = $connection->prepare('insert into department(name,organisationId) select department.name, LAST_INSERT_ID() from department join organisation on department.organisationId = organisation.id where organisation.id = ? ')) {
            echo "FAIL prepare";
        }

        if (!$stmtOrg->bind_param("i", $organisationId)) {
            echo "FAIL bind";
        }

        if (!$stmtDep->bind_param("i", $organisationId)) {
            echo "FAIL bind";
        }

        if (!$stmtOrg->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!$stmtDep->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $stmtOrg->close();
        $stmtDep->close();
        $connection->close();
    }

    public function toggleActiveQuiz($quizId){
        $connection = $this->connect();
        //UPDATE quiz SET active = !active where id = ?

        if (!$stmt = $connection->prepare('UPDATE quiz SET active = !active where id = ?')) {
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



}
