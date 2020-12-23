<?php
    require_once '../flight/Flight.php';
    require_once '../operationsPHP/connect.php';

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        Flight::set("name", trim($_POST['name']));
        Flight::set("email", trim($_POST['email']));
        Flight::set("password", md5(trim($_POST['password'])));

        Flight::set("check_email", "SELECT * FROM `users` WHERE `email` = '".Flight::get("email")."'");
        $result = mysqli_query($conn, Flight::get("check_email"));

        if($result->num_rows > 0){
           echo json_encode(['status' => 'error', 'message' => 'Az email cím már foglalt!']);
        }else if(!filter_var(Flight::get("email"), FILTER_VALIDATE_EMAIL)){
           echo json_encode(['status' => 'error', 'message' => 'Helytelen email cím formátum!']);
        }
        else{
            Flight::set("date", date("Y-m-d"));
            Flight::set("sql", "INSERT INTO `users`(`fullname`, `email`, `password`) 
            VALUES ('".Flight::get("name")."', '".Flight::get("email")."', '".Flight::get("password")."')");
            $conn->query(Flight::get("sql"));

            echo json_encode(["status" => 'success']);
        }
    }
?>