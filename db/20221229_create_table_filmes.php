<?php
$bd = new SQLite3("filmes.db");

$sql = "DROP TABLE IF EXISTS filmes";

if ($bd->exec($sql)) 
    echo "\ntabela filmes apagada\n"; 


$sql = "CREATE TABLE filmes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titulo VARCHAR(200) NOT NULL,
        poster VARCHAR (200),
        sinopse TEXT,
        nota DECIMAL(3,1),
        favorito INT DEFAULT 0
    )
";  // sqlite = AUTOINCREMENT // mysql = AUTO_INCREMENT

if ($bd->exec($sql))
    echo "\ntabela filmes criada\n"; 
else 
    echo "\nerro ao criar tabela filmes\n"; 


$sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VALUES (
        
        'Vingadores',
        'https://image.tmdb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg',
        'Depois dos eventos devastadores de “Guerra do Infinito”, o universo está em ruínas. Com a ajuda dos aliados que restam, os Vingadores juntam-se mais uma vez para tentar desfazer as ações de Thanos e restaurar a ordem ao universo',
        9.9
    )";

if ($bd->exec($sql)) 
    echo "\nfilmes inseridos com sucesso\n"; 
else 
    echo "\nerro ao inserir filmes\n"; 


    $sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VALUES (
        'O Auto da Compadecida',
        'https://image.tmdb.org/t/p/w300/imcOp1kJsCsAFCoOtY5OnPrFbAf.jpg',
        'As aventuras de João Grilo (Matheus Natchergaele), um sertanejo pobre e mentiroso, e Chicó (Selton Mello), o mais covarde dos homens. Ambos lutam pelo pão de cada dia e atravessam por vários episódios enganando a todos da pequena cidade em que vivem.',
        10.0
    )";

if ($bd->exec($sql)) 
echo "\nfilmes inseridos com sucesso\n"; 
else 
echo "\nerro ao inserir filmes\n";




/*
$sql = new SQLite3("filmes.db");


$sql = "DROP TABLE IF EXISTS filmes";
if ($bd->exec($sql))
    echo "\ntabela 'filmes' APAGADA com sucesso\n";


$sql = "CREATE TABLE IF NOT EXISTS filmes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    poster VARCHAR(200),
    sinopse TEXT,
    nota DECIMAL(2,1)
    )
";

if ($bd->exec($sql))
    echo "\nTabela 'filmes' criada\n";
else
    echo "\nerro ao criar tabela\n";



// INSERÇÃO DE DADOS
$sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
    0,
    'The Day of the Doctor',
    'https://ichef.bbci.co.uk/images/ic/736x414_b/p0dhb7dx.jpg',
    'Doctor Who 50 Anos',
    '10'
)";
if ($bd->exec($sql)) {
    echo "\nfilme inserido com sucesso\n";
} else
    echo "\nfalha ao salvar filmes\n";
*/