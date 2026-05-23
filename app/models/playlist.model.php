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

        $query = $this->db->prepare('SELECT * FROM playlist WHERE id_playlist= ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    

}