<?php

use App\Services\SessionService;

require_once __DIR__."/app/Controller/UserController.php";
require_once __DIR__."/app/Controller/NewsController.php";
require_once __DIR__."/app/Services/SessionService.php";

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if($route === '/' or $route === "/index.php") {
    require "./views/home.php";
    exit;
}

if($route === "/login") {
    if($method === "GET") require "./views/login.php";

    if($method === "POST"){
        $userController = new UserController();
        $userController->login();
    }
    exit;

}if($route === "/register") {
    if($method === "GET") require "./views/register.php";

    if($method === "POST") {
        $userController = new UserController();
        $userController->register();
    }

    exit;
}

if($route === "/logout") {
    $userController = new UserController();
    $userController->logout();
    exit;
}

if($route === "/news/cadastrar"){
    $session = new SessionService();
    if(! $session->isLogged()) {
        header('location: /login');
        exit;
    }

    if($method === "POST") {
        $newsController = new NewsController();
        $newsController->createNews();
    }

    if($method === "GET") require __DIR__."/views/cadastrar.php";
    exit;
}

if($route === "/news/my"){
    require "views/myNews.php";
}