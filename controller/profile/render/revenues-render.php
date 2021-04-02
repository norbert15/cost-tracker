<?php
Flight::map("revenues_render", function () {

    require_once 'controller/profile/functions/expend-income-controller.php';
    require_once 'controller/profile/functions/hun-date-controller.php';

    $sql = CostIncomeModel::history_revenues($_SESSION['email'], $_SESSION["change_date"]);

    $set_class = "";
    if (($income_sum - $expenditures_sum) >= 0) {
        $set_class = "plus";
    } else {
        $set_class = "minus";
    }

    Flight::render("profile/revenues/profile-income.php", array(
        "title" => "Költségkövető - Bevételek",
        "incomeText" => "Bevételek: ",
        "incomeText2" => "Kattints valamelyik bevétel ikonra az összeg felvételéhez!",
        "payment" => "Fizetés",
        "paymentModalTitle" => "Fizetési bevétel megadása!",
        "etc" => "Egyéb bevétel",
        "etcModalTitle" => "Egyéb bevétel megadása!",
        "desiredAmount" => "Kívánt összeg: ",
        "close" => "Bezár",
        "add" => "Hozzáad",
        "history" => "Előzmények (havi)",
        "incomeText3" => "Összes Bevétel: ",
        "allCost" => "Össz költség",
        "allRevenues" => "Össz bevétel",
        "successAdd" => "Sikeres rögzítés!",
        "errorAdd" => "Sikertelen rögzítés!",
        "set_class" => $set_class,
        "income_sum" => $income_sum,
        "incomes" => $incomes,
        "incomePercent" => $incomePercent,
        "expenditures_sum" => $expenditures_sum,
        "res" => $sql,
        "ft" => "Ft.",
        "comment" => "Megjegyzés",

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
