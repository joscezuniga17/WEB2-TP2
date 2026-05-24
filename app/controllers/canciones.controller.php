<?php
require_once __DIR__ . '/../models/canciones.model.php';
require_once __DIR__ . '/../views/canciones.view.php';


class CancionesController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CancionesModel();
        $this->view = new CancionesView();
    }

    public function showCanciones(){

        $canciones = $this->model->getAll();
        $this->view->showCanciones($canciones);
    }

    public function showCancion($id){
        $cancion = $this->model->getSongListId($id);
        $this->view->showCancion($cancion);        
    }

    public function Agregar() {
        if(!empty($_POST)){
            $nombre = $_POST['nombre_cancion'];
            $artista = $_POST['artista'];
            $album = $_POST['assigned'];
            $genero = $_POST['type'];
            $año = $_POST['anio'];
            $duracion = $_POST['duracion'];
            $mood = $_POST['mood'];
            $link = $_POST['youtube_link'];
            $playlist = $_POST['id_playlist'];

            $this->model->insertSong($nombre, $artista, $album, $genero, $año, $duracion, $mood, $link, $playlist);

            header("Location: " . BASE_URL );  
        }
                       
    }

    public function eliminar($id) {
        $this->model->eliminar($id);
        header("Location: home");
    }

    public function editar($id) {

            $cancion = $this->model->getById($id);
            $playlists = $this->model->getPlaylists();

            $nombre = $_POST['nombre_cancion'];
            $artista = $_POST['artista'];
            $album = $_POST['album'];
            $genero = $_POST['genero'];
            $año = $_POST['anio'];
            $duracion = $_POST['duracion'];
            $mood = $_POST['mood'];
            $link = $_POST['youtube_link'];
            $playlist = $_POST['id_playlist'];

            $this->model->editar($id, $nombre, $artista, $album, $genero, $año ,$duracion, $mood, $link, $playlist);

            header("Location: home");
    }

}
?>



