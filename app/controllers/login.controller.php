<?php

require_once __DIR__ . '/../views/login.view.php';

class LoginController {

    private $model;
    private $view;
    private $titulo;

    public function __construct() {
        
        $this->view = new LoginView();
        $this->titulo = "Login";
    }

    public function login() {


    $this->view->showLogin();         
    }

    public function verificarLogin() {

        session_start();

        $usuario = $_POST["nombre_usuario"];
        $password = $_POST["password"];

        if ($usuario === "webadmin" && $password === "admin") {

        $_SESSION["USER"] = $usuario;
        $_SESSION["IS_ADMIN"] = true;

        header("Location: " . BASE_URL . "home");
        exit();

        } else {
            $this->view->showLogin("Usuario o contraseña incorrectos");
            header("Location: " . BASE_URL . "login");
           
        } 
    }

    public function checkAdmin() {

        session_start();

        if (!isset($_SESSION["IS_ADMIN"]) || $_SESSION["IS_ADMIN"] !== true) {
            echo "Acceso denegado";
            die();
        }
    }
    public function logout() {
       
        session_start();

        session_destroy();

        header("Location: " . BASE_URL . "login");
        exit();
    }
       
}