<?php
    //Fichero que simula el modelo
    class Product{
        const PRODUCTS= [
            array(1, 'Cortacesped'),
            array(2, 'Pizarra'),
            array(3, 'Billar'),
            array(4, 'Dardos'),
        ];

        function __construct(){/*Constructor vacio*/}

        public static function all(){
            //Devuelve todos los valores del array
            return Product::PRODUCTS;
        }

        public static function find($id){
            return Product::PRODUCTS[$id-1];
        }
    }//Fin clase

?>