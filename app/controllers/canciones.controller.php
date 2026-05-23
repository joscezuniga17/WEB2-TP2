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

    function showCanciones(){

        $canciones = $this->model->getAll();
        $this->view->showCanciones($canciones);
    }


}