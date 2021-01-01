<?php
require_once '../../model/login/login-model.php';

header("Content-type: application/json; charset=utf-8");

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

    $row = LoginModel::loginUser($_POST['email'], $_POST['password']);

    if ($row["count"] == '0') {
        print(json_encode(array("error" => true, 'message' => 'Az email cím vagy jelszó helytelen!')));
    } else if ($row["count"] != '0') {
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["fullname"] = $row["fullname"];
        print(json_encode(array("status" => true)));
    }
}
