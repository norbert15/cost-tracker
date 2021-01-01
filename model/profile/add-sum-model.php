<?php
require_once '../../../connect.php';

class AddModel
{

    //Dátum ellenőrzése, hogy az adott hónapban rögzített-e már adatott.
    public static function checkDate($email, $date)
    {
        $db = DBclass::getInstance();

        $check_month = "SELECT * FROM `expenditures` WHERE `email` = '$email' AND `date` LIKE '%$date%'";
        $res = $db->query($check_month);
        $row = $res->fetch_assoc();

        return $row;
    }

    //Az adott hónapban lévő adatok frissítése.
    public static function update($name, $sum, $date, $email)
    {
        $db = DBclass::getInstance();
        $db->escape_string($sum);

        $update = "UPDATE `expenditures` SET $name = '$sum' WHERE `date` LIKE '%$date%' AND `email` = '$email'";
        return $db->query($update);
    }

    //Új hónap felvétele.
    public static function insert($name, $sum, $email, $date)
    {
        $db = DBclass::getInstance();
        $db->escape_string($sum);

        $insert = sprintf("INSERT INTO `expenditures` (`email`, $name , date) VALUES ('%s', '%d', '%s')", $email, $sum, $date);
        return $db->query($insert);
    }
}
