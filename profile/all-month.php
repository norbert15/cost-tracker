<?php
require_once 'operationsPHP/connect.php';
require_once 'operationsPHP/expend-income.php';

$email = $_SESSION["email"];

if (isset($_SESSION["change"])) {
    $_SESSION["change"] = 0;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="../operationsPHP/toggle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
</head>

<body>
    <!--Toggle kezdés-->
    <div>
        <?php require_once 'operationsPHP/toggle-profile.php'; ?>
    </div>
    <!--Toggle vége-->
    <div class="container text-center mt-4">
        <table class="table table-hover table-bordered table-responsive font-weight-bold">
            <thead class="thead-dark">
                <tr>
                    <th><?php echo $date?></th>
                    <th><?php echo $transport?></th>
                    <th><?php echo $food?></th>
                    <th><?php echo $shopping?></th>
                    <th><?php echo $gift?></th>
                    <th><?php echo $health?></th>
                    <th><?php echo $family?></th>
                    <th><?php echo $sport?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'overviews/months-query.php';
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#overviews").addClass("font-weight-bold");
            $("#previous-month").addClass("disabled");
            $("#next-month").addClass("disabled");
        })
    </script>
</body>
</htm