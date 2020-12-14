<?php
//A hónap léptetése
session_start();

//Globális változo létrehozása, ami a hónao fogja váltani!
$_SESSION["change"];

//Hozzá ad egyet a hónaphoz
if(isset($_POST["add"])){
    $_SESSION["change"] += $_POST["add"];
    //A mai hónapon nem lehet átmenni, igy vissza áll 0-ra vagyis nem vesz el és ad hozzá
    if($_SESSION["change"] > 0){
        $_SESSION["change"] = 0;
    }
}

//Elvesz egyet a hónapból
if(isset($_POST["extract"])){
    $_SESSION["change"] += $_POST["extract"];
}
