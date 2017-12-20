<?php


/**
 * Created by PhpStorm.
 * User: Renzie
 * Date: 20/12/2017
 * Time: 13:33
 */

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
        <a class="brand-logo center quizname"></a>

        <div class="account  row  username">
            <a class="col offset-s10"></a>
        </div>
    </div>
</nav>
<main class="container">
        <div class="content">
        <div class="card quiz_progress">

            <p class="flow-text">Vraag <span class="current_position"></span></p>

            <div class="col s11 progress lighten-4">
                <div class="determinate blue"></div>
            </div>
        </div>

        <div class="container">
            <form action="">
                <div class="row">
                    <div class="card z-depth-5 row question">
                        <div class="card-title">
                            <h2 class="card-title center question_number"></h2>
                        </div>

                        <div class="card-image waves-effect waves-block waves-light">
                            <img style="width:35vw ;height: 20vw" class="activator image"
                            >
                        </div>
                        <div class="col offset-2" data-role="question">

                        </div>
                        <div class="card-content row question">

                            <div class="col s11 progress red lighten-4 timebar">
                                <div class="determinate red timeleft"></div>
                            </div>
                            <div class="time col s1">
                                <span class="seconds flow-text">0</span>
                            </div>
                        </div>
                        <div class="card-action answers" data-role="answers">




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

