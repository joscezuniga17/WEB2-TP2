<?php
require_once __DIR__ . '/../models/playlist.model.php';
require_once __DIR__ . '/../views/playlist.view.php';

class PlaylistController {

private $model;
private $view;

    public function __construct() {
            $this->model = new PlaylistModel();
            $this->view = new PlaylistView();
        }

    function home(){

        $playlist = $this->model->getAll();
        $this->view->showPlaylists($playlist);
    }

    public function showPlaylist($id) {
        $playlist = $this->model->getPlaylistId($id);
         $this->view->showPlaylist($playlist);
    }

}
?>