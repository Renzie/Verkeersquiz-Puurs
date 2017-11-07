<?php
require_once "head.html";

?>
    <div id="wijzigvragen" class="col s12">
        <h1>Vragen Wijziging</h1>
        <div class="row">
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Kies je moeilijkheidsgraad die je wilt aanpassen</option>
                    <option value="makkelijk">Makkelijk</option>
                    <option value="normaal">Normaal</option>
                    <option value="moeilijk">Moeilijk</option>
                </select>
                <label>Moelijkheidsgraad</label>
            </div>
        </div>

        <ul class="questions collapsible" data-collapsible="expandable">
            <li class="question">
                <div class="collapsible-header valign-wrapper input-field"><i class="material-icons">add_box</i><input
                        style="width:50%" class=" " type="text" placeholder="text vraag"/>
                    <img class="materialboxed questionimg" src="#">
                    <div class="questionsettings file-field input-field">
                        <a data-tooltip="Voeg een foto toe"
                           class=" btn tooltipped btn-large waves-effect waves-light purple"><i
                                class="material-icons">add_a_photo</i> <input class="imageupload" type="file"
                                                                              accept="image/gif, image/jpeg, image/png"></a>


                        <a href="#questionmodal" data-tooltip="Verwijder deze vraag"
                           class="modal-trigger btn tooltipped btn-large waves-effect waves-light red"><i
                                class="material-icons">delete</i></a>

                    </div>

                </div>
                <div class="collapsible-body">
                    <ul class="answers row">
                        <li class="answer">
                            <div class="  input-field col s12">
                                <input placeholder="Antwoord" type="text" class="validate">

                                <a data-tooltip="Voeg een nieuwe antwoord"
                                   class="newanswer tooltipped btn-floating btn-small waves-effect waves-light blue"><i
                                        class="material-icons">add</i></a>
                                <a data-tooltip="Verwijder deze antwoord"
                                   class="removeanswer tooltipped btn-floating btn-small waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                                <a data-tooltip="Markeer deze antwoord als correct"
                                   class="markcorrect tooltipped btn-floating btn-small waves-effect waves-light green"><i
                                        class="material-icons">done</i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <a data-tooltip="Voeg een nieuwe vraag"
           class="newquestion tooltipped btn-floating btn-small waves-effect waves-light blue"><i
                class="material-icons">add</i></a>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/quiz.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
<?php

require_once "tail.html";

?>