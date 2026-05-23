<?php

class GuardMiddleware {

    public function run($request) {

        session_start();

         if (!isset($_SESSION["IS_ADMIN"])) {
            header("Location: " . BASE_URL . "login");
            die();
        } 

        return $request;
    }
}