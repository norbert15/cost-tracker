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
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="..\register-login-page.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
</head>

<body class="text-center">
    <div>
        <div class="toggle w-100 p-2">
            <a class="float-left" href="..\home\index.php">Kezdőlap</a>
        </div>
        <div class="container">
            <div class="alert alert-success text-center m-auto w-50" hidden role="alert" id="success-alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sikeresen regisztráció!</strong>
            </div>
            <div class="alert alert-danger text-center m-auto w-50" hidden role="alert" id="danger-alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sikertelen regisztráció!</strong>
            </div>
            <div class="d-inline-block resp">
                <h1 class="mb-4">BEJELENTKEZÉS</h1>
                <form>
                    <div class="form-group">
                        <label for="email">Email cím</label>
                        <input type="email" class="form-control email" id="email" placeholder="Email@gmail.hu">
                        <div class="invalid-feedback">Az email cím mező kitöltendő!</div>
                    </div>

                    <div class="form-group">
                        <label for="password">Jelszó</label>
                        <input type="password" class="form-control password" id="password" placeholder="*******">
                        <div class="invalid-feedback">A jelszó mező kitöltendő!</div>
                    </div>
                    <div class="error"></div>
                    <div class="invalid-feedback allError">Az email cím vagy jelszó helytelen! </div>
                    <br />
                    <button type="button" id="login" class="btn">Bejelentkezés</button>
                </form>
                <div class="mt-3">
                    <p>Nincs fiókod? <a href="..\registration\register-page.php">Regisztrálj itt!</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="..\javaScript\app.js"></script>
</body>

</html>