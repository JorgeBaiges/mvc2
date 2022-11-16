<?php

    namespace App\Controllers;
    
    class HomeController{

        function __construct()
        {
            
        }//fin_constructor

        function index(){
            include "../app/views/home.php";
            // metodo home de Controller de mvc00
        }

        function show(){
            print "<br>Dentro de show de HomeController";
            // metodo show de Controller de mvc00
        }

    }//Fin_Clase