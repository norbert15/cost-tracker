<?php
//Profil oldal behuzása,
//$change_date_day változo elérése, ami a  változot hónapot adja vissza (év-hó-nap)-ként
//connect.php elérésére is szolgál egyben.
require_once "profile.php";

$email = $_SESSION["email"];

//Nap ellenörzése!
$check_day = "SELECT * FROM `expenditures` WHERE `email` = '$email' AND `date` LIKE '%$change_date_day%'";
$result_check_day = mysqli_query($conn, $check_day);
$day_data = mysqli_fetch_assoc($result_check_day);

//Ellenörzés, hogy a költségek ne menjenek minuszba!
$transportEx = ($_POST["transportEx"] + $day_data["transport"]);
$foodEx = ($_POST["foodEx"] + $day_data["food"]);
$shoppingEx = ($_POST["shoppingEx"] + $day_data["shopping"]);
$giftEx = ($_POST["giftEx"] + $day_data["gift"]);
$healthEx = ($_POST["healthEx"] + $day_data["health"]);
$familyEx = ($_POST["familyEx"] + $day_data["family"]);
$sportEx = ($_POST["sportEx"] + $day_data["sport"]);

//Ha a mainap vesz fel költséget és már vet fel akkor update, ha nem akkor insert!
if ($result_check_day->num_rows > 0) {
  $update_expenditures = "UPDATE `expenditures` SET `transport`='$transportEx', `food`='$foodEx',
    shopping ='$shoppingEx', `gift`='$giftEx', `health`='$healthEx', `family`='$familyEx', `sport`='$sportEx' 
    WHERE `date` LIKE '%$change_date_day%' AND `email` = '$email'";
  //Vissza jelzés küldés!
  if ($conn->query($update_expenditures) === FALSE) {
    echo "faild";
  }
} else {
  $insert_expenditures = "INSERT INTO `expenditures` (`email`, `transport`, `food`, `shopping`, `gift`, `health`, `family`, `sport`, `date`)
    VALUES ('$email', '$transportEx', '$foodEx', '$shoppingEx', '$giftEx', '$healthEx', '$familyEx', '$sportEx', '$change_date_day')";
  //Vissza jelzés küldés!
  if ($conn->query($insert_expenditures) === FALSE) {
    echo "faild";
  }
}
