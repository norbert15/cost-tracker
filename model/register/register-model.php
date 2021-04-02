<?php
require_once '../../connect.php';

class RegisterModel
{

    //Email cím ellenőrése, hogy létezik-e már.
    public static function checkRegisterEmail($email)
    {
        $db = DBclass::getInstance();

        $check_email = sprintf("SELECT COUNT(*) AS count FROM `users` WHERE `email` = '%s'", $db->escape_string($email));
        $res_email = $db->query($check_email);
        $row_email = $res_email->fetch_assoc();

        return $row_email["count"];
    }

    //Új felhasználó felvétele
    public static function insertUser($fullname, $email, $password)
    {
        $db = DBclass::getInstance();

        $insert_user = sprintf("INSERT INTO `users`(`fullname`, `email`, `password`) 
        VALUES ('%s', '%s', '%s')", $db->escape_string($fullname), $db->escape_string($email), $db->escape_string(md5($password)));
        $result_insert = mysqli_query($db, $insert_user);

        return $result_insert;
    }
}
