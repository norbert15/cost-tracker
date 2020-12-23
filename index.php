<?php
require 'flight/Flight.php';
session_start();

Flight::map("checkLoggedIn", function(){
    return isset($_SESSION["email"]) && $_SESSION["email"] != null;
});

Flight::map("renderOrRedirectByLoggedIn", function($render,  $redirect){
    if (Flight::checkLoggedIn()) {
        Flight::redirect($redirect);
    } else {
        Flight::render($render);
    }
});

Flight::map("renderOrRedirectByNotLoggedIn", function($render,  $redirect){
    if (!Flight::checkLoggedIn()) {
        Flight::redirect($redirect);
    } else {
        Flight::render($render);
    }
});

Flight::route('/', function(){
    Flight::redirect("home");
});

Flight::route('/home', function(){
    Flight::renderOrRedirectByLoggedIn("../home/render.php", "profile");
});

Flight::route('/home/*', function(){
    Flight::redirect("home");
});

Flight::route('/login', function(){
    Flight::renderOrRedirectByLoggedIn("../login/render.php", "profile");
});

Flight::route('/login/*', function(){
    Flight::redirect("login");
});

Flight::route('/registration', function(){
    Flight::renderOrRedirectByLoggedIn("../registration/render.php", "profile");
});

Flight::route('/registration/*', function(){
    Flight::redirect("registration");
});

Flight::route('/profile', function(){
    Flight::renderOrRedirectByNotLoggedIn("../profile/render.php", "login");
});

Flight::route('/profile/revenues', function(){
    Flight::renderOrRedirectByNotLoggedIn("../profile/revenues-render.php", "login");
});

Flight::route('/profile/overview', function(){
    Flight::renderOrRedirectByNotLoggedIn("../profile/overview-render.php", "login");
});

Flight::route('/profile/*', function(){
    Flight::redirect("/profile");
});

Flight::route('/*', function(){
    Flight::redirect("home");
});

Flight::start();
?>