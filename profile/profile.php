<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: ../login/login-page.php");
}
$email = $_SESSION["email"];

require_once '../operationsPHP/connect.php';
require_once '../operationsPHP/expend-income.php';
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
    <script src="../javaScript/add-exp-income.js"></script>
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="../operationsPHP/toggle.css">
    <link rel="stylesheet" href="../global-icons.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Költségkövető</title>
</head>

<body>
    <div>
        <!--Toggle kezdés-->
        <div>
            <?php require_once '../operationsPHP/toggle-profile.php'; ?>
        </div>
        <!--Toggle vége-->
        <!--Vissza jelzés-->
        <div>
            <?php require_once 'alert.php'?>
        </div>
        <!--Vissza jelzés vége-->
        <div class="container text-center mt-3">
            <div class="head">
                <h1 class="mt-4">Kiadások: <?php echo number_format($expendituresSum, 0, ",", ".") ?> Ft</h1>
                <small style="font-style: italic;">Kattints valamelyik kiadás ikonra az összeg felvételéhez!</small>
            </div>
            <div class="d-flex justify-content-center mt-3 mb-5 row expenditutes">
                <!--Utazási költség-->
                <div class="div-transport ml-4">
                    <small class="expend-transport">Közlekedés</small><br />
                    <button type="button" data-toggle="modal" data-target="#transport">
                        <i class="material-icons">directions_bus</i>
                    </button>
                    <br />
                    <small class="expend-transport"><?php echo number_format($expenditures[0], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="transport" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Utazási költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="transportEx">Kívánt összeg: </label>
                                    <input type="number" id="transportEx" name="transportEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Élelmiszer költség-->
                <div class="div-food">
                    <small class="expend-name ">Élelmiszer</small><br />
                    <button type="button" data-toggle="modal" data-target="#food">
                        <i class="material-icons">restaurant</i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[1], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="food" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Élelmiszer költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="foodEx">Kívánt összeg: </label>
                                    <input type="number" id="foodEx" name="foodEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Váráslási költség-->
                <div class="div-shopping">
                    <small class="expend-name ">Vásárlás</small><br />
                    <button type="button" data-toggle="modal" data-target="#shop">
                        <i class="material-icons">shopping_cart</i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[2], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="shop" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Vásárlási költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="shoppingEX">Kívánt összeg: </label>
                                    <input type="number" id="shoppingEX" name="shoppingEX" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Ajándék költség-->
                <div class="div-gift">
                    <small class="expend-gift">Ajándék</small><br />
                    <button type="button" data-toggle="modal" data-target="#gift">
                        <i class="material-icons">card_giftcard</i>
                    </button>
                    <br />
                    <small class="expend-gift"><?php echo number_format($expenditures[3], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="gift" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Ajándék költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="giftEx">Kívánt összeg: </label>
                                    <input type="number" id="giftEx" name="giftEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Egészségügyi költség-->
                <div class="div-health">
                    <small class="expend-health">Egészségügy</small><br />
                    <button type="button" data-toggle="modal" data-target="#health">
                        <i class="material-icons">spa</i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[4], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="health" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Egészségügyi költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="healthEx">Kívánt összeg: </label>
                                    <input type="number" id="healthEx" name="healthEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Családi költség-->
                <div class="div-family">
                    <small class="expend-family">Család</small><br />
                    <button type="button" data-toggle="modal" data-target="#family">
                        <i class="material-icons">face</i>
                    </button>
                    <br />
                    <small class="expend-family"><?php echo number_format($expenditures[5], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="family" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Családi költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="familyEx">Kívánt összeg: </label>
                                    <input type="number" id="familyEx" name="familyEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal vége-->
                </div>
                <!--Sport költség-->
                <div class="div-sport">
                    <small class="expend-name ">Szabadidő</small><br />
                    <button type="button" data-toggle="modal" data-target="#sport">
                        <i class="material-icons">sports_football</i>
                    </button>
                    <br />
                    <small class="expend-num"><?php echo number_format($expenditures[6], 0, ",", ".") ?> Ft</small>
                    <!--Modal kezdés-->
                    <div class="modal fade" id="sport" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Szabadidő költség megadása</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <label class="font-weight-bold" for="sportEx">Kívánt összeg: </label>
                                    <input type="number" id="sportEx" name="sportEx" />
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                                        <button type="submit" class="btn btn-primary expendAdd">Hozzáad</button>
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
                <div class="card-header">Előzmények (havi)</div>
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
        $(document).ready(function(){
            $("#expends").addClass("font-weight-bold");
        })
    </script>
</body>
</html>