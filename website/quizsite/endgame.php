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
        <li class="amber">
            <div class="caption center-align">
                <h3><i class="material-icons large">videogame_asset</i></h3>
                <h4 class="light grey-text text-lighten-3"> Well done <span class="username"></span>! You just finished your quiz!</h4>
            </div>
        </li>
        <li class="red">
            <div class="caption left-align">
                <h3>Your score is ...</h3>
                <h5 class="light grey-text text-lighten-3">//TODO</h5>
            </div>
        </li>
        <li class="blue">
            <div class="caption right-align">
                <h3>Review</h3>
                <h5 class="light grey-text text-lighten-3">//TODO</h5>
            </div>
        </li>

        <li class="purple">
            <div class="caption center-align">
                <h3>Thank you for playing the quiz!</h3>
                <h5 class="light grey-text text-lighten-3"><a class="btn" href="index.php">Play another quiz!</a> </h5>
            </div>
        </li>
    </ul>
</div>
</body>
</html>

