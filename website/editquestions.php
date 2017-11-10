<?php
session_start();
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
require_once "head.html";



/*if(!$_SESSION['login']){
   header("location:logout.php");
   //die;
}

if(!isset($_GET["id"])){
	header("location:createquiz.php");
}

$userTools = new UserTools();
$view = new View();
$data = array();
$data = $userTools->getQuizInfoById($_GET["id"]);
*/




?>
<div id="wijzigvragen" class="col s12">
    <h1>Quiz: <?php echo $data["name"]?></h1>





    <ul class="questions collapsible" data-collapsible="expandable">
			<?php $view->getAllQuestionsById($_GET["id"]) ?>
    </ul>
    <a data-tooltip="Voeg een nieuwe vraag"
       class="newquestion tooltipped btn btn-small waves-effect waves-light blue"><i
            class="material-icons">add</i></a>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<?php

require_once "tail.html";
?>
