<?php
include('session.php');



require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();


//TODO make it so it is able to disable the quiz, ex. example quiz that you can toggle the visibility

?>

    <h1>Maak een quiz</h1>
    <table class="striped quizzes">
        <thead>
        <tr>
            <th>Naam quiz</th>
            <th>Extra info</th>
        </tr>
        </thead>
        <tbody class="tabel_quiz">
          <?php $view->getQuizzes(); ?>
        </tbody>
    </table>
    <br />
    <a class="btn add_new_quiz"><i class="material-icons right">add</i>Nieuwe quiz</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>

<?php

require_once "tail.html";

?>
