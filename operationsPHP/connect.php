<?php
    header('Content-Type: text/html; charset=utf-8');
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'cost_tracker';

    $conn = new mysqli($server, $username, $password, $db);
    if($conn -> connect_error){
        die("Adatbázis hiba: ". $conn->error);
    }
    $conn->set_charset("utf8");
?>