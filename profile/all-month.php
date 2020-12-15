<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: ../login/login-page.php");
}
$email = $_SESSION["email"];

if (isset($_SESSION["change"])) {
    $_SESSION["change"] = 0;
}
require_once '../operationsPHP/connect.php';

//Jelenlegi dátum!
$mydate = getdate(date("U"));

$hun_month = "";

switch ($mydate['mon']) {
    case 1:
        $hun_month = "Január";
        break;
    case 2:
        $hun_month = "Február";
        break;
    case 3:
        $hun_month = "Március";
        break;
    case 4:
        $hun_month = "Április";
        break;
    case 5:
        $hun_month = "Május";
        break;
    case 6:
        $hun_month = "Június";
        break;
    case 7:
        $hun_month = "Július";
        break;
    case 8:
        $hun_month = "Augusztus";
        break;
    case 9:
        $hun_month = "Szeptember";
        break;
    case 10:
        $hun_month = "Október";
        break;
    case 11:
        $hun_month = "November";
        break;
    case 12:
        $hun_month = "December";
        break;
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="../profile/profile.css" />
    <link rel="stylesheet" href="../operationsPHP/toggle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Költségkövető</title>
</head>

<body>
    <!--Toggle kezdés-->
    <div>
        <?php require_once '../operationsPHP/toggle-profile.php'; ?>
    </div>
    <!--Toggle vége-->
    <div class="container text-center mt-4">
        <table class="table table-hover table-bordered table-responsive font-weight-bold">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Dátum</th>
                    <th scope="col">Utazási költség</th>
                    <th scope="col">Élelmiszer költség</th>
                    <th scope="col">Vásárlási költség</th>
                    <th scope="col">Ajándék költség</th>
                    <th scope="col">Egészségügyi költség</th>
                    <th scope="col">Családi költség</th>
                    <th scope="col">Szabadidő költség</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'overview/months-query.php';
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#overview").addClass("font-weight-bold");
            $("#previous-month").addClass("disabled");
            $("#next-month").addClass("disabled");
        })
    </script>
</body>
</htm