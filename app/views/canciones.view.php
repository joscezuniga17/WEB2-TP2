<?php

class CancionesView {

    public function showCanciones($canciones) {

        require './templates/canciones.phtml';
    }
    
    public function showCancion($cancion) {

        require './templates/cancionid.phtml';
    }
}

?>