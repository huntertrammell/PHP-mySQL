<?php
    $connection = mysqli_connect('localhost:3307', 'root', 'root', 'loginapp');
    if(!$connection){
        die("Database connection failed" . mysqli_error($connection));
    }
?>