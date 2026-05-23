<?php

class SessionMiddleware {

    public function run($request) {
        

        if(isset($_SESSION['IS_ADMIN'])) {
            $request -> user = new StdClass();
            $request->user->id = $_SESSION['IS_ADMIN'];
            $request->user->username = $_SESSION['USER'];

        }else{
            $request->user = null;
        }
         return $request;
    }
   
}