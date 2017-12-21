<?php
require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$usertools = new UserTools();


?>
<div class="is-main-content">
    <h1 class="header">Menu <?php echo $usertools->registerUser('Renzie','Omaña',1);?></h1>

    <article>
        <h3>TESTING RANDOMQUIZGENERATOR</h3>
        <?php
        print_r( $usertools->getRandomQuestionsByTemplate(9,1));
        //$usertools->getAnswersByCategoryAndDifficulty(1,2,1);

        ?>
    </article>

    <article>
        <h3>Quiz</h3>
        <a href="createquiz.php" class="btn inline">Maak een nieuwe quiz<i class="material-icons right">add</i></a>
        <a href="editquiz.php" class="btn orange">Wijzig een gebruikte quiz<i class="material-icons right">edit</i></a>
        <a href="editquestions.php" class="btn purple">Wijzig de vragen per moeilijkheidsgraad</a>
        <p class="flow-text">De vragen per moeilijkheidsvraag kunnen toegevoegd / gewijzigd worden.</p>

    </article>

    <article>
        <h3>School</h3>
        <h3><a href="organizatie.php" class="btn">Organizaties</a></h3>
        <p class="flow-text">Bekijk hier de organizaties en wijzig ze indien nodig.</p>
    </article>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>




<?php
require_once "tail.html";
?>
