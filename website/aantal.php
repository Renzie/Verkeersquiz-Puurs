<?php
session_start();

/*if(!$_SESSION['login']){
   header("location:logout.php");
   //die;
}*/



require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();




?>

    <h1>Aantal vragen per categorie</h1>
    <?php
    $view->getAnswersOverview($_GET["id"]);
    ?>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>


<?php

require_once "tail.html";

?>
