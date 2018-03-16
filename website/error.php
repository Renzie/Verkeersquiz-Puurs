<?php
require_once "head.html";
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
  if (!empty($error_msg)) {
    foreach ($error_msg as $err) {
      echo $err . '<br>';
    }
  }
  else {
    echo 'Something went wrong.';
  }
  require_once "tail.html";
?>
