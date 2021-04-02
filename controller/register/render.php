<?php
Flight::map("register_render", function () {
    Flight::render("../views/registration/register-page.php", array(
        "title" => "Költségkövető - Regisztráció",
        "home" => "Kezdőlap",
        "regist" => "fiók létrehozás",
        "fullname" => "Teljes név",
        "nameFeedback" => "A teljes név megadása kötelező!",
        "email" => "Email cím",
        "emailFeedback" => "Az email cím megadása kötelező!",
        "pass" => "Jelszó",
        "passwordFeedback" => "A jelszó megadása kötelező!",
        "passwordConfirmed" => "Jelszó megerősítése",
        "passwordConfirmedFeedback" => "A jelszavak nem egyeznek!",
        "privacyStatement" => "Adatvédelmi nyilatkozat",
        "register" => "Regisztráció",
        "registText" => "Már van fiókod?",
        "registText2" => "Lépj be.",
        "ps" => ""
    ));
});
