<?php
session_start();


require_once './controller/FilmesController.php';

#$folder = "/cineflix";
$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];


if ($route === "/") {
    require_once 'view/index.php';
    exit();
}
if ($route === "/favoritos") {
    require_once 'view/favoritos.php';
    exit();
}
if ($route === "/pesquisar" && $method == "POST") {
    $controller = new FilmesController();
    $controller->search($_REQUEST); 
    exit();
}

if ($route === "/novo") {
    if ($method == "GET")
        require_once 'view/cadastro.php';
    if ($method == "POST") {
        $controller = new FilmesController();
        $controller->save($_REQUEST);
    }
    exit();
}

if ( substr($route, 0, strlen("/favoritar")) === "/favoritar" ) { // se os 11 primeiros caracteres são iguais a string
    $controller = new FilmesController();
    $controller->favorite(basename($route));
    exit();
}
if ( substr($route, 0, strlen("/filmes")) === "/filmes" ) {
    if ($method == "GET") { require_once 'galeria.php'; }
    if ($method == "DELETE") {
        $controller = new FilmesController();
        $controller->delete(basename($route));
    }
    exit();
}


echo "404 Not Found";
header("HTTP/1.1 404 Not Found");
