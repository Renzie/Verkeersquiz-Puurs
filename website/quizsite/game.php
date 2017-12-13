<?php


require_once "../includes/View.class.php";

$view = new View();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/materialize/css/materialize.css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/screen.css" rel="stylesheet">


    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/materialize/js/materialize.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/game.js"></script>

</head>
<body>

<!--
<div class="preloader-background">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>-->
<nav>
    <div class="nav-wrapper">
        <a class="brand-logo center ">(Quiznaam)</a>

        <div class="account  row ">
            <a class="col offset-s11">Name</a>
        </div>
    </div>
</nav>
<main class="container">
    <div class="content">


        <div class="card">

            <p class="flow-text">Vraag <span>1/20</span></p>

            <div class="col s11 progress  lighten-4">
                <div class="determinate purple"></div>
            </div>
        </div>

        <?php



        ?>

        <div class="container">
            <form action="">
                <div class="row">
                    <div class="card z-depth-5 row question">
                        <div class="card-title">
                            <h2 class="card-title title center">Vraag 1</h2>
                        </div>

                        <div class="card-image waves-effect waves-block waves-light">
                            <img style="width:35vw ;height: 20vw" class="activator image"
                                 src="assets/image/Afbeelding1.jpg">
                        </div>
                        <div class="col offset-2">
                            In een Zone 30 mag je op straat spelen:
                        </div>
                        <div class="card-content row question">

                            <div class="col s11 progress red lighten-4 timebar">
                                <div class="determinate red timeleft"></div>
                            </div>
                            <div class="time col s1">
                                <span class="seconds flow-text">0</span>
                            </div>
                        </div>
                        <div class="card-action answers">
                            <p>
                                <input name="group1" type="radio" id="answer-1"/>
                                <label for="answer-1">Mag je op straat spelen</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="answer-2"/>
                                <label for="answer-2">Mogen er geen zebrapaden gemarkeerd worden</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="answer-3"/>
                                <label for="answer-3">Mag een fietser niet sneller dan 30 rijden</label>
                            </p>
                        </div>
                        <div class="card-action">
                            <input type="submit" id="eindevraag" value="Volgende vraag" class="btn red">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</main>
</body>
</html>

