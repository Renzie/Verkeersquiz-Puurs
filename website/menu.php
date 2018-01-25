<?php
session_start();
require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$usertools = new UserTools();


if(!$_SESSION['login']){
   header("location:logout.php");
   //die;
}
?>
<div class="is-main-content">
    <h1 class="header">Menu</h1>



    <article>
        <h3>Quiz</h3>
        <a href="createquiz.php" class="btn inline">Maak een nieuwe quiz<i class="material-icons right">add</i></a>
        <a href="editquiz.php" class="btn orange">Wijzig een gebruikte quiz<i class="material-icons right">edit</i></a>
        <a href="editquestions.php" class="btn purple">Wijzig de vragen per moeilijkheidsgraad</a>
        <p class="flow-text">De vragen per moeilijkheidsvraag kunnen toegevoegd / gewijzigd worden.</p>

    </article>

    <article>
        <h3>Handleiding</h3>
        <p class="flow-text">Indien niet alles duidelijk wordt alles nog eens uitgelegt in de <a href="download.php?val=Handleiding.docx" target="_blank">handleiding dat u hier kan downloaden.</a></p>

    </article>

    <article>
        <h3>School</h3>
        <h3><a href="organisatie.php" class="btn">Organisaties</a></h3>
        <p class="flow-text">Bekijk hier de organisaties en wijzig ze indien nodig.</p>
    </article>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>




<?php
require_once "tail.html";
?>
