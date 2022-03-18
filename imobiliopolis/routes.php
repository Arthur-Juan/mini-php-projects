<?php
require_once __DIR__."/vendor/autoload.php";

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$homeController = new \App\Controllers\HomeController();
if($route === "/"){
    $homeController->index();
}