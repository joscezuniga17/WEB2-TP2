<?php

define('BASE_URL','//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once __DIR__ . '/app/controllers/canciones.controller.php';
require_once __DIR__ . '/app/controllers/playlist.controller.php';
require_once __DIR__ . '/app/controllers/login.controller.php';




/*TABLA DE RUTEO
*home -> PlaylistController::home()
*listar -> CancionesController::showCanciones()
*canciones ->CancionesController::showCancion($id)
*playlist -> PlaylistController::showPlaylist($id)
*login -> LoginController::login()
*verificarLogin -> LoginController::verificarLogin()
*logout->LoginController::logout()
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
    case 'login':
        $logincontroller = new LoginController();
        $logincontroller->login();
        break;
    case 'verificarLogin':
        $logincontroller = new LoginController();
        $logincontroller->verificarLogin();
        break;
    case 'logout':
        $logincontroller = new LoginController();
        $logincontroller->logout();
        break;
    default:
        echo '404 error';
        break;
}

?>