<?php

    $host_name = 'localhost';
    $database = 'blog';
    $user_name = 'root';
    $password = 'root';

    $connect = new mysqli($host_name, $user_name, $password, $database);

    if ($connect->connect_error) {
    die('<p>Database connection error : '. $connect->connect_error .'</p>');
    }

?>
