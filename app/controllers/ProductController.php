<?php

    namespace App\Controllers;
    use Dompdf\Dompdf;
    use App\Models\Product;

    class ProductController{

        function __construct()
        {
            print "<br>Constructor clase ProductController";
        }//fin_constructor

        function index(){
            $users = Product::all();
            require "../views/home.php";
            // metodo home de Controller de mvc00
        }

        function show(){
            $id = $_GET["id"];
            $product = Product::find($id);
            require "../views/show.php";
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