<?php

session_start();

require_once "./app/controllers/FilmesController.php";

$rota = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];


    if($rota === "/") {
        require "./views/galeria.php";
        exit();
    };

    if( $rota === "/novo"){
        if($method === "GET") require "./views/cadastrar.php";
        if($method === "POST") {
            $filmeController = new FilmesController();
            $filmeController->save($_REQUEST);
        };
        exit();
}

    if(str_starts_with($rota, "/favoritar")) {
        $filmeController = new FilmesController();
        $filmeController->favorite(basename($rota));
        exit();
    }


if(str_starts_with($rota, "/filmes")) {

    if($method === "GET") require "./views/galeria.php";

    if($method==="DELETE") {
        $filmeController = new FilmesController();
        $filmeController->delete(basename($rota));

    }

    exit();
}






