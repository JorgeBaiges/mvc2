<?php

    namespace App\Controllers;
    use Dompdf\Dompdf;
    use App\Models\Product;

    class ProductController{

        public function __construct(){
            
        }

        function index(){
            $products = Product::all();
            require "../app/views/product/index.php";
            // metodo home de Controller de mvc00
        }

        public function show($args){
            list($id) = $args;
            $product = Product::find($id);
            require ('../app/views/product/show.php');
            // metodo show de Controller de mvc00
        }

        /*public function pdf(){
            include_once "../vendor/autoload.php";
            $dompdf = new Dompdf();
            $dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
            $dompdf->render();
            $contenido = $dompdf->output();
            $nombreDelDocumento = "hola.pdf";
            $bytes = file_put_contents($nombreDelDocumento, $contenido);
        }*/
    }//Fin_Clase