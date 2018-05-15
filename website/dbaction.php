<?php
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";


$usertools = new UserTools();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'getQuestionAndAnswerByQuizId':
            echo ($usertools->getQuestionAndAnswerByQuizId($_POST['quizId']));
            break;
        case 'getUsers' :
            echo json_encode($usertools->getAllUsers());
            break;
        case 'getAll' :
            echo json_encode($usertools->getAll($_POST['quizId']));
            break;
        case 'getAllQuestionsByQuizId' :
            echo json_encode($usertools->getAllQuestionsByQuizId($_POST['quizId']));
            break;
        case 'getTemplateByDepartmentId' :
            echo json_encode($usertools->getTemplateByDepartmentId($_POST['departmentId'], $_POST['quizId']));
            break;
        case 'getAllOrganisations' :
            echo json_encode($usertools->getAllOrganisation());
            break;
        case 'getDifficultyById' :
            echo json_encode($usertools->getDifficultyById($_POST['difficultyId']));
            break;
        case 'getCategoryById' :
            echo json_encode($usertools->getCategoryById($_POST['categoryId']));
            break;
        case "getAnswers" :
            echo json_encode($usertools->getAnswersByUserId($_POST['userId']));
            break;
        case "getAnswersByUser" :
            echo json_encode($usertools->getAnswersByUser($_POST['userId']));
            break;
        case 'getUser' :
            echo json_encode($usertools->getUserById($_POST['userId']));
            break;
        case 'getUsersByDepartmentId' :
            echo json_encode($usertools->getUsersByDepartmentId($_POST['departmentId']));
            break;
        case 'getDepartmentByDepartmentId' :
            echo json_encode($usertools->getDepartmentByDepartmentId($_POST['departmentId']));
            break;
        case 'getDepartments' :
            echo json_encode($usertools->getAllDepartments());
            break;
        case 'getDepartmentsByOrganisationId' :
            echo json_encode($usertools->getAllDepartmentsById($_POST['organisationId']));
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

        case 'toggleActiveQuiz':
            echo $usertools->toggleActiveQuiz($_POST['quizId']);

        case 'sendAnswer' :
            $usertools->makeUserAnswer($_POST['userId'], $_POST['answerId'], $_POST['time']);
            echo "success"; break;
        case 'updateOrganisation':
            $usertools->updateOrganisation($_POST['schoolId'], $_POST['schoolName'], $_POST['schoolInfo']);
            echo "success"; break;
        case 'createOrganisation':
            $usertools->makeOrganisation($_POST['schoolName'], $_POST['schoolInfo']);
            echo "success"; break;
        case 'deleteOrganisation':
            $usertools->deleteOrganisation($_POST['schoolId']);
            echo "success"; break;
        case 'deleteQuiz':
            $usertools->deleteQuizandQuestions($_POST['quizId']);
            echo "success"; break;
        case 'updateQuiz':
            $usertools->updateQuiz($_POST['quizId'], $_POST['quizName'], $_POST['quizInfo']);
            echo "success"; break;
        case 'createQuiz':
            $usertools->makeQuiz($_POST['quizName'], $_POST['quizInfo']);
            echo "success"; break;
        case 'createQuestion':
            $usertools->makeQuestion($_POST['question'], $_POST['difficulty'], $_POST['imgLink'], $_POST['category'], $_POST['quizId']);
            echo "success"; break;
        case 'updateQuestion':
            $usertools->updateQuestion($_POST['questionId'],$_POST['question'],$_POST['difficulty'],$_POST['category'],$_POST['imgLink']);
            echo "success"; break;
        case 'deleteQuestion':
            $usertools->deleteQuestionWithId($_POST['questionId']);
            echo "success"; break;
        case 'makeAnswer':
            $usertools->makeAnswer($_POST['questionId'], $_POST['answer'], $_POST['correct']);
            echo "success"; break;
        case 'updateAnswer':
            $usertools->updateAnswer($_POST['answerId'], $_POST['answer'], $_POST['correct']);
            echo "success"; break;
        case 'deleteAnswer':
            $usertools->deleteAnswerWithId($_POST['answerId']);
            echo "success"; break;
        case 'deleteDifficulty':
            $usertools->deleteDifficultyWithId($_POST['diffId']);
            echo "success"; break;
        case 'makeDifficulty':
            $usertools->makeDifficulty($_POST['difficulty'],$_POST['time']);
            echo "success"; break;
        case 'updateDifficulty':
            $usertools->updateDifficulty($_POST['diffid'],$_POST['difficulty'],$_POST['time']);
            echo "success"; break;
        case 'deleteCategory':
            $usertools->deleteCategory($_POST['catId']);
            echo "success"; break;
        case 'makeCategory':
            $usertools->makeCategory($_POST['category']);
            echo "success"; break;
        case 'updateCategory':
            $usertools->updateCategory($_POST['catid'],$_POST['category']);
            echo "success"; break;
        case 'deleteDepartment':
            $usertools->deleteDepartment($_POST['departmentId']);
            echo "success"; break;
        case 'updateDepartment':
            $usertools->updateDepartment($_POST['departmentId'],$_POST['departmentName']);
            echo "success"; break;
        case 'makeDepartment':
            $usertools->makeDepartment($_POST['departmentName'], $_POST['organisationId']);
            echo "success"; break;
        case 'submitTemplate':
            $usertools->makeTemplate($_POST['quizId'], $_POST['name'], $_POST['template']);
            echo "success"; break;
        case 'updateTemplate':
            $usertools->updateTemplate($_POST['templateId'],$_POST['quizId'], $_POST['name'], $_POST['template']);
            echo "success"; break;
        case 'deleteTemplate':
            $usertools->deleteTemplate($_POST['templateId']);
            echo "success"; break;
        case 'dupeOrganisation':
            $usertools->dupeOrganisation($_POST['schoolId']);
            echo "success"; break;
        case 'changeSchema':
            $usertools->changeSchema($_POST['departmentId'],$_POST['schemeId']);
            echo "success"; break;
        case 'addExtraQuestion':
            $usertools->addExtraQuestion($_POST['templatedepartmentid']);
            echo "success"; break;
        case 'createTemplateDepartment':
            $usertools->createTemplateDepartment($_POST['schemaId'], $_POST['departmentId'],  $_POST['quizId']);
            echo "success"; break;
        case 'updateTemplateDepartment':
            $usertools->updateTemplateDepartment($_POST['schemaId'], $_POST['departmentId'],  $_POST['quizId']);
            echo "success"; break;
        default:
            echo "error";
            break;
        }
}
?>
