<?php
//This is the Roels Special

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

    <h1>Maak een quiz</h1>
    <table class="striped ">
        <thead>
        <tr>
            <th>Naam quiz</th>
            <th>Extra info</th>
        </tr>
        </thead>
        <tbody class="tabel_quiz">
          <?php
         $view->getQuizzes();
           ?>
        </tbody>



    </table>
    <a class="btn add_new_quiz"><i class="material-icons right">add</i>Nieuwe quiz</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>


<?php

require_once "tail.html";

?>
