<?php

require_once "../operationsPHP/connect.php";

session_start();

$email = $_SESSION['email'];

if(isset($_POST['old_password']) && isset($_POST['new_password'])){
    $old_password = md5(trim($_POST['old_password']));
    $new_password = md5(trim($_POST['new_password']));

    $check_profile = "SELECT * FROM users WHERE email = '$email' AND password = '$old_password'";
    $result_profile = mysqli_query($conn, $check_profile);
    if($result_profile->num_rows >0){
        $modify_profile = "UPDATE `users` SET  password = '$new_password' WHERE email = '$email'";
        if($conn->query($modify_profile) == FALSE){
            echo "faild-update";
        }
    }else{
        echo "faild-old";
    }
}

if(isset($_POST['fullname'])){
    $fullname = trim($_POST['fullname']);

    $modify_profile = "UPDATE users SET fullname = '$fullname' WHERE email = '$email'";
    if($conn->query($modify_profile) == FALSE){
        echo "faild-update";
    }
}
