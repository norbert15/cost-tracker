<?php
    require_once '../flight/Flight.php';
    require_once '../operationsPHP/connect.php';

    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        Flight::set("email", trim($_POST['email']));
        Flight::set("password", md5(trim($_POST['password'])));
    
        Flight::set("sql", "SELECT * FROM `users` WHERE `email` = '". Flight::get("email")."' AND `password` = '" . Flight::get("password")."'");
        $result = mysqli_query($conn, Flight::get("sql"));

        if($result->num_rows > 0){
            $_SESSION["email"] = Flight::get("email");
            echo json_encode(['status' => 'success']);
         }else{
            echo json_encode(['status' => 'error', 'message' => 'Az email cím vagy jelszó helytelen!']);
         }
    }
?>