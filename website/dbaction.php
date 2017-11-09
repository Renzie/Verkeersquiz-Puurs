<?php
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";

$usertools = new UserTools();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case 'updateOrganization':
            //$usertools->makeOrganization($_POST['schoolName'],$_POST['schoolInfo']);
            //$usertools->makeOrganization("testtesttest", "myinfo");
            $usertools->updateOrganization($_POST['schoolId'],$_POST['schoolName'],$_POST['schoolInfo']);
            break;

        case 'createOrganization':
            $usertools->makeOrganization($_POST['schoolName'],$_POST['schoolInfo']);
            break;
        case 'deleteOrganization':
            $usertools->deleteOrganization($_POST['schoolId']);
            break;
        case 'deleteQuiz':
            $usertools->deleteQuizandQuestions($_POST['quizId']);
            break;
        case 'updateQuiz':
            $usertools->updateQuiz($_POST['quizId'],$_POST['quizName'],$_POST['quizInfo']);
            break;
        case 'createQuiz':
            $usertools->makeQuiz($_POST['quizName'],$_POST['quizInfo']);
            break;
        case 'createQuestion':

            break;
        case 'updateQuestion':

            break;
        case 'deleteQuestion':

            break;
        case 'createAnswer':

            break;
        case 'updateAnswer':

            break;
        case 'deleteAnswer':

            break;
    }
}











 ?>
