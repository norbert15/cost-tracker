<?php
require_once '../../../connect.php';

class ProfileModel
{

    //Régi jelszó ellenőrzése.
    public static function checkPassword($email, $old_password)
    {
        $db = DBclass::getInstance();

        $check_profile = sprintf("SELECT COUNT(*) AS count FROM users WHERE email = '%s' AND password = '%s'", $email, $old_password);
        $res = $db->query($check_profile);
        $row = $res->fetch_assoc();

        return $row["count"];
    }

    //Jelszó megváltoztatása.
    public static function modifyPassword($email, $new_password)
    {
        $db = DBclass::getInstance();

        $modify_profile = sprintf("UPDATE `users` SET  password = '%s' WHERE email = '%s'", $new_password, $email);

        return $db->query($modify_profile);
    }

    //Teljes név megváltoztatása.
    public static function modifyFullname($email, $fullname)
    {
        $db = DBclass::getInstance();

        $modify_profile = sprintf("UPDATE users SET fullname = '%s' WHERE email = '%s'", $fullname, $email);

        return $db->query($modify_profile);
    }
}
