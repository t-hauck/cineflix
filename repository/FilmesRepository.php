<?php
require_once 'conectar_SQL.php';

class FilmesRepository {

    private $conexao;
    public function __construct() {
        $this->conexao = Conectar::sql();
    }

    // VISUALIZAÇÃO DE DADOS NA TELA
    public function listarTodos():array {
        // $bd = Conectar::sql();
        $filmesLista = array();

        $sql = "SELECT * FROM filmes";
        
        // $sqlResult = $bd->query($sql);
        $sqlResult = $this->conexao->query($sql);
        if (!$sqlResult) return false;

        while ($filme = $sqlResult->fetchObject()) {
            array_push($filmesLista, $filme);
        }

        return $filmesLista;
    } // listarTodos

    public function listarFavoritos():array {
        $filmesLista = array();
        $sql = "SELECT * FROM filmes WHERE favorito = 1";

        $sqlResult = $this->conexao->query($sql);
        if (!$sqlResult) return false;

        while ($filme = $sqlResult->fetchObject()) {
            array_push($filmesLista, $filme);
        }

        return $filmesLista;
    } // listarFavoritos


    public function pesquisar($busca):array {
        $filmesLista = array();
        $sql = "SELECT * FROM filmes WHERE titulo like '%$busca%'";

        $sqlResult = $this->conexao->query($sql);
        if (!$sqlResult) return false;

        while ($filme = $sqlResult->fetchObject()) {
            array_push($filmesLista, $filme);
        }

        return $filmesLista;
    } // pesquisa


    // ALTERAÇÃO DE DADOS NO BANCO
    public function salvar($filme):bool { // INSERÇÃO DE DADOS
        $sql = "INSERT INTO filmes (titulo, sinopse, nota, poster) VALUES (:titulo, :sinopse, :nota, :poster)";

        // $stmt = $bd->prepare($sql);
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $filme->titulo, PDO::PARAM_STR);     // SQLITE3_TEXT);
        $stmt->bindValue(':sinopse', $filme->sinopse, PDO::PARAM_STR);   // SQLITE3_TEXT);
        $stmt->bindValue(':nota', $filme->nota, PDO::PARAM_STR);         // SQLITE3_FLOAT);
        $stmt->bindValue(':poster', $filme->poster, PDO::PARAM_STR);     // SQLITE3_TEXT);

        return $stmt->execute();
    }

    public function favoritar(int $id) {
        $sql = "UPDATE filmes SET favorito=NOT favorito WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if ( $stmt->execute() ) {
            return "ok";
        } else { return "erro"; }
    }

    public function apagar(int $id) {
        $sql = "DELETE FROM filmes WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if ( $stmt->execute() ) {
            return "ok";
        } else { return "erro"; }
    }


}
