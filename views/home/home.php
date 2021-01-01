<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/home.css" />
</head>

<body class="font-weight-bold">
    <div>
        <div class="toggle d-flex justify-content-between">
            <i class="fa fa-home home-icon"></i>
            <div class="other-page">
                <a href="login"><?php echo $login ?></a>
                <small class="mr-1 ml-1">|</small>
                <a href="registration"><?php echo $register ?></a>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-3">
                <h1 class="mb-4"><?php echo $homeText ?></h1>
                <p><?php echo $homeText2 ?></p>
                <p><?php echo $homeText3 ?></p>
                <p class="text-uppercase"><?php echo $homeText4 ?></p>

                <div class="div-icons mt-3 mb-4 d-flex justify-content-center row">
                    <div class="div-transport">
                        <small><?php echo $transport ?></small>
                        <button disabled>
                            <i class="fa fa-bus"></i>
                        </button>
                    </div>

                    <div class="div-food">
                        <small><?php echo $food ?></small>
                        <button disabled>
                            <i class="fa fa-cutlery"></i>
                        </button>
                    </div>

                    <div class="div-shopping">
                        <small><?php echo $shopping ?></small>
                        <button disabled>
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>

                    <div class="div-gift">
                        <small><?php echo $gift ?></small>
                        <button disabled>
                            <i class="fa fa-gift"></i>
                        </button>
                    </div>

                    <div class="div-health">
                        <small><?php echo $health ?></small>
                        <button disabled>
                            <i class="fa fa-medkit"></i>
                        </button>
                    </div>

                    <div class="div-family">
                        <small><?php echo $family ?></small>
                        <button disabled>
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>

                    <div class="div-sport">
                        <small><?php echo $sport ?></small>
                        <button disabled>
                            <i class="fa fa-futbol-o"></i>
                        </button>
                    </div>
                </div>

                <p><?php echo $homeText5 ?></p>
                <p class="text-uppercase"><?php echo $homeText6 ?></p>

                <div class="div-icons mt-3 mb-4 d-flex justify-content-center row">
                    <div class="div-payment">
                        <small><?php echo $payment ?></small>
                        <button disabled>
                            <i class="fa fa-credit-card"></i>
                        </button>
                    </div>

                    <div class="div-etc">
                        <small><?php echo $etc ?></small>
                        <button disabled>
                            <i class="fa fa-money"></i>
                        </button>
                    </div>
                </div>

                <p><?php echo $homeText7 ?></p>
                <p><?php echo $homeText8 ?></p>
            </div>
        </div>
    </div>
</body>

</html>