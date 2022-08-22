<?php

$FILME1 = [
    "titulo" => "Vingadores",
    "nota" => "8.6",
    "sinopse" => "sinopse",
    "poster" => "https://www.themoviedb.org/t/p/w300/RYMX2wcKCBAr24UyPD7xwmjaTn.jpg"
];
$FILME2 = [
    "titulo" => "FILME 2",
    "nota" => "00",
    "sinopse" => "sinopse",
    "poster" => "https://www.themoviedb.org/t/p/w300/RYMX2wcKCBAr24UyPD7xwmjaTn.jpg"
];

$FILMES = [$FILME1, $FILME2];
?>


<div class="row">
    <?php
    #for ($i = 0; $i < count($FILMES); $i++) {
    #$Filme = $FILMES[$i];
    foreach ($FILMES as $Filme) : ?>

        <div class="col s3">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="<?= $FILME1["poster"] ?>" />
                    <!-- https://www.themoviedb.org/t/p/original/RYMX2wcKCBAr24UyPD7xwmjaTn.jpg -->
                    <a class="btn-floating halfway-fab waves-effect waves-light red">
                        <i class="material-icons">favorite_border</i>
                    </a>
                    <span class="card-title">
                        <?php echo $Filme["titulo"] ?>
                    </span>
                </div>
                <div class="card-content">
                    <p class="valign-wrapper"><i class="material-icons amber-text">star</i>
                        <?= $Filme["nota"] ?>
                    </p>
                    <p>
                        <?= $Filme["sinopse"] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>