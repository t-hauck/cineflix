<?php
$bd = new SQLite3("filmes.db");

$sql = "ALTER TABLE filmes ADD COLUMN favorito INT DEFAULT 0";

if ($bd->exec($sql)) 
    echo "\ntabela 'filmes' alterada com sucesso\n"; 
else
echo "\nfalha ao alterar tabela 'filmes'\n";