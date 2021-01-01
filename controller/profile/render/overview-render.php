<?php
Flight::map("overview_render", function () {

    if (isset($_SESSION["change"])) {
        $_SESSION["change"] = 0;
    }

    require_once 'controller/profile/functions/expend-income-controller.php';
    require_once 'model/profile/cost-income-model.php';
    require_once 'controller/profile/functions/hun-date-controller.php';

    //Az összes havi költség elkérése
    $sql = CostIncomeModel::allMonth($_SESSION['email']);

    Flight::render("profile/overview/all-month.php", array(
        "title" => "Költségkövető - Áttekintés",
        "date" => "Dátum",
        "transport" => "Közlekedési költség",
        "food" => "Élelmiszeri költség",
        "shopping" => "Vásárlási költség",
        "gift" => "Ajándék költség",
        "health" => "Egészségügyi költség",
        "family" => "Családi költésg",
        "sport" => "Szabadidő költség",
        "db" => $db,
        "res" => $sql,

        //*Togglelévő elemek
        "toggleExpend" => "Kiadások",
        "toggleRevenues" => "Bevételek",
        "toggleOverview" => "Áttekintés",
        "toggleSettings" => "Beállítások",
        "toggleLogout" => "Kijelentkezés",

        //*Modalban lévő elemek
        "modalTitle" => "Adatok módosítása",
        "modalTitleP" => "Jelszó módosítása",
        "email" => "Email cím",
        "fullname" => "Teljes név",
        "nameFeedback" => "A módosításhoz adja meg nevét!",
        "oldPassword" => "Régi jelszó",
        "oldFeedback" => "A megadott jelszó nem egyezik meg a régi jelszóval!",
        "newPassword" => "Új jelszó",
        "newFeedback" => "A jelszónak legalább 5 karakternek kell lennie!",
        "newConfirm" => "Új jelszó megerősítése",
        "confirmFeedback" => "A jelszavak nem egyeznek meg!",
        "successAlert" => "Sikeres módosítás",
        "errorAlert" => "Sikertelen módosítás",
        "close" => "Bezár",
        "modify" => "Módosítás"
    ));
});
