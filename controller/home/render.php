<?php
Flight::map("home_render", function () {
    Flight::render("../views/home/home.php", array(
        "title" => "Költségkövető",
        "login" => "Bejelentkezés",
        "register" => "Új fiók létrehozás",
        "homeText" => "Sok volt a kiadás a hónapban és nem tudod, hogy mikre?",
        "homeText2" => "Itt nyomon tudod követni a kiadásaidat kategorizálva.",
        "homeText3" => "A kiadásokat különböző kategóriák szerint tudod megfigyelni. Rájuk kattintva feltudod venni az összeget, hogy mennyit költöttél abban a kategóriában.",
        "homeText4" => "Itt látható az összes kiadás, kategoriák szerint",
        "transport" => "Közlekedés",
        "food" => "Élelmiszer",
        "shopping" => "Vásárlás",
        "gift" => "Ajándék",
        "health" => "Egészségügy",
        "family" => "Család",
        "sport" => "Szabadidő",
        "homeText5" => "A bevételeket is fel tudod venni, hogy figyelemmel kövesd mennyid maradt, a költségek levonása utána.",
        "homeText6" => "ezek a bevétel kategoriák",
        "payment" => "Fizetés",
        "etc" => "Egyéb bevétel",
        "homeText7" => "Itt az ideje, hogy ki próbáld!",
        "homeText8" => "Ha van fiókod jelentkezbe, ha még nincs regisztrálj."
    ));
});
