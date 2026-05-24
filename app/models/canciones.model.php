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

    public function insertSong($nombre, $artista, $album, $genero, $año, $duracion, $mood, $link, $playlist) {

    $query = $this->db->prepare(" INSERT INTO canciones (nombre_cancion, artista, album, genero, anio, duracion, mood, youtube_link, id_playlist) VALUES (?, ?, ?)");

    $query->execute([$nombre, $artista, $album, $genero, $año, $duracion, $mood, $link, $playlist]);
}
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM canciones WHERE id = ?");
        $query->execute([$id]);
    }


}



