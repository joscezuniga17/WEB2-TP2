<?php

class CancionesModel {



    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_playlist;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT canciones.*, playlist.nombre_playlist 
        FROM canciones
        INNER JOIN playlist 
        ON canciones.id_playlist = playlist.id_playlist');
        $query->execute();

        $canciones = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $canciones;
    }

    public function getSongListId($id) {
        $query = $this->db->prepare('SELECT canciones.*,playlist.nombre_playlist
        FROM canciones 
        INNER JOIN playlist
        ON canciones.id_playlist = playlist.id_playlist
        WHERE id_cancion = ?');

        $query->execute([$id]);
        $cancion = $query->fetch(PDO::FETCH_OBJ);

        return $cancion;
    }


}



