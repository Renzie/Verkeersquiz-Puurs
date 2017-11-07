<?php
require_once "head.html";

?>

<div id="maakquiz" class="col s12">
    <h1>Maak een nieuwe quiz</h1>
    <div class="row">

        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Quiz123" id="quizname" type="text" class="validate">
                    <label for="quizname">Naam quiz</label>
                </div>
            </div>



            <button class="btn waves-effect waves-light" type="submit" name="action">Sla quiz op
                <i class="material-icons right">send</i>
            </button>

        </form>
    </div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>

<?php

require_once "tail.html";

?>

