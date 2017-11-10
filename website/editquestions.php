<?php
require_once "head.html";

session_start();

/*if(!$_SESSION['login']){
   header("location:logout.php");
   //die;
}*/



?>
<div id="wijzigvragen" class="col s12">
    <h1>Quiz: ...</h1>
    <h3>Vragen Wijziging</h3>



    <ul class="questions collapsible" data-collapsible="expandable">
        <li class="question">
            <div class="collapsible-header">
                <i class="material-icons">chevron_right</i>
                Links of rechts
                </div>
                <div class="collapsible-body">
                    <label>Vraag</label>
                    <input value="Links of rechts" class=" col s6" type="text" placeholder="text vraag"/>

                    <div class="editquestion row">
                        <div class="input-field col s5">
                            <select>
                                <option value="" disabled selected>Selecteer de moeilijkheidsgraad</option>
                                <option value="makkelijk">Makkelijk</option>
                                <option value="normaal">Normaal</option>
                                <option value="moeilijk">Moeilijk</option>
                            </select>
                            <label>Moelijkheidsgraad</label>



                        </div>
                        <div class="col s4 file-field ">
                            <div>
                                <label>Afbeelding</label>
                                <img class="materialboxed questionimg" src="#">
                            </div>



                        </div>
                        <div class="questionbuttons col s3 file-field input-field">
                            <a data-tooltip="Voeg een foto toe" class=" btn tooltipped btn-small waves-effect waves-light purple">
                                <i class="material-icons">add_a_photo</i> <input class="imageupload" type="file" accept="image/gif, image/jpeg, image/png">
                            </a>

                        </div>
                    </div>


                    <ul class="answers row">
                        <li>
                            <h4>Antwoorden</h4>
                        </li>
                        <li class="answer">
                            <div class="  input-field col s12">
                                <input placeholder="Antwoord" type="text" class="validate">


                                <a class="removeanswer btn btn-small waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                                <a data-tooltip="Markeer deze antwoord als correct"
                                   class="markcorrect tooltipped btn btn-small waves-effect waves-light green"><i
                                        class="material-icons">done</i></a>
                            </div>
                        </li>

                    </ul>

                    <div class="row">
                        <div class="col s6">
                            <a data-tooltip="Voeg een nieuwe antwoord"
                               class="newanswer tooltipped btn btn-small waves-effect waves-light blue"><i
                                    class="material-icons">add</i></a>
                        </div>

                        <div class="col s3 offset-s3 ">
                            <a data-tooltip="Sla de vraag op"
                               class="markcorrect tooltipped pulse btn btn-small waves-effect waves-light purple"><i
                                    class="material-icons">save</i></a>
                            <a
                               class="removeanswer  btn btn-small waves-effect waves-light red"><i
                                    class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
        </li>
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
