<?php

require_once 'connect.php';

class CostIncomeModel
{

    //Költségek és bevételek lekérdezése adott hónap alapján.
    public static function costIncomeMonth($email, $date)
    {
        $db = DBclass::getInstance();

        $sql_month = "SELECT `transport`, `food`, `shopping`, `gift`, `health`, `family`, `sport`, `income`, `etc` 
        FROM `expenditures` WHERE `email` = '$email' AND `date` LIKE '%$date%'";
        $res = $db->query($sql_month);
        $row = $res->fetch_assoc();

        return $row;
    }

    //Az összes bevétel lekérdezése.
    public static function allMonth($email)
    {
        $db = DBclass::getInstance();

        $sql = "SELECT DATE_FORMAT(date, '%Y %M') AS dates, `transport` AS transport, `food` AS food, `shopping` 
            AS shopping,`gift` AS gift, `health` AS health, `family` AS family,`sport` AS sport 
            FROM `expenditures` WHERE `email` = '$email' AND (transport > 0 OR food > 0 OR shopping > 0 OR 
            gift > 0 OR health > 0 OR family > 0 OR sport > 0) GROUP BY dates ORDER BY date DESC";

        $res = $db->query($sql);

        return $res;
    }

    //Az előzmények lekérdezése, költségek.
    public static function history($email, $date)
    {
        $db = DBclass::getInstance();
        $income = "income";
        $etc = "etc";

        $history_sql = "SELECT * FROM `history` WHERE name != '$income' AND name != '$etc' AND email = '$email' 
        AND month_date LIKE '%$date%' ORDER BY `current_date` DESC";
        $res = $db->query($history_sql);

        return $res;
    }

    //Az előzmények lekérdezése, bevételek.
    public static function history_revenues($email, $date)
    {
        $db = DBclass::getInstance();
        $income = "income";
        $etc = "etc";

        $history_sql = "SELECT * FROM `history` WHERE (name = '$income' OR name = '$etc') AND  email = '$email' 
        AND month_date LIKE '%$date%' ORDER BY `current_date` DESC";
        $res = $db->query($history_sql);

        return $res;
    }
}
