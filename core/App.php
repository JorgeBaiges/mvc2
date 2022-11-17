<?php
    namespace Core;
    class App{
        function __construct()
        {
            if(isset($_GET["url"]) && !empty($_GET["url"])){
                $url = $_GET["url"];

            } else{
                $url = "home";
            }
            // /product/show -> product: recurso ; show: action
            $arguments = explode('/', trim($url, '/'));
            $controllerName = array_shift($arguments); // product ; ProductController
            $controllerName = ucwords($controllerName) . "Controller";
            
            if(count($arguments)> 0){
                $method = array_shift($arguments); //show
            }else{
                $method = "index";
            } //fin_construct

            $file = "../app/controllers/$controllerName" . ".php";
            if(file_exists($file)){
                require_once $file;
            }else{
                http_response_code(404);
                die("No encontrado");
            }

            $controllerName = "\\App\\Controllers\\" . $controllerName;
            $controllerObject = new $controllerName;

            if(method_exists($controllerObject, $method)){
                $controllerObject->$method($arguments);

            }else{
                http_response_code(404);
                die("No encontrado");
            }

        }

    }//fin_App