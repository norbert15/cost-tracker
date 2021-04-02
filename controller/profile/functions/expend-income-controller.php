<?php
require_once 'connect.php';
require_once 'model/profile/cost-income-model.php';

//Hónap váltás ellenörzése.
if (isset($_SESSION["change"])) {
    //A léptető elkérése
    Flight::set("change", $_SESSION["change"]);

    //A hónap megváltoztatása.
    Flight::set("change_date", date("Y-m", strtotime(Flight::get("change") . 'months')));
    Flight::set("change_date_day", date("Y-m-d", strtotime(Flight::get("change") . 'months')));

    //A toggleben lévő dátum váltása
    Flight::set("mydate", getdate(date("U", strtotime(Flight::get("change") . 'months'))));
} else {
    //A hónap váltás
    Flight::set("change_date", date("Y-m"));
    Flight::set("change_date_day", date("Y-m-d"));

    //A toggleben lévő dátum váltása
    Flight::set("mydate", getdate(date("U")));
}

//A változott hónap kimentése, év/hó/nap és év/hó-ként.
$_SESSION["change_date"] = Flight::get("change_date");
$_SESSION["change_date_day"] = Flight::get("change_date_day");

$db = DBclass::getInstance();

//Választott hónap költségeinek és bevételeinek lekérdezése.
$row = CostIncomeModel::costIncomeMonth($_SESSION["email"], Flight::get("change_date"));

//Az összes költség és bevétel egy tömbe való felvétele!
$incomes = array();
$expenditures = array();

if ($row) {
    array_push($expenditures, $row["transport"]);
    array_push($expenditures, $row["food"]);
    array_push($expenditures, $row["shopping"]);
    array_push($expenditures, $row["gift"]);
    array_push($expenditures, $row["health"]);
    array_push($expenditures, $row["family"]);
    array_push($expenditures, $row["sport"]);
    array_push($incomes, $row["income"]);
    array_push($incomes, $row["etc"]);
} else {
    for ($index = 0; $index < 7; $index++) {
        array_push($expenditures, 0);
        if ($index < 2) {
            array_push($incomes, 0);
        }
    }
}

//Az összes költség összege!
$expenditures_sum = 0;

foreach ($expenditures as $value) {
    $expenditures_sum += $value;
}

//Az összes bevétel összege!
$income_sum = $incomes[0] + $incomes[1];

//Százalék számitás költség!
$expendPercent = array();
for ($index = 0; $index < count($expenditures); $index++) {
    if ($expenditures[$index] > 0) {
        array_push($expendPercent, ($expenditures[$index] / $expenditures_sum) * 100);
    } else {
        array_push($expendPercent, 0);
    }
}

//Százalék számítás, kiadás/bevétel
$incomePercent = array("expend" => 0, "income" => 0);

$ex_sum = $expenditures_sum;
$in_sum = $income_sum;

if ($ex_sum > $in_sum) {
    $incomePercent["income"] = ($in_sum / $ex_sum) * 100;
    $incomePercent["expend"] = 100 - $incomePercent["income"];
} else if ($in_sum > $ex_sum) {
    $incomePercent["expend"] = ($ex_sum / $in_sum) * 100;
    $incomePercent["income"] = 100 - $incomePercent["expend"];
}

//Magyar hónap nevek
Flight::set("hun", "");

switch (Flight::get("mydate")['mon']) {
    case 1:
        Flight::set("hun", "Január");
        break;
    case 2:
        Flight::set("hun", "Február");
        break;
    case 3:
        Flight::set("hun", "Március");
        break;
    case 4:
        Flight::set("hun", "Április");
        break;
    case 5:
        Flight::set("hun", "Május");
        break;
    case 6:
        Flight::set("hun", "Június");
        break;
    case 7:
        Flight::set("hun", "Július");
        break;
    case 8:
        Flight::set("hun", "Augusztus");
        break;
    case 9:
        Flight::set("hun", "Szeptember");
        break;
    case 10:
        Flight::set("hun", "Október");
        break;
    case 11:
        Flight::set("hun", "November");
        break;
    case 12:
        Flight::set("hun", "December");
        break;
}
