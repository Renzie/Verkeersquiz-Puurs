<?php

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
    <script src="assets/js/endgame.js"></script>

</head>
<body>
<div class="slider fullscreen">
    <ul class="slides">
        <li class="indigo darken-4">
            <img src="#"/>
            <div class="caption center-align">
                <h3><i class="material-icons large">check</i></h3>
                <h4 class="light grey-text text-lighten-3"> Goed gedaan <span class="username"></span>! Je hebt je quiz succesvol ingevuld!</h4>
            </div>
        </li>
        <li class="red darken-4">
            <div class="caption left-align">
                <h5>Je score is ...</h5>
                <h3 class="score"></h3>
            </div>
        </li>
        <li class="blue darken-4">
            <div class="caption right-align review">
                <h3>Score verdeling:</h3>
                <h5 class="light grey-text text-lighten-3"></h5>
                <ul class=""></ul>


            </div>
        </li>

        <li class="purple">
            <div class="caption center-align">
                <h3>Bedankt voor het spelen van onze quiz!</h3>
                <h5 class="light grey-text text-lighten-3"><a class="btn" href="index.php">Speel nog een quiz!</a> </h5>
            </div>
        </li>
    </ul>
</div>
</body>
</html>

