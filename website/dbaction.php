<?php
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";


$usertools = new UserTools();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case 'getCategoryById' :
            echo json_encode($usertools->getCategoryById($_POST['categoryId']));
            break;

        case "getAnswers" :
            echo json_encode($usertools->getAnswersByUserId($_POST['userId']));
            break;
        case 'getUser' :
            echo json_encode($usertools->getUserById($_POST['userId']));
            break;
        case 'sendAnswer' :
            $usertools->makeUserAnswer($_POST['userId'], $_POST['answerId'], $_POST['time']);
            break;

        case 'getDepartmentByDepartmentId' :
            echo json_encode($usertools->getDepartmentByDepartmentId($_POST['departmentId']));
            break;
        case 'getDepartments' :
            echo json_encode($usertools->getAllDepartments());
            break;
        case 'getRandomQuestionsByQuizId' :
            echo json_encode($usertools->getRandomQuestionsByTemplate($_POST['templateId'], $_POST['quizId']));
            break;
        case 'getCurrentQuiz' :
            echo json_encode($usertools->getQuizInfoById($_POST['quizId']));
            break;
        case 'getQuestionById' :
            echo json_encode($usertools->getQuestionById($_POST['questionId']));
            break;
        case 'getAnswersByQuestionId' :
            echo json_encode($usertools->getAllAnswersByQuestionId($_POST['questionId']));
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
            $usertools->makeQuestion($_POST['question'], $_POST['difficulty'], $_POST['imgLink'], $_POST['category'], $_POST['quizId']);
            break;
        case 'updateQuestion':
            $usertools->updateQuestion($_POST['questionId'],$_POST['question'],$_POST['difficulty'],$_POST['category'],$_POST['imgLink']);
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
            $usertools->makeDifficulty($_POST['difficulty'],$_POST['time']);
            break;
        case 'updateDifficulty':
            $usertools->updateDifficulty($_POST['diffid'],$_POST['difficulty'],$_POST['time']);
            break;
        case 'deleteCategory':
            $usertools->deleteCategory($_POST['catId']);
            break;
        case 'makeCategory':
            $usertools->makeCategory($_POST['category']);
            break;
        case 'updateCategory':
            $usertools->updateCategory($_POST['catid'],$_POST['category']);
            break;
        case 'deleteDepartment':
            $usertools->deleteDepartment($_POST['departmentId']);
            break;
        case 'updateDepartment':
            $usertools->updateDepartment($_POST['departmentId'],$_POST['departmentName']);
            break;
        case 'makeDepartment':
            $usertools->makeDepartment($_POST['departmentName'], $_POST['organizationId']);
            break;
        case 'submitTemplate':
            $usertools->makeTemplate($_POST['quizId'], $_POST['name'], $_POST['template']);
            break;
        case 'updateTemplate':
            $usertools->updateTemplate($_POST['templateId'],$_POST['quizId'], $_POST['name'], $_POST['template']);
            break;
        case 'deleteTemplate':
            $usertools->deleteTemplate($_POST['templateId']);
            break;
        case 'changeSchema':
            $usertools->changeSchema($_POST['departmentId'],$_POST['schemeId']);
            echo '200';
            break;
        default:
            echo '404';
            break;
}
}
?>
