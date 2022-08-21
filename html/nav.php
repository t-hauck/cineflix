<?php
/*
 * GNU GENERAL PUBLIC LICENSE -  Version 3, 29 June 2007
 * < https://www.gnu.org/licenses/gpl-3.0.en.html >  * 
 * Autor: Jefferson Rocha <root@slackjeff.com.br> 
 * Data : 2019-08-10
 */


$URL = $_SERVER['REQUEST_URI']; // echo $URL;
$PAGE1 = "/index.php";
$PAGE2 = "/cadastro.php";
$PAGE3 = "/sobre.php";

if ($URL == "/" || $URL == $PAGE1) {  ////////////////////////////// INDEX - GALERIA
    echo <<<_HTML
    <nav class="nav-extended purple lighten-3" id="film_background">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="#">Galeria</a></li>
                <li><a href="$PAGE2">Cadastro</a></li>
                <li><a href="$PAGE3">Sobre</a></li>
            </ul>
        </div>

        <div class="nav-header center">
            <h1>
                <a href="/">cineFlix</a>
            </h1>
        </div>

        <div class="nav-content" id="itens_menu">
            <ul class="tabs tabs-transparent purple darken-1">
                <li class="tab"><a href="#test1">Todos</a></li>
                <li class="tab"><a class="active" href="#test2">Assistidos</a></li>
                <li class="tab disabled"><a href="#test3">Favoritos</a></li>
                <!-- class="tab disabled" -->
            </ul>
        </div>
    </nav>
    _HTML;
} else if ($URL == $PAGE2) { /////////////////////////////////////// CADASTRO
    echo <<<_HTML
    <nav class="nav-extended purple lighten-3" id="film_background">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="$PAGE1">Galeria</a></li>
                <li><a href="#">Cadastro</a></li>
                <li><a href="$PAGE3">Sobre</a></li>
            </ul>
        </div>

        <div class="nav-header center">
            <h1>
                <a href="/">cineFlix</a>
            </h1>
        </div>
    </nav>
    _HTML;
} else if ($URL == $PAGE3) { /////////////////////////////////////// SOBRE - PAGINA EM DESENVOLVIMENTO
    echo <<<_HTML
    <nav class="nav-extended purple lighten-3" id="film_background">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="$PAGE1">Galeria</a></li>
                <li><a href="$PAGE2">Cadastro</a></li>
                <li><a href="#">Sobre</a></li>
            </ul>
        </div>

        <div class="nav-header center">
            <h1>
                <a href="/">cineFlix</a>
            </h1>
        </div>

        <div class="nav-content" id="itens_menu">
            <ul class="tabs tabs-transparent purple darken-1">
                <li class="tab"><a class="active" href="#">Sobre</a></li>
                <li class="tab"><a href="https://github.com/thiagohauck/" target="_blank">Código Fonte</a></li>
                <li class="tab"><a href="https://www.linkedin.com/in/thiagohauck/" target="_blank">Linkedin</a></li>
            </ul>
        </div>
    </nav>
    _HTML;
} else {
    echo "PHP ERROR";
}
