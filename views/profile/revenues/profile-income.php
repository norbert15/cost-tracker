<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/add-exp-income.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/global-icons.css" />
    <link rel="stylesheet" href="../assets/css/toggle.css">
    <link rel="stylesheet" href="../assets/css/profile.css" />
</head>

<body>
    <div>
        <!--Toggle kezdés-->
        <div>
            <?php require_once 'views/profile/operations/toggle-profile.php'; ?>
        </div>
        <!--Toggle vége-->
        <!--Vissza jelzés-->
        <div>
            <?php require_once 'views/profile/operations/alert.php'; ?>
        </div>
        <!--Vissza jelzés vége-->
        <div class="container text-center mt-3">
            <div class="head">
                <h1 class="mt-4"><?php echo $incomeText;?><span class="<?php echo $set_class; ?>"> 
                <?php echo number_format(($income_sum - $expenditures_sum), 0, ",", ".") ?> Ft </span></h1>
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
                <h2><?php echo $incomeText3 . number_format($income_sum, 0, ",", ".") ?> Ft</h1>
            </div>
            <div class="progress-label">
                <small><?php echo $allCost ?></small>
                <small><?php echo $allRevenues ?></small>
            </div>
            <div class="d-flex justify-content-center mt-4 icon-margin progress-income">
                <div class="progress vertical">
                    <p class="p-income d-flex justify-content-center p-2" data-toggle="tooltip" title=" <?php echo number_format($incomePercent["expend"]) . "%" ?>">
                        <?php echo number_format($incomePercent["expend"]) . "%" ?>
                    </p>
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color: rgb(202, 13, 13); width: <?php echo number_format($incomePercent["expend"]) ?>%;">
                    </div>
                </div>
                <div class="progress vertical" style="margin-left: -40px;">
                    <p class="p-income d-flex justify-content-center p-2" data-toggle="tooltip" title=" <?php echo number_format($incomePercent["income"]) . "%" ?>">
                        <?php echo number_format($incomePercent["income"]) . "%" ?>
                    </p>
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color:  dodgerblue; width: <?php echo number_format($incomePercent["income"]) ?>%;">
                    </div>
                </div>
            </div>
            <!--Progress vége-->
            <div class="marg"></div>
            <div class="card text-center d-inline">
                <div class="card-header"><?php echo $history ?></div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</body>

</html>