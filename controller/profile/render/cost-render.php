<?php
Flight::map("cost_render", function () {

    require_once 'controller/profile/functions/expend-income-controller.php';
    require_once 'controller/profile/functions/hun-date-controller.php';

    $sql = CostIncomeModel::history($_SESSION['email'], $_SESSION["change_date"]);

    Flight::render("profile/cost/profile.php", array(
        "title" => "Költségkövető - Kiadások",
        "expend" => "Kiadások: ",
        "profileText" => "Kattints valamelyik kiadás ikonra az összeg felvételéhez!",
        "transport" => "Közlekedés",
        "transportModalTitle" => "Közlekedési költség megadása!",
        "food" => "Élelmiszer",
        "foodModalTitle" => "Élelmiszer költség megadása!",
        "shopping" => "Vásárlás",
        "shoppingModalTitle" => "Vásárlási költség megadása!",
        "gift" => "Ajándék",
        "giftModalTitle" => "Ajándék költség megadása!",
        "health" => "Egészségügy",
        "healthModalTitle" => "Egészségügyi költség megadása!",
        "family" => "Család",
        "familyModalTitle" => "Családi költség megadása!",
        "sport" => "Szabadidő",
        "sportModalTitle" => "Szabadidő költség megadása!",
        "desiredAmount" => "Kívánt összeg: ",
        "close" => "Bezár",
        "add" => "Hozzáad",
        "history" => "Elözmények (havi)",
        "successAdd" => "Sikeres rögzítés!",
        "errorAdd" => "Sikertelen rögzítés!",
        "expenditures" => $expenditures,
        "expenditures_sum" => $expenditures_sum,
        "expendPercent" => $expendPercent,
        "res" => $sql,
        "comment" => "Megjegyzés",
        "ft" => "Ft.",

        //*Tooolbarben lévő elemek
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
