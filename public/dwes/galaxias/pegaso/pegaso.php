<?php

    namespace Dwes\Galaxias\Pegaso;

    const RADIO = 0.75; //MILLONES DE AÑOS LUZ

    function observar($mensaje){
        print "<br>Estoy DIRIGIENDOME a la galaxia" . $mensaje;
    }

    class Galaxia{

        function __construct()
        {
            $this->nacimiento();    
        }

        function nacimiento(){
            print "<br>Soy una GALAXIA NUEVA.";
        }

        public static function muerte(){
            print "<br>Me ESTOY DESTRUYENDO";
        }

        function __toString()
        {
            return "<br>GALAXIA SEIYA";
        }
    } //fin class Galaxia