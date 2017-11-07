<?php
require_once "head.html";

?>

<div id="maakquiz" class="col s12">
    <div class="row">
        <h2>Maak een nieuwe quiz</h2>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<?php

require_once "tail.html";

?>

