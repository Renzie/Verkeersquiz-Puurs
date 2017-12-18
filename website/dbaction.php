<?php
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";

$usertools = new UserTools();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case 'getCurrentQuestion' :
            echo $usertools->getQuestionById($_POST['questionId']);
                break;
        case 'updateOrganization':
            $usertools->updateOrganization($_POST['schoolId'], $_POST['schoolName'], $_POST['schoolInfo']);
            break;
        case 'createOrganization':
            $usertools->makeOrganization($_POST['schoolName'], $_POST['schoolInfo']);
            break;
        case 'deleteOrganization':
            $usertools->deleteOrganization($_POST['schoolId']);
            break;
        case 'deleteQuiz':
            $usertools->deleteQuizandQuestions($_POST['quizId']);
            break;
        case 'updateQuiz':
            $usertools->updateQuiz($_POST['quizId'], $_POST['quizName'], $_POST['quizInfo']);
            break;
        case 'createQuiz':
            $usertools->makeQuiz($_POST['quizName'], $_POST['quizInfo']);
            break;
        case 'createQuestion':
            $usertools->makeQuestion($_POST['question'], $_POST['difficulty'], $_POST['imgLink'], $_POST['time'], $_POST['category'], $_POST['quizId']);
            break;
        case 'updateQuestion':
            $usertools->updateQuestion($_POST['questionId'], $_POST['question'], $_POST['difficulty'], $_POST['imgLink'], $_POST['time']);
            break;
        case 'deleteQuestion':
            $usertools->deleteQuestionWithId($_POST['questionId']);
            break;
        case 'makeAnswer':
            $usertools->makeAnswer($_POST['questionId'], $_POST['answer'], $_POST['correct']);
            break;
        case 'updateAnswer':
            $usertools->updateAnswer($_POST['answerId'], $_POST['answer'], $_POST['correct']);
            break;
        case 'deleteAnswer':
            $usertools->deleteAnswerWithId($_POST['answerId']);
            break;
        case 'deleteDifficulty':
            $usertools->deleteDifficultyWithId($_POST['diffId']);
            break;
        case 'makeDifficulty':
            $usertools->deleteDifficultyWithId($_POST['diffId']);
            break;
    }
}
?>
