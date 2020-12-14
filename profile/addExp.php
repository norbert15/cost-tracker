<?php
//Profil oldal behuzása,
//$change_date_day változo elérése, ami a  változot hónapot adja vissza (év-hó-nap)-ként
//connect.php elérésére is szolgál egyben.
require_once "profile.php";

$email = $_SESSION["email"];
$transportEx = $_POST["transportEx"];
$foodEx = $_POST["foodEx"];
$shoppingEX = $_POST["shoppingEX"];
$giftEx = $_POST["giftEx"];
$healthEx = $_POST["healthEx"];
$familyEx = $_POST["familyEx"];
$sportEx = $_POST["sportEx"];

//Nap ellenörzése!
$check_day = "SELECT * FROM `expenditures` WHERE `email` = '$email' AND `date` LIKE '%$change_date_day%'";
$result_check_day = mysqli_query($conn, $check_day);
$day_data = mysqli_fetch_assoc($result_check_day);

//Ha a mainap vesz fel költséget és már vet fel akkor update, ha nem akkor insert!
if ($result_check_day->num_rows > 0) {
    $update_expenditures = "UPDATE `expenditures` SET `transport`='".$day_data['transport']."'+'$transportEx', `food`='".$day_data['food']."'+'$foodEx', 
    `shopping`='".$day_data['shopping']."'+'$shoppingEX', `gift`='".$day_data['gift']."'+'$giftEx', `health`='".$day_data['health']."'+'$healthEx',
    `family`='".$day_data['family']."'+'$familyEx', `sport`='".$day_data['sport']."'+'$sportEx' WHERE `date` LIKE '%$change_date_day%' AND `email` = '$email'";
    //Vissza jelzés küldés!
    if ($conn->query($update_expenditures) === FALSE) {
      echo "faild";
    }
} else {
    $insert_expenditures = "INSERT INTO `expenditures` (`email`, `transport`, `food`, `shopping`, `gift`, `health`, `family`, `sport`, `date`)
    VALUES ('$email', '$transportEx', '$foodEx', '$shoppingEX', '$giftEx', '$healthEx', '$familyEx', '$sportEx', '$change_date_day')";
    //Vissza jelzés küldés!
    if ($conn->query($insert_expenditures) === FALSE) {
      echo "faild";
    }
}
