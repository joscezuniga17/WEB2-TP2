<?php
require_once __DIR__ . '/app/controllers/canciones.controller.php';
require_once __DIR__ . '/app/controllers/playlist.controller.php';

define('BASE_URL','//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


/*TABLA DE RUTEO
*home -> PlaylistController::home()
*listar -> CancionesController::showCanciones()
*canciones ->CancionesController::showCanciones($id)
*playlist -> PlaylistController::showPlaylist($id)
*
**/

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// ruteo
switch ($params[0]) {  
    case 'home':
        $playlistController = new PlaylistController();
        $playlistController->home();
        break; 
    case 'listar':
        $listarController = new CancionesController();
        $listarController->showCanciones();
        break;
    case 'canciones':
        $listarController = new CancionesController();
        $listarController->showCancion($params[1]);
        break;
    case 'playlist':
        $playlistController = new PlaylistController();
        $playlistController->showPlaylist($params[1]);
        break;
   

    default:
        echo '404 error';
        break;
}

?>