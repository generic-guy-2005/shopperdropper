<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "db_shopperdropper";

    $connection = new mysqli($host, $user, $password, $db);

    if($connection -> connect_error){
        echo "Connection Timed Out: " . $connection -> connect_error;
        exit;
    }
?>