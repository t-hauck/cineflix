<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once 'html/head.php' ?>
</head>
<body>

    <?php require_once 'html/nav.php' ?>
    <?php require_once 'barra_de_pesquisa.php' ?>
    
    
<div class="row">
    <form method="POST" enctype="multipart/form-data"> <!-- action="FilmesController.php" -->

        <div class="col s6 offset-s3">
            <div class="card">

                <div class="card-content">
                    <span class="card-title">Cadastro de Filmes</span>


                    <!-- NOME DO FILME -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="titulo" type="text" class="validate" name="titulo" required>
                            <label for="titulo">Título do Filme</label>
                        </div>
                    </div>

                    <!-- SOBRE/SINOPSE DO FILME -->
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="sinopse" class="materialize-textarea" name="sinopse"></textarea>
                            <label for="sinopse">Sinopse</label>
                        </div>
                    </div>

                    <!-- NOTA DO FILME -->
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="nota" class="validate" type="number" step=".1" min=0 max=10 name="nota" required>
                            <label for="nota">Nota</label>
                        </div>
                    </div>

                    <!-- IMAGEM/CAPA DO FILME -->
                    <div class="file-field input-field">
                        <div class="btn purple lighten-2 black-text">
                            <span>Capa</span>
                            <input type="file" name="poster_file" accept="image/*" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate">
                        </div>
                    </div>

                    <div class="card-action">
                        <button href="/" class="btn waves-effect waves-light grey">Cancelar</button>
                        <button type="submit" href="#" class="btn waves-effect waves-light purple">Cadastrar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once 'html/footer.php' ?>


