<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="assets/css/reset.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/materialize/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/screen.css" rel="stylesheet"/>
</head>

<body class="loaded">
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
    <div class="section"></div>
    <main class="center">

        <h5 class="indigo-text">Quizplatform</h5>
        <div class="section"></div>


            <div class="loginpanel z-depth-1 grey lighten-4 row"
                 style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='username' id='username'/>
                            <label for='username'>Gebruikersnaam</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password'/>
                            <label for='password'>Wachtwoord</label>
                        </div>

                    </div>


                    <div class='row'>
                        <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                    </div>

                </form>
            </div>

        <a class="" href="#!">Create account</a>


        <div class="section"></div>
        <div class="section"></div>
    </main>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/quiz.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <?php

    require_once "tail.html";

    ?>

