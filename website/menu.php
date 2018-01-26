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
    <h1 class="header">Welkom</h1>
    <p>Welkom op het administratiepaneel. Start met een quiz te maken door op de "quiz" link links in het menu te klikken</p>
    <br>

        <h3>Handleiding</h3>

        <p class="flow-text">Indien niet alles duidelijk is kunt u de handleiding <a href="assets/files/Handleiding-Quiz.docx">hier</a> downloaden</p>

</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>




<?php
require_once "tail.html";
?>
