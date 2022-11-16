<?php

    namespace App\Controllers;

    class ProductController{

        function __construct()
        {
            print "<br>Constructor clase ProductController";
        }//fin_constructor

        function index(){
            $products = \Product::all();
            require "../views/home.php";
            // metodo home de Controller de mvc00
        }

        function show(){
            $id = $_GET["id"];
            $product = \Product::find($id);
            require "../views/show.php";
            // metodo show de Controller de mvc00
        }

    }//Fin_Clase