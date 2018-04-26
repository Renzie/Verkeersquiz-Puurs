<?php
    session_start();

    if(!isset($_SESSION['login'])){
      header("location:login.php");
    }

    if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > (60 * 60 * 24)) { // 1 day
        header("location:logout.php");
    } else if (time() - $_SESSION['CREATED'] > (60 * 60 * 2)) { // 2 hours, if the person comes back in 2 hours, add 2 more hours
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time

    }
?>
