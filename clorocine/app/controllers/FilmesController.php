<?php
//session_start();

require_once './app/repository/FilmesRepositoryPDO.php';
require_once './app/model/Filme.php';

class FilmesController
{
    private FilmesRepositoryPDO $filmesRepository;

    public function __construct(){
        $this->filmesRepository = new FilmesRepositoryPDO();
    }

    public function index(): array
    {
        return $this->filmesRepository->listAll();


    }

public function save($request) {

    $filme = new Filme();

    $filme->title = (filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    $filme->sinopse = (filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_SPECIAL_CHARS));
    $filme->nota = (filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_SPECIAL_CHARS));
    $filme->poster = (filter_input(INPUT_POST, 'poster', FILTER_SANITIZE_SPECIAL_CHARS));

    $upload = $this->savePoster($_FILES);

    if(gettype($upload) == "string") {
        $filme->poster = $upload;
    }

    if($this->filmesRepository->save($filme)) {
        $_SESSION["filmeSave"] = "success";
    }
    else {
        $_SESSION["filmeSave"] = "fail";
    }
    header('Location: /');

}

private function savePoster($poster): bool|string
{
        $posterDir = "storage/posters/";
        $posterPath =$posterDir . basename($poster["poster_file"]["name"]);
        $posterTmp = $poster["poster_file"]["tmp_name"];

    if ( ! move_uploaded_file($posterTmp, $posterPath)) {
        return false;
    }
    return $posterPath;

    }

    public function favorite(int $id){

        $result = ['success' => $this->filmesRepository->favorite($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function delete(int $id){

        $result = ['success' => $this->filmesRepository->delete($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }
}


