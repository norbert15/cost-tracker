<?php
require 'vendor/autoload.php';
require 'controller/home/render.php';
require 'controller/login/render.php';
require 'controller/register/render.php';
require 'controller/profile/render/cost-render.php';
require 'controller/profile/render/overview-render.php';
require 'controller/profile/render/revenues-render.php';

session_start();

if(isset($_SESSION["email"]) && $_SESSION["email"] != null){
    Flight::route('GET|POST /profile', function(){
        Flight::redirect("profile/cost");
    });
    
    Flight::route('GET|POST /profile/cost', function(){
        Flight::cost_render();
    });
    
    Flight::route('GET|POST /profile/revenues', function(){
      Flight::revenues_render();
    });
    
    Flight::route('GET|POST /profile/overview', function(){
        Flight::overview_render();
    });

    Flight::route('GET|POST /profile/logout' ,function(){
        session_destroy();
        session_write_close();
        Flight::redirect("../login");
    });
    
    Flight::route('GET|POST /profile/*', function(){
        Flight::redirect("/profile/cost");
    });

    Flight::route('GET|POST /*', function(){
        Flight::redirect("/profile/cost");
    });

}else{
    Flight::route('GET|POST /home', function(){
        Flight::home_render();
    });
    
    Flight::route('GET|POST /login', function(){
        Flight::login_render();
    });
    
    Flight::route('GET|POST /registration', function(){
        Flight::register_render();
    });

    Flight::route("GET|POST /*", function(){
        Flight::redirect("../login");
    });
}

Flight::start();
?>