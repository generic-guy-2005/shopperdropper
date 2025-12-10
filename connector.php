<?php
    $host = "localhost";
    $user = "root";
    $password = "282005";
    $db = "db_shopperdropper";

    $connection = new mysqli($host, $user, $password, $db);

    if($connection -> connect_error){
        echo "Connection Timed Out: " . $connection -> connect_error;
        exit;
    }
?>