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

$income = ($_POST["income"] + $day_data["income"]);
$etc = ($_POST["etc"] + $day_data["etc"]);

//Ha a mainap vesz fel bevételt és már vet fel akkor update, ha nem akkor insert!
if($result_check_day->num_rows >0){
    $update_income = "UPDATE `expenditures` SET `income`='$income',  
    `etc`= '$etc' WHERE `date` LIKE '%$change_date_day%' AND `email` = '$email'";
    //Vissza jelzés küldés!
    if ($conn->query($update_income) === FALSE) {
      echo "faild";
    }
}else{
    $insert_income = "INSERT INTO `expenditures` (email, `income`, `etc`, date) 
    VALUES('$email', '$income', '$etc', '$change_date_day')";
    //Vissza jelzés küldés!
    if ($conn->query($insert_income) === FALSE) {
        echo "faild";
    }
}


