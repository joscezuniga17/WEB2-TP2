<?php

class PlaylistModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;dbname=db_playlist;charset=utf8', 'root', '');
    }

    public function getAll() {

        $query = $this->db->prepare('SELECT * FROM playlist');
        $query-> execute();

        $playlist = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $playlist;
    }

    public function getPlaylistId($id){

        $query = $this->db->prepare('SELECT canciones.*, playlist.nombre_playlist
        FROM canciones
        INNER JOIN playlist
        ON canciones.id_playlist = playlist.id_playlist
        WHERE playlist.id_playlist = ?');

        $query->execute([$id]);

        $playlist = $query->fetchAll(PDO::FETCH_OBJ);

        return $playlist;
    }
    

}