<?php
require_once '../../../model/profile/add-sum-model.php';
require_once '../../../connect.php';

session_start();

if (isset($_POST['name']) && isset($_POST['sum'])) {

    $db = DBclass::getInstance();

    $email =  $_SESSION["email"];
    $date = $_SESSION["change_date"];
    $name = $db->escape_string($_POST["name"]);
    $sum = $db->escape_string($_POST["sum"]);

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

        $insert = AddModel::insert($name, $sum, $email, $_SESSION["change_date_day"]);

        if (!$insert) {
            echo "failed";
        } else {
            echo "success";
        }
    }
}
