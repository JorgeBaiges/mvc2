<?php

    //Recurso/metodo/parametro
        //recurso : controladores
        // accion : metodos del controlador -> show() , find
        // parametros  :  find -> id de producto.
        require_once("core/App.php");
        $metodo = new App();
        $metodo->run();
