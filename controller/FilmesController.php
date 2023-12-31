<?php
require_once './repository/FilmesRepository.php';
require_once './model/filme.php';


class FilmesController {
    // VISUALIZAÇÃO DE DADOS NA TELA
    public function galeria() { // index()
        $filmesRepository = new FilmesRepository();
        return $filmesRepository->listarTodos(); // var_dump($sqlResult);
    }
    public function favoritos() {
        $filmesRepository = new FilmesRepository();
        return $filmesRepository->listarFavoritos();
    }
    public function search($REQUEST) {
        $filmesRepository = new FilmesRepository();
        // $result = ["pesquisa" => $filmesRepository->pesquisar( isset($REQUEST["barra_pesquisa"]) )]; // $result = ["sucess" => "ok"];
        $result = ["pesquisa" => $filmesRepository->pesquisar( $REQUEST["barra_pesquisa"] )]; // $result = ["sucess" => "ok"];
        header("Content-type: application/json");
        echo json_encode($result);
    }


    // ALTERAÇÃO DE DADOS NO BANCO
    public function save($REQUEST) {
        $filmesRepository = new FilmesRepository();
        $filme = (object) $REQUEST; // recebe um Objeto de $REQUEST

        $upload = $this->savePoster($_FILES);
        if ( gettype($upload) == "string" ) $filme->poster = $upload;
        else { echo "eeei"; }

        if ($filmesRepository->salvar($filme)) {
            $_SESSION["return"] = "Filme cadastrado com sucesso!";
        } else { $_SESSION["return"] = "Erro ao registrar o filme."; }
        
        header("Location: /");
    }

    private function savePoster($file) { // basename = remove o diretorio do arquivo e mantem o nome e extenção
        $poster_dir = "view/img/_posters/";
        $poster_path = $poster_dir . basename( $file["poster_file"]["name"] );
        $poster_tmp = $file["poster_file"]["tmp_name"];  

        if (move_uploaded_file($poster_tmp, $poster_path) ){ // chown -R www-data:www-data .          
            return $poster_path;
        } else { // var_dump( $_FILES["poster_file"] );
            return FALSE;
        }
    }

    public function favorite(int $id) {
        $filmesRepository = new FilmesRepository();
        $result = ["status" => $filmesRepository->favoritar($id)]; // $result = ["sucess" => "ok"];
        header("Content-type: application/json");
        echo json_encode($result);
    }

    public function delete(int $id) {
        $filmesRepository = new FilmesRepository();
        $result = ["status" => $filmesRepository->apagar($id)];
        header("Content-type: application/json");
        echo json_encode($result);
    }

}
