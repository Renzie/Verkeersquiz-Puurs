<?php
require_once "includes/UserTools.class.php";
$userTools = new UserTools();
$questions = array();
$questions = $userTools->getAllQuestions();



//$this->getAnswerByQuestionId();
//$this->getAllQuestions();




?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Print alle vragen!</title>
        <link href="./assets/css/print.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php


        foreach ($questions as $questionKey => $questionValue) {
            $question =  $questionValue["question"];
            $qId = $questionValue["id"];
            $img = $questionValue["imageLink"];

            if($img == "") $img = "No-image-found.jpg";
            echo "<div class='question'>
                <p>$question</p>
                <img src='./images/$img' />
                <div class='answer'>";
            $answerData = $userTools->getAllAnswersByQuestionId($qId);
            foreach ($answerData as $answerKey => $answerValue) {
                $correct = $answerValue['correct'];
                $answer = $answerValue['answer'];
                echo "<p correct='$correct'>$answer</p>";
            }
            echo "</div></div>";
        }
        ?>





        <!-- <script>window.print()</script> -->
    </body>
</html>
