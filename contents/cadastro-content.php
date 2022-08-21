<?php
/*
 * GNU GENERAL PUBLIC LICENSE -  Version 3, 29 June 2007
 * < https://www.gnu.org/licenses/gpl-3.0.en.html >  * 
 * Autor: Jefferson Rocha <root@slackjeff.com.br> 
 * Data : 2019-08-10
 */
?>

<div class="row">
    <div class="col s6 offset-s3">
        <div class="card">

            <div class="card-content">
                <span class="card-title">Cadastro de Filmes</span>


                <!-- NOME DO FILME -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="titulo" type="text" class="validate" require>
                        <label for="titulo">Título do Filme</label>
                    </div>
                </div>

                <!-- SOBRE/SINOPSE DO FILME -->
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="sinopse" class="materialize-textarea"></textarea>
                                <label for="sinopse">Sinopse</label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- NOTA DO FILME -->
                <div class="row">
                    <div class="input-field col s4">
                        <input id="nota" class="validate" type="number" step=".1" min=0 max=10 require>
                        <label for="nota">Nota</label>
                    </div>
                </div>

                <!-- IMAGEM/CAPA DO FILME -->
                <div class="file-field input-field">
                    <div class="btn purple lighten-2 black-text">
                        <span>Capa</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>


                <div class="card-action">
                    <a href="index.php" class="btn waves-effect waves-light grey">Cancelar</a>
                    <a href="#" class="btn waves-effect waves-light purple">Cadastrar</a>
                </div>

            </div>
        </div>
    </div>