<?php
require_once '../../../model/profile/add-sum-model.php';
require_once '../../../connect.php';

session_start();

if (isset($_POST['name']) && isset($_POST['sum'])) {
    $db = DBclass::getInstance();

    $email =  $_SESSION["email"];
    $date = $_SESSION["change_date"];
    $id = $_SESSION["id"];
    $name = $db->escape_string($_POST["name"]);
    $sum = $db->escape_string($_POST["sum"]);
    $sum2 = $db->escape_string($_POST["sum"]);
    $comment = $db->escape_string($_POST["comment"]);

    $checkDate = AddModel::checkDate($email, $date);

    if ($checkDate) {
        $sum += $checkDate[$name];

        if ($sum < 0) {
            $sum = 0;
        }

        $update = AddModel::update($name, $sum, $date, $email,);

        if (!$update) {
            echo "failed";
        } else {
            echo "success";
        }
    } else {
        $insert = AddModel::insert($name, $sum, $email, $id, $_SESSION["change_date_day"]);

        if (!$insert) {
            echo "failed";
        } else {
            echo "success";
        }
    }

    //Előzmény hozzáadása
    $insert = AddModel::history($id, $email, $name, $sum2, $comment, $_SESSION["change_date_day"]);
}
