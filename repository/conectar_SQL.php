<?php

class Conectar {
    public static function sql (){ // centralizando as configurações do banco de dados no arquivo ".env"
        $env = parse_ini_file('.env');
        $databaseType = $env["databaseType"];
        $database = $env["database"];
        $server = $env["server"];
        $user = $env["user"];
        $pass = $env["pass"];

        if ($databaseType === "mysql") {
            $database= "host=$server;dbname=$database";
        }
        // return new PDO("$databaseType:$database", $user, $pass);
        try {
            return new PDO("$databaseType:$database", $user, $pass);
        } catch (Exception $e) {
            $SQL_error = $e->getMessage();
            echo "<p class='card-panel red lighten-4 center'><b>$SQL_error</b><p>";

            // ABAIXO >> TENTATIVA DE CRIAR O BANCO E A TABELA NO MYSQL
            // if ( str_contains($SQL_error, "Unknown database") === TRUE) {
            //     Conectar::createDB($databaseType, $$database, $server, $user, $pass);
            // } else { var_dump($SQL_error); exit(); }
        } // print "OK\n";

    }

// ABAIXO >> TENTATIVA DE CRIAR O BANCO E A TABELA NO MYSQL
    public static function createDB($databaseType, $database, $server, $user, $pass) {
        try {
                if ($databaseType === "mysql") {
                    // $pdo = new PDO("mysql:host=$server, $user, '$pass' ");
                    $pdo = new PDO("mysql:host=$server; dbname=$database, $user, $pass ");
                }
                
                // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql_createDB = "CREATE DATABASE IF NOT EXISTS $database";
                if ($pdo->exec($sql_createDB)) {
                    echo "\nBanco de Dados criado com sucesso!\n";
                } else {
                    echo "\nerro ao criar tabela filmes\n"; 
                    exit();
                }

                $sql_createTable = "CREATE TABLE filmes (
                    id INTEGER PRIMARY KEY AUTO_INCREMENT,
                    titulo VARCHAR(200) NOT NULL,
                    poster VARCHAR (200),
                    sinopse TEXT,
                    nota DECIMAL(3,1),
                    favorito INT DEFAULT 0
                )
                ";  // sqlite = AUTOINCREMENT // mysql = AUTO_INCREMENT
                if ($pdo->exec($sql_createTable)) {
                    echo "\ntabela filmes criada\n";
                } else {
                    echo "\nerro ao criar tabela filmes\n"; 
                    exit();
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }


    }

}


// class Conectar {
//     public static function sql (){
//         return new PDO("sqlite:db/filmes.db");
//     }
// }