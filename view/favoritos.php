<?php require_once 'html/head.php' ?>



<?php
$controller = new FilmesController();
$sqlResult = $controller->favoritos();

if (!$sqlResult) { 
    echo "<p class='card-panel red lighten-4 center'><b>Nenhum registro encontrado no banco de dados.</b><p>";
    require_once 'index.php';
}
?>

<div class="container">
        <div class="row">
        <?php
        // for ($i = 0; $i < count($FILMES); $i++) {
        // $Filme = $FILMES[$i];
        // while ($filme = $sql->fetchArray()) :
        foreach ($sqlResult as $Filme) : ?>

            <div class="col s3 m6 l3" id="removerHTML<?= $Filme->id ?>">
                <div class="card hoverable">

                    <div class="card-image">
                        <img src="<?= $Filme->poster ?>">

                        <button class="btn-floating halfway-fab waves-effect waves-light red btn_favoritar"
                        data-id="<?= $Filme->id ?>">
                            <i class="material-icons">
                                <?= ($Filme->favorito)? "favorite" : "favorite_border" ?></i>
                        </button>
                    </div>

                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i><?= $Filme->nota ?></p>

                        <span class="card-title activator grey-text text-darken-4">
                            <?= $Filme->titulo ?>
                            <i class="material-icons right">more_vert</i>
                        </span>
                    </div>

                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?= $Filme->titulo ?>
                            <i class="material-icons right">close</i>
                        </span>

                        <p>
                            <?= substr($Filme->sinopse, 0, 200) . "..." // 0, 500 ?>
                            <a href="https://www.themoviedb.org/search?query=<?= $Filme->titulo ?>" target="_blank">
                                <span class="grey-text">The Movie Database</span>
                            </a>
                        </p>
                        
                        <button class="waves-effect waves-light btn-small right red accent-2 btn_apagar" data-id="<?= $Filme->id ?>">
                            <i class="material-icons">delete</i>
                        </button>
                    </div>

                </div>
            </div>

            <!-- MODAL PARA APAGAR FILME == <?= $Filme->id ?>, <?= $Filme->titulo ?> -->
            <div class="modal" id="modal_apagarFilme<?= $Filme->id ?>" data-id="<?= $Filme->id ?>">
                <div class="modal-content">
                    <h4 style="color:#4a148c;"> <b>APAGAR ITEM</b> </h4>
                    <p class="valign-wrapper">
                        <i class="material-icons amber-text">star</i><?= $Filme->nota ?>
                            &emsp; <b><?= $Filme->titulo ?></b>
                    </p>
                    <p>
                        <?= substr($Filme->sinopse, 0, 200) . "..." ?>
                        <a href="https://www.themoviedb.org/search?query=<?= $Filme->titulo ?>" target="_blank">
                            <span class="grey-text">The Movie Database</span>
                        </a>
                    </p>
                </div>
                <br>

                <div class="modal-footer">
                    <div class="left">
                        <a class="btn-flat waves-effect waves-light" href="/novo">Cadastrar Filme</a>
                    </div>
                    <a href="#!" class="modal-close waves-effect waves-red btn red modal_apagarFilme_apagar" data-id="<?= $Filme->id ?>">Apagar</a>
                    <a href="#!" class="modal-close waves-effect waves btn">Cancelar</a>
            </div>
            </div>


        <?php endforeach ?>

    </div> <!-- row -->
</div>




<?php require_once 'html/footer.php' ?>

