<?php
Flight::map("login_render", function () {
    Flight::render("login/login-page.php", array(
        "title" => "Költségkövető - Bejelentkezés",
        "home" => "Kezdőlap",
        "login" => "Bejelentkezés",
        "email" => "Email cím",
        "emailFeedback" => "Az email cím mező kitöltendő!",
        "pass" => "Jelszó",
        "passwordFeedback" => "A jelszó mező kitöltendő!",
        "feedback" => "Az email cím vagy jelszó helytelen!",
        "loginText" => "Nincs fiókod?",
        "loginText2" => "Regisztrálj itt!",
        "successAlert" => "Sikeres regisztráció!",
        "errorAlert" => "Sikertelen regisztráció!"
    ));
});
