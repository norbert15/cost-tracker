<?php
require_once '../flight/Flight.php';
require_once '../operationsPHP/connect.php';
session_start();

//Hónap ellenörzése!
Flight::set("check_day", "SELECT * FROM `expenditures` WHERE `email` = '$_SESSION[email]' AND `date` LIKE '%$_SESSION[change_date]%'");
$result_check_month = mysqli_query($conn, Flight::get("check_day"));
$month_data = mysqli_fetch_assoc($result_check_month);

Flight::set("name", $_POST["name"]);
Flight::set("sum", $_POST["sum"]);
Flight::set("done", true);

//Ha a hónapan vet már fel bevételt vagy költséget, akkor hozzáadja az adott hónaphoz, ha nem akkor újat szúrbe!
if ($result_check_month->num_rows > 0) {
  Flight::set("sum", ($month_data[Flight::get("name")] + $_POST["sum"]));

  //Ha a felvet összeg minuszba megy akkor.
  if (Flight::get("sum") < 0) {
    Flight::set("sum", 0);
  }
  Flight::set("update", "UPDATE `expenditures` SET " . Flight::get("name") . " = '" . Flight::get("sum") . "'
    WHERE `date` LIKE '%$_SESSION[change_date]%' AND `email` = '$_SESSION[email]'");

  //Vissza jelzés küldés!
  if ($conn->query(Flight::get("update")) === FALSE) {
    Flight::set("done", false);
    echo "failed";
  }
} else {
  Flight::set("insert", "INSERT INTO `expenditures` (`email`, " . Flight::get("name") . " , date)
  VALUES ('$_SESSION[email]', '" . Flight::get("sum") . "', '$_SESSION[change_date_day]')");

  //Vissza jelzés küldés!
  if ($conn->query(Flight::get("insert")) === FALSE) {
    Flight::set("done", false);
    echo "failed";
  }
}

  //Felvett adatok rögzítése az előzmény táblába!
  /*Flight::set("date", date("Y-m-d H:i:s"));
  Flight::set("time", date("H:i:s"));
  $time = date("Y-m-d H:i:s");
  echo Flight::get("date");
  Flight::set("history", "INSERT INTO `history`(`email`, `name`, `sum`, `date`) 
  VALUES ('$_SESSION[email]', '".Flight::get("name")."', '".Flight::get("sum")."',  NOW()");

  //Vissza jelzés küldés!
  if($conn->query(Flight::get("history")) === FALSE){
    //echo "failed";
  }*/
 
