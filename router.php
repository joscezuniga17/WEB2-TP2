<?php

define('BASE_URL','//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once __DIR__ . '/app/controllers/canciones.controller.php';
require_once __DIR__ . '/app/controllers/playlist.controller.php';
require_once __DIR__ . '/app/controllers/login.controller.php';
require_once __DIR__ . '/app/middlewares/guard.middleware.php';
require_once __DIR__ . '/app/middlewares/session.middleware.php';

session_start();


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



$request = new StdClass();
$request = (new SessionMiddleware()) ->run($request);

// ruteo
switch ($params[0]) {  
    case 'home':
        $request = (new GuardMiddleware())->run($request);
        $playlistController = new PlaylistController();
        $playlistController->home();
        break; 
    case 'listar':
        $request = (new GuardMiddleware())->run($request);
        $listarController = new CancionesController();
        $listarController->showCanciones($request);
        break;
    case 'canciones':
        $request = (new GuardMiddleware())->run($request);
        $listarController = new CancionesController();
        $listarController->showCancion($params[1]);
        break;
    case 'playlist':
        $request = (new GuardMiddleware())->run($request);
        $playlistController = new PlaylistController();
        $playlistController->showPlaylist($params[1] ?? null);
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