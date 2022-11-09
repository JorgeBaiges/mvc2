<?php

    //Recurso/metodo/parametro
        //recurso : controladores
        // accion : metodos del controlador -> show() , find
        // parametros  :  find -> id de producto.
    require "Controller.php";
    //Defino variable de peticion en la url
    $app = new Controller();

    // 1- recoger el metodo que pasan como parametro y si no
    // especifican ningun cargar el metodo home
    
    if(isset($_GET["method"])){
        $method = $_GET["method"];  //show, find, create, delete, update
    }else{
        $method = "home";
    }

    if(method_exists($app, $method)){
        $app->$method();
    }else{
        http_response_code(404);
        die("Metodo no encontrado"); //exit;
    }
