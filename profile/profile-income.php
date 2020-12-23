<?php
require_once 'operationsPHP/connect.php';
require_once 'operationsPHP/expend-income.php';

Flight::set("set_class", "");
if ((Flight::get("income_sum") - Flight::get("expenditures_sum")) >= 0) {
    Flight::set("set_class", "plus");
} else {
    Flight::set("set_class", "minus");
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../javaScript/add-exp-income.js"></script>
    <link rel="stylesheet" href="../global-icons.css" />
    <link rel="stylesheet" href="../operationsPHP/toggle.css">
    <link rel="stylesheet" href="profile.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>

<body>
    <div>
        <!--Toggle kezdés-->
        <div>
            <?php require_once 'operationsPHP/toggle-profile.php'; ?>
        </div>
        <!--Toggle vége-->
        <!--Vissza jelzés-->
        <div>
            <?php require_once 'alert.php' ?>
        </div>
        <!--Vissza jelzés vége-->
        <div class="container text-center mt-3">
            <div class="head">
                <h1 class="mt-4"><?php echo $incomeText . number_format(Flight::get("income_sum"), 0, ",", ".") ?> Ft</h1>
                <small style="font-style: italic;"><?php echo $incomeText2 ?></small>
            </div>
            <div class="d-flex justify-content-center mt-3 icon-margin">
                <!--Bevételek kezdése-->
                <div class="div-payment main mr-4" id="0">
                    <small><?php echo $payment ?></small><br />
                    <input type="text" hidden class="one-name" value="income">
                    <button type="button" data-toggle="modal" data-target="#income">
                        <i class="fa fa-credit-card"></i>
                    </button><br />
                    <small> <?php echo number_format($incomes[0], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="income" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $paymentModalTitle ?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="incomeAdd"><?php echo $desiredAmount ?></label>
                                    <input type="number" class="one-sum" id="incomeAdd" name="income" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close ?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Egyéb bevétel -->
                <div class="div-etc main" id="1">
                    <small><?php echo $etc ?></small><br />
                    <input type="text" hidden class="one-name" value="etc">
                    <button type="button" data-toggle="modal" data-target="#etc">
                        <i class="fa fa-money"></i>
                    </button><br />
                    <small><?php echo number_format($incomes[1], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="etc" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $etcModalTitle ?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="etcAdd"><?php echo $desiredAmount ?></label>
                                    <input type="number" class="one-sum" id="etcAdd" name="etc" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close ?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Bevételek vége-->
            </div>
            <!--Progress kezéds-->
            <div class="d-flex justify-content-center mt-3">
                <h2><?php echo $incomeText3 ?><span class="<?php echo Flight::get("set_class"); ?>"> <?php echo number_format((Flight::get("income_sum") - Flight::get("expenditures_sum")), 0, ",", ".") ?> Ft </span></h1>
            </div>
            <div class="progress-label">
                <small><?php echo $allCost ?></small>
                <small><?php echo $allRevenues ?></small>
            </div>
            <div class="d-flex justify-content-center mt-4 icon-margin progress-income">
                <div class="progress vertical">
                    <p class="p-income d-flex justify-content-center p-2" data-toggle="tooltip" title=" <?php echo number_format($incomePercent[0]) . "%" ?>">
                        <?php echo number_format($incomePercent[0]) . "%" ?>
                    </p>
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color: rgb(202, 13, 13); width: <?php echo number_format($incomePercent[0]) ?>%;">
                    </div>
                </div>
                <div class="progress vertical" style="margin-left: -40px;">
                    <p class="p-income d-flex justify-content-center p-2" data-toggle="tooltip" title=" <?php echo number_format($incomePercent[1]) . "%" ?>">
                        <?php echo number_format($incomePercent[1]) . "%" ?>
                    </p>
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color:  dodgerblue; width: <?php echo number_format($incomePercent[1]) ?>%;">
                    </div>
                </div>
            </div>
            <!--Progress vége-->
            <div class="marg"></div>
            <div class="card text-center d-inline">
                <div class="card-header"><?php echo $history ?></div>
                <div class="card-body">
                    <?php
                    //Az adott hónap bevételeinek elkérése,
                    //Bevételek kiszűrése, ha az adott hónap valamelyik napjában nem volt bevétel felvéve.
                    $date_history = "SELECT `date`, income, etc 
                        FROM `expenditures` WHERE `email` = '$_SESSION[email]' AND date LIKE '%" . Flight::get("change_date") . "%' AND (income > 0 OR etc > 0) ORDER BY date DESC";

                    $result_history = mysqli_query($conn, $date_history);

                    if ($result_history->num_rows > 0) {
                        while ($row = $result_history->fetch_assoc()) {
                            echo '<div class="p-1"><strong>(' . $row["date"] . ') </strong>';
                            if ($row['income'] > 0) {
                                echo '<span> Fizetés: ' . number_format($row["income"], 0, ",", ".") . ' Ft. </span>';
                            }
                            if ($row['etc'] > 0) {
                                echo '<span> Egyébb bevétel: ' . number_format($row["etc"], 0, ",", ".") . ' Ft. </span>';
                            }
                            echo '</div>';
                        }
                    } else {
                        echo '<small class="font-italic text-center">Nincsenek adatok rögzítve</small>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#incomes").addClass("font-weight-bold");
        })
    </script>
</body>

</html>