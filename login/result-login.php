<?php
    require_once '..\operationsPHP\connect.php';

    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));
    
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $_SESSION["email"] = $email;
            echo json_encode(['status' => 'success']);
         }else{
            echo json_encode(['status' => 'error', 'message' => 'Az email cím vagy jelszó helytelen!']);
         }
    }
?>