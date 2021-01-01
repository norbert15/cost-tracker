<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="assets/js/app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/register-login-page.css" />
</head>

<body class="text-center">
    <div>
        <div class="toggle w-100 p-2">
            <a class="float-left" href="home"><?php echo $home?></a>
        </div>
        <div class="container">
          
            <div class="d-inline-block resp">
                <h1 class="mb-4 text-uppercase"><?php echo $login?></h1>
                <form>
                    <div class="form-group">
                        <label for="email"><?php echo $email?></label>
                        <input type="email" class="form-control email" id="email" placeholder="Email@gmail.hu">
                        <div class="invalid-feedback"><?php echo $emailFeedback?></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo $pass?></label>
                        <input type="password" class="form-control password" id="password" placeholder="*******">
                        <div class="invalid-feedback"><?php echo $passwordFeedback?></div>
                    </div>
                    <div class="error"></div>
                    <div class="invalid-feedback allError"><?php echo $feedback?></div>
                    <br />
                    <button type="button" id="login" class="btn"><?php echo $login?></button>
                </form>
                <div class="mt-3">
                    <p><?php echo $loginText?> <a href="registration"><?php echo $loginText2?></a></p>
                </div>
            </div>
            <div class="alert alert-success text-center m-auto w-50" hidden role="alert" id="success-alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $successAlert?></strong>
            </div>
            <div class="alert alert-danger text-center m-auto w-50" hidden role="alert" id="danger-alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $errorAlert?></strong>
            </div>
        </div>
    </div>
</body>

</html>