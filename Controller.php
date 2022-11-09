<?php

    require_once "Product.php";

    class Controller {

        function __construct() {
            //const vacio
        }

        /*
         * Funcion que:
         * Recoge todos los productos
         * Llama a vista de inventario
         */
        public function home() {
            $products = Product::all();
            require "views/home.php";
        }

        /*
         *Funcion que: 
         * - Recuperar un producto en particular($id)
         * - llamar una vista de un producto en concreto
         */
        public function show(){
            $id = $_GET["id"];
            $product = Product::find($id); //vendra de start.php
            require "views/show.php";
        }

    }//Fin
    