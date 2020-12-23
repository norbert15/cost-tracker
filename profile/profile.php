<?php
require_once 'operationsPHP/connect.php';
require_once 'operationsPHP/expend-income.php';

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../javaScript/add-exp-income.js"></script>
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="../operationsPHP/toggle.css" />
    <link rel="stylesheet" href="../global-icons.css" />
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
            <?php require_once 'alert.php'; ?>
        </div>
        <!--Vissza jelzés vége-->
        <div class="container text-center mt-3">
            <div class="head">
                <h1 class="mt-4"><?php echo $expend . number_format(Flight::get("expenditures_sum"), 0, ",", ".") ?> Ft</h1>
                <small style="font-style: italic;"><?php echo $profileText?></small>
            </div>
            <div class="d-flex justify-content-center mt-3 mb-5 row expenditutes">
                <!--Utazási költség-->
                <div class="div-transport main ml-4" id="0">
                    <small><?php echo $transport?></small><br />
                    <input type="text" class="one-name" hidden value="transport">
                    <button type="button" data-toggle="modal" data-target="#transport">
                        <i class="fa fa-bus"></i>
                    </button>
                    <br />
                    <small class="expend-transport"><?php echo number_format($expenditures[0], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="transport" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $transportModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="transportEx"><?php echo $desiredAmount?></label>
                                    <input type="number" class="one-sum" id="transportEx" name="transportEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Élelmiszer költség-->
                <div class="div-food main" id="1">
                    <small><?php echo $food?></small><br />
                    <input type="text" class="one-name" hidden value="food">
                    <button type="button" data-toggle="modal" data-target="#food">
                        <i class="fa fa-cutlery"></i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[1], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="food" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $foodModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="foodEx"><?php echo $desiredAmount?> </label>
                                    <input type="number" class="one-sum" id="foodEx" name="foodEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Váráslási költség-->
                <div class="div-shopping main" id="2">
                    <small><?php echo $shopping?></small><br />
                    <input type="text" class="one-name" hidden value="shopping">
                    <button type="button" data-toggle="modal" data-target="#shop">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[2], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="shop" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $shoppingModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="shoppingEX"><?php echo $desiredAmount?></label>
                                    <input type="number" class="one-sum" id="shoppingEX" name="shoppingEX" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Ajándék költség-->
                <div class="div-gift main" id="3">
                    <small><?php echo $gift?></small><br />
                    <input type="text" class="one-name" hidden value="gift">
                    <button type="button" data-toggle="modal" data-target="#gift">
                        <i class="fa fa-gift"></i>
                    </button>
                    <br />
                    <small class="expend-gift"><?php echo number_format($expenditures[3], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="gift" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $giftModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="giftEx"><?php echo $desiredAmount?> </label>
                                    <input type="number" class="one-sum" id="giftEx" name="giftEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Egészségügyi költség-->
                <div class="div-health main" id="4">
                    <small><?php echo $health?></small><br />
                    <input type="text" class="one-name" hidden value="health">
                    <button type="button" data-toggle="modal" data-target="#health">
                        <i class="fa fa-medkit"></i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[4], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="health" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $healthModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="healthEx"><?php echo $desiredAmount?> </label>
                                    <input type="number" class="one-sum" id="healthEx" name="healthEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Családi költség-->
                <div class="div-family main" id="5">
                    <small><?php echo $family?></small><br />
                    <input type="text" class="one-name" hidden value="family">
                    <button type="button" data-toggle="modal" data-target="#family">
                        <i class="fa fa-heart"></i>
                    </button>
                    <br />
                    <small class="expend-family"><?php echo number_format($expenditures[5], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="family" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $familyModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="familyEx"><?php echo $desiredAmount?> </label>
                                    <input type="number" class="one-sum" id="familyEx" name="familyEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Sport költség-->
                <div class="div-sport main" id="6">
                    <small><?php echo $sport?></small><br />
                    <input type="text" class="one-name" hidden value="sport">
                    <button type="button" data-toggle="modal" data-target="#sport">
                        <i class="fa fa-futbol-o"></i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[6], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="sport" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $sportModalTitle?></h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="sportEx"><?php echo $desiredAmount?> </label>
                                    <input type="number" class="one-sum" id="sportEx" name="sportEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
                                        <button type="button" class="btn btn-primary add-sum"><?php echo $add?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Költségek vége-->
            </div>
            <!--Össz költségek vége-->
            <!--Progress bar kezdés-->
            <?php require_once 'progress-bar.php'; ?>
            <!--Progress bar vége-->
            <div class="marg"></div>
            <!--Card kezdés-->
            <div class="card d-inline">
                <div class="card-header"><?php echo $history?></div>
                <div class="card-body text-left">
                    <?php
                    require_once 'history.php';
                    ?>
                </div>
            </div>
            <!--Card vége-->
        </div>
        <!--Container vége-->
    </div>
    <script>
        $(document).ready(function() {
            $("#expends").addClass("font-weight-bold");
        })
    </script>
</body>

</html>