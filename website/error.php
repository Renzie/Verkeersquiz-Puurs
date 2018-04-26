<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Error</title>
        <link href="assets/css/reset.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/materialize/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>
        <link href="assets/css/screen.css" rel="stylesheet"/>
        <style>
            #errorMsg{
                margin:20px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <div class="section"></div>
        <main class="center">

        <h5 class="indigo-text">Quizplatform</h5>
        <div class="section"></div>


        <div class="loginpanel z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <p id="errorMsg">


<?php

  $error_msg = array();
  if (isset($_GET['q']) && is_numeric($_GET['q'])) {
    $status = array(
      400 => array('400 Bad Request', 'Er is iets mis gegaan, probeer later opnieuw.'),
      401 => array('401 Login Error', 'Login gefaald, probeer opnieuw.'),
      403 => array('403 Forbidden', 'Toegang geweigerd.'),
      404 => array('404 Missing', "Pagina bestaat niet meer."),
      405 => array('405 Method Not Allowed', 'Methode niet toegestaan.'),
      408 => array('408 Request Timeout', "Request Timeout."),
      414 => array('414 URL To Long', "URL is te lang? Plz no hacking!"),
      500 => array('500 Internal Server Error', 'Problemen met de server! Probeer later opnieuw.'),
      502 => array('502 Bad Gateway', 'Problemen met de server! Probeer later opnieuw'),
      504 => array('504 Gateway Timeout', "Gateway timeout"),
    );
    $error_msg = $status[$_GET['q']];
  }

  if(!empty($error_msg)) {
    foreach ($error_msg as $err) {
      echo $err . '<br><br>';
    }
  }else {
    echo 'Something went wrong.';
  }

?>

            </p>
            </div>
            <div class="section"></div>
            <div class="section"></div>
        </main>
    </body>
</html>
