<?php
//Hónap váltás vizsgálat!
if (isset($_SESSION["change"])) {
    //A léptető elkérése
    Flight::set("change", $_SESSION["change"]);

    //A hónap váltás
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
$_SESSION["change_date_day"] = Flight::get("change_date_day");
$_SESSION["change_date"] =Flight::get("change_date");

//Felhasználó adatainak elkérése
Flight::set("profile_data", "SELECT `fullname`, `email` FROM `users` WHERE `email` = '$_SESSION[email]'");
$result_profile = mysqli_query($conn, Flight::get("profile_data"));
$data = mysqli_fetch_assoc($result_profile);

if($result_profile->num_rows > 0){
    $_SESSION["fullname"] = $data['fullname'];
}

//Hónap ellenőrzése (JELENLEGI DÁTUM/HÓNAP)!
Flight::set("current_date", date("Y-m"));
Flight::set("check_date", "SELECT `date` FROM `expenditures` WHERE `date` LIKE '%".Flight::get("current_date")."%' AND `email` = '$_SESSION[email]'");
$result_check_date = mysqli_query($conn, Flight::get("check_date"));

if ($result_check_date->num_rows == 0) {
    Flight::set("date", date("Y-m-d"));
    Flight::set("insert_next_date", "INSERT INTO `expenditures`(email, date) 
      VALUES ('$_SESSION[email]', '". Flight::get("date")."')");
    $conn->query(Flight::get("insert_next_date"));
}

//Költségek és bevételek elkérése!
Flight::set("sql", "SELECT `transport`, `food`, `shopping`, `gift`, `health`, `family`, `sport`, `income`, `etc` 
FROM `expenditures` WHERE `email` = '$_SESSION[email]' AND `date` LIKE '%".Flight::get("change_date")."%'");
$result = mysqli_query($conn, Flight::get("sql"));

//Az összes költség és bevétel egy tömbe való felvétele!
$incomes = array();
$expenditures = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($expenditures, $row["transport"] < 0 ? 0 : $row["transport"]);
        array_push($expenditures, $row["food"] < 0 ? 0 : $row["food"]);
        array_push($expenditures, $row["shopping"] < 0 ? 0 : $row["shopping"]);
        array_push($expenditures, $row["gift"] < 0 ? 0 : $row["gift"]);
        array_push($expenditures, $row["health"] < 0 ? 0 : $row["health"]);
        array_push($expenditures, $row["family"] < 0 ? 0 : $row["family"]);
        array_push($expenditures, $row["sport"] < 0 ? 0 : $row["sport"]);
        array_push($incomes, $row["income"] < 0 ? 0 : $row["income"]);
        array_push($incomes, $row["etc"] < 0 ? 0 : $row["etc"]);
    }
} else {
    for ($index = 0; $index < 7; $index++) {
        array_push($expenditures, 0);
        if ($index < 2) {
            array_push($incomes, 0);
        }
    }
}

//Az összes költség összege!
Flight::set("expenditures_sum", 0);

foreach ($expenditures as $value) {
    Flight::set("expenditures_sum", Flight::get("expenditures_sum")+ $value);
}

//Az összes bevétel összege!
Flight::set("income_sum", $incomes[0] + $incomes[1]);

//Százalék számitás költség!
$expendPercent = array();
for ($index = 0; $index < count($expenditures); $index++) {
    if ($expenditures[$index] > 0) {
        array_push($expendPercent, ($expenditures[$index] / Flight::get("expenditures_sum")) * 100);
    } else {
        array_push($expendPercent, 0);
    }
}

//Százalék számitás bevétel!
$incomePercent = array();
if (Flight::get("income_sum") > 0) {
    array_push($incomePercent, (Flight::get("expenditures_sum") / Flight::get("income_sum")) * 100);
    array_push($incomePercent, (100 - $incomePercent[0]));
} else if (Flight::get("expenditures_sum") > 0) {
    array_push($incomePercent, 100);
    array_push($incomePercent, 0);
} else {
    array_push($incomePercent, 0);
    array_push($incomePercent, 0);
}

//Magyar hónap nevek
Flight::set("hun", "");

switch(Flight::get("mydate")['mon']){
 case 1: Flight::set("hun", "Január"); break;
 case 2: Flight::set("hun", "Február"); break;
 case 3: Flight::set("hun", "Március"); break;
 case 4: Flight::set("hun", "Április"); break;
 case 5: Flight::set("hun", "Május"); break;
 case 6: Flight::set("hun", "Június"); break;
 case 7: Flight::set("hun", "Július"); break;
 case 8: Flight::set("hun", "Augusztus"); break;
 case 9: Flight::set("hun", "Szeptember"); break;
 case 10: Flight::set("hun", "Október"); break;
 case 11: Flight::set("hun", "November"); break;
 case 12: Flight::set("hun", "December"); break;
}
