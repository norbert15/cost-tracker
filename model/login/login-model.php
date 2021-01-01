<?php
require_once '../../connect.php';

class LoginModel
{

    //Be jelenetkező felhasználó ellenőrzése.
    public static function loginUser($email, $password)
    {
        $db = DBclass::getInstance();

        $check_user = sprintf("SELECT COUNT(*) AS count, fullname FROM `users` WHERE `email` = '%s' 
            AND `password` = '%s'", $db->escape_string($email), $db->escape_string(md5($password)));

        $res = $db->query($check_user);
        $row = $res->fetch_assoc();

        return $row;
    }
}
