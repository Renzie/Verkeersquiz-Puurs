<?php
$filename = $_GET['val'];
         // Fetch the file info.
 $filePath = $_SERVER['DOCUMENT_ROOT'] . "/files/".$filename;

    if(file_exists($filePath)) {
        $fileName = basename($filePath);
        $fileSize = filesize($filePath);

        // Output headers.
        header("Cache-Control: private");
        header("Content-Type: application/stream");
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".$fileName);

        // Output file.
        readfile ($filePath);
        exit();
    }
    else {
        die('The provided file path is not valid.');
    }
 ?>