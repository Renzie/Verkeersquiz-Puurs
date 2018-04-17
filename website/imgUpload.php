<?php
//TODO this should be in the same page, not here
    $id = $_GET["id"];
    $file = file_get_contents('php://input');
    file_put_contents('images/imageQuestion_'.$id.'.png', base64_decode($file));
?>
