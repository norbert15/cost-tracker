<?php
require_once '../../model/register/register-model.php';
require_once '../../connect.php';

header("Content-type: application/json; charset=utf-8");

$db = DBclass::getInstance();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    $emailExist = RegisterModel::checkRegisterEmail($_POST['email']);

    if ($emailExist != "0") {
        print(json_encode(array("status" => "error", "msg" => "Az email cím már foglalt!")));
    } else if (!filter_var($db->escape_string($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        print(json_encode(array("status" => "error", "msg" => "Helytelen email cím formátum!")));
    } else {
        $result_insert = RegisterModel::insertUser($_POST['name'], $_POST['email'], $_POST['password']);
        print(json_encode(array("status" => "success")));
    }
}
