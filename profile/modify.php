<?php
require_once "../flight/Flight.php";
require_once "../operationsPHP/connect.php";
session_start();

if(isset($_POST['old_password']) && isset($_POST['new_password'])){
    Flight::set("old_password", md5(trim($_POST['old_password'])));
    Flight::set("new_password", md5(trim($_POST['new_password'])));

    Flight::set("check_profile", "SELECT * FROM users WHERE email = '$_SESSION[email]' AND password = '" . Flight::get("old_password")."'");
    $result_profile = mysqli_query($conn, Flight::get("check_profile"));
    if($result_profile->num_rows >0){
        Flight::set("modify_profile", "UPDATE `users` SET  password = '".Flight::get("new_password")."' WHERE email = '$_SESSION[email]'");
        if($conn->query(Flight::get("modify_profile")) == FALSE){
            echo "faild-update";
        }
    }else{
        echo "faild-old";
    }
}

if(isset($_POST['fullname'])){
    Flight::set("fullname", trim($_POST['fullname']));

    Flight::set("modify_profile", "UPDATE users SET fullname = '" .Flight::get("fullname")."' WHERE email = '$_SESSION[email]'");
    if($conn->query(Flight::get("modify_profile")) == FALSE){
        echo "faild-update";
    }
}
