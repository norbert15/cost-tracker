<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title?></title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="assets/js/app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/register-login-page.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
</head>

<body class="text-center">
    <div>
        <div class="toggle w-100 p-2">
            <a class="float-left" href="home"><?php echo $home?></a>
        </div>
        <div class="container">
            <div class="d-inline-block resp">
                <h1 class="mb-4 text-uppercase"><?php echo $regist?> </h1>
                <form>
                    <div class="form-group">
                        <label for="name"><?php echo $fullname?></label>
                        <input type="text" class="form-control name" id="register-name" placeholder="Teljes név">
                        <div class="invalid-feedback"><?php echo $nameFeedback?></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo $email?></label>
                        <input type="email" class="form-control email" id="register-email" placeholder="Email@gmail.hu">
                        <div class="invalid-feedback emailError"><?php echo $emailFeedback?></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo $pass?></label>
                        <input type="password" class="form-control password" id="register-password" placeholder="*******">
                        <div class="invalid-feedback passwordError"><?php echo $passwordFeedback?></div>
                    </div>

                    <button type="button" id="signup" class="btn"><?php echo $register?></button>
                </form>

                <div class="mt-3">
                    <p><?php echo $registText?> <a href="login"><?php echo $registText2?></a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>