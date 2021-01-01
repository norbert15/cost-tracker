<?php
require_once '../../../model/profile/modify-model.php';
require_once '../../../connect.php';

session_start();

$db = DBclass::getInstance();
$email = $_SESSION['email'];

if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
    $old_password = $db->escape_string(md5($_POST['old_password']));
    $new_password = $db->escape_string(md5($_POST['new_password']));

    $check_password = ProfileModel::checkPassword($email, $old_password);

    if ($check_password != "0") {
        $modify_password = ProfileModel::modifyPassword($email, $new_password);

        if (!$modify_password) {
            echo "failed-update";
        } else {
            echo "success";
        }
    } else {
        echo "failed-old";
    }
}

if (isset($_POST['fullname'])) {
    $fullname = $db->escape_string($_POST['fullname']);

    $modify_fullname = ProfileModel::modifyFullname($email, $fullname);

    if (!$modify_fullname) {
        echo "failed-update";
    } else {
        echo "success";
        $_SESSION["fullname"] = $fullname;
    }
}
