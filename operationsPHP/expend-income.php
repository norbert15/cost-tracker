<?php
//Hónap váltás vizsgálat!
if (isset($_SESSION["change"])) {
    //A léptető elkérése
    $test = $_SESSION["change"];

    //A hónap váltásá
    $change_date = date("Y-m", strtotime($test . 'months'));
    $change_date_day = date("Y-m-d", strtotime($test . 'months'));

    //A toggleben lévő dátum váltása
    $mydate = getdate(date("U", strtotime($test . 'months')));
} else {
    //A hónap váltásá
    $change_date = date("Y-m");
    $change_date_day = date("Y-m-d");

    //A toggleben lévő dátum váltása
    $mydate = getdate(date("U"));
}

//Felhasználó adatainak elkérése
$profile_data = "SELECT `fullname`, `email` FROM `users` WHERE `email` = '$email'";
$result_profile = mysqli_query($conn, $profile_data);
$data = mysqli_fetch_assoc($result_profile);

if($result_profile->num_rows > 0){
    $_SESSION["fullname"] = $data['fullname'];
}

//Hónap ellenőrzése (JELENLEGI DÁTUM/HÓNAP)!
$current_date = date("Y-m");
$check_date = "SELECT `date` FROM `expenditures` WHERE `date` LIKE '%$current_date%' AND `email` = '$email'";
$result_check_date = mysqli_query($conn, $check_date);

if ($result_check_date->num_rows == 0) {
    $date = date("Y-m-d");
    $insert_next_date = "INSERT INTO `expenditures`(email, date) 
      VALUES ('$email', '$date')";
    $conn->query($insert_next_date);
}

//Költségek elkérése!
$sql = "SELECT SUM(`transport`) AS transport, SUM(`food`) AS food, SUM(`shopping`) AS shopping, SUM(`gift`) AS gift, 
SUM(`health`) AS health, SUM(`family`) AS family, SUM(`sport`) AS sport, SUM(`income`) AS income, SUM(`etc`) AS etc 
FROM `expenditures` WHERE `email` = '$email' AND `date` LIKE '%$change_date%'";
$result = mysqli_query($conn, $sql);

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
$expendituresSum = 0;
foreach ($expenditures as $value) {
    $expendituresSum += $value;
}

//Az összes bevétel összege!
$incomeSum = $incomes[0] + $incomes[1];

//Százalék számitás költség!
$expendPercent = array();
for ($index = 0; $index < count($expenditures); $index++) {
    if ($expenditures[$index] > 0) {
        array_push($expendPercent, ($expenditures[$index] / $expendituresSum) * 100);
    } else {
        array_push($expendPercent, 0);
    }
}

//Százalék számitás bevétel!
$incomePercent = array();
if ($incomeSum > 0) {
    array_push($incomePercent, ($expendituresSum / $incomeSum) * 100);
    array_push($incomePercent, (100 - $incomePercent[0]));
} else if ($expendituresSum > 0) {
    array_push($incomePercent, 100);
    array_push($incomePercent, 0);
} else {
    array_push($incomePercent, 0);
    array_push($incomePercent, 0);
}

//Magyar hónap nevek
$hun_month = "";

switch($mydate['mon']){
 case 1: $hun_month = "Január"; break;
 case 2: $hun_month = "Február"; break;
 case 3: $hun_month = "Március"; break;
 case 4: $hun_month = "Április"; break;
 case 5: $hun_month = "Május"; break;
 case 6: $hun_month = "Június"; break;
 case 7: $hun_month = "Július"; break;
 case 8: $hun_month = "Augusztus"; break;
 case 9: $hun_month = "Szeptember"; break;
 case 10: $hun_month = "Október"; break;
 case 11: $hun_month = "November"; break;
 case 12: $hun_month = "December"; break;
}