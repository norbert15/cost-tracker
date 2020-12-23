<?php
    header('Content-Type: text/html; charset=utf-8');
    
    Flight::set("server", "localhost");
    Flight::set("username", "root");
    Flight::set("password", "");
    Flight::set("db", "cost_tracker");

    $conn = new mysqli(Flight::get("server"), Flight::get("username"), Flight::get("password"), Flight::get("db"));
    if($conn ->connect_error){
        die("Adatbázis hiba: ". $conn->error);
    }
    $conn->set_charset("utf8");
?>