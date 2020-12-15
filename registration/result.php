<?php
    require_once '../operationsPHP/connect.php';

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));

        $checkEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $checkEmail);

        if($result->num_rows > 0){
           echo json_encode(['status' => 'error', 'message' => 'Az email cím már foglalt!']);
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo json_encode(['status' => 'error', 'message' => 'Helytelen email cím formátum!']);
        }
        else{
            $date = date("Y-m-d");
            $sql = "INSERT INTO `users`(`fullname`, `email`, `password`) VALUES ('$name', '$email', '$password')";
            $conn->query($sql);
            $sql = "INSERT INTO `expenditures`(`email`, `date`) VALUES ('$email', '$date')";
            $conn->query($sql);
            echo json_encode(["status" => 'success']);
        }
    }
?>