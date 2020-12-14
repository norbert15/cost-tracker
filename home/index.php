<?php
require_once '..\operationsPHP\connect.php';

session_start();

if (isset($_SESSION["email"])) {
    header("location: ..\profile\profile.php");
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <title>Költségkövető</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="home.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
</head>

<body class="font-weight-bold">
    <div>
        <div class="toggle d-flex justify-content-between">
            <i class="material-icons home-icon">home</i>
            <div class="other-page">
                <a href="..\login\login-page.php">Bejelentkezés</a>
                <small class="mr-1 ml-1">|</small>
                <a href="..\registration\register-page.php">Új fiók létrehozás</a>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-3">
                <h1 class="mb-4">Sok volt a kiadás a hónapban? És nem tudod, hogy mikre?</h1>
                <p>Itt nyomon tudod követni a kiadásaidat kategorizálva.</p>
                <p>A kiadásokat különböző kategóriák szerint tudod megfigyelni. Rájuk kattintva feltudod venni az összeget, hogy mennyit költöttél abban a kategóriában.</p>
                <p class="text-uppercase">Itt látható az összes kiadás, kategoriák szerint</p>

                <div class="div-icons mt-3 mb-4 d-flex justify-content-center row">

                    <div class="div-transport">
                        <small>Közlekedés</small>
                        <button disabled>
                            <i class="material-icons">directions_bus</i>
                        </button>
                    </div>

                    <div class="div-food">
                        <small>Élelmiszer</small>
                        <button disabled>
                            <i class="material-icons">restaurant</i>
                        </button>
                    </div>

                    <div class="div-shopping">
                        <small>Vásárlás</small>
                        <button disabled>
                            <i class="material-icons">shopping_cart</i>
                        </button>
                    </div>

                    <div class="div-gift">
                        <small>Ajándék</small>
                        <button disabled>
                            <i class="material-icons">card_giftcard</i>
                        </button>
                    </div>

                    <div class="div-health">
                        <small>Egészségügy</small>
                        <button disabled>
                            <i class="material-icons">spa</i>
                        </button>
                    </div>

                    <div class="div-family">
                        <small>Család</small>
                        <button disabled>
                            <i class="material-icons">face</i>
                        </button>
                    </div>

                    <div class="div-sport">
                        <small>Szabadidő</small>
                        <button disabled>
                            <i class="material-icons">sports_football</i>
                        </button>
                    </div>
                </div>

                <p> A bevételeket is fel lehet venni, hogy figyelemmel kövesd mennyid maradt, a költségek levonása utána.</p>
                <p class="text-uppercase">ezek a bevétel kategoriák</p>

                <div class="div-icons mt-3 mb-4 d-flex justify-content-center row">
                    <div class="div-payment">
                        <small>Fizetés</small>
                        <button disabled>
                            <i class="material-icons">payment</i>
                        </button>
                    </div>

                    <div class="div-etc">
                        <small>Egyéb bevétel</small>
                        <button disabled>
                            <i class="material-icons">money</i>
                        </button>
                    </div>
                </div>

                <p>Itt az ideje, hogy ki próbáld!</p>
                <p>Ha van fiókod jelentkezbe, ha még nincs regisztrálj.</p>
            </div>
        </div>
    </div>
</body>

</html>