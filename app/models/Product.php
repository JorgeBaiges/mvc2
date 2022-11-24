<?php
    //Fichero que simula el modelo
    class Product{
        
        public static function all(){
            //Devuelve todos los valores del array
            return Product::PRODUCTS;
        }

        public static function find($id){
            return Product::PRODUCTS[$id-1];
        }
    }//Fin clase

?>