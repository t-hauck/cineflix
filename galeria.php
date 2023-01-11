<?php
/*
 * GNU GENERAL PUBLIC LICENSE -  Version 3, 29 June 2007
 * < https://www.gnu.org/licenses/gpl-3.0.en.html >  * 
 * Autor: Jefferson Rocha <root@slackjeff.com.br> 
 * Data : 2019-08-10
 *
 *         <?php require_once 'html/footer.php' ?>
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require_once 'view/head.php' ?>
</head>
<body>

    <nav class="nav-extended purple lighten-3" id="film_background">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right">
                    <li><a href="/">Galeria</a></li>
                    <li><a href="/novo">Cadastro</a></li>
                </ul>
            </div>

            <div class="nav-header center">
                <h1>
                    <a href="/">cineFlix</a>
                </h1>
            </div>

            <div class="nav-content" id="itens_menu">
                <ul class="tabs tabs-transparent purple darken-1">
                    <li class="tab"><a class="active" href="#test1">Todos</a></li>
                    <!-- <li class="tab"><a class="active" href="#test2">Assistidos</a></li> -->
                    <li class="tab"><a href="#test3">Favoritos</a></li>
                    <!-- class="tab disabled" -->
                </ul>
            </div>
        </nav>


    <?php require_once 'view/galeria-content.php' ?>
</body>

</html>