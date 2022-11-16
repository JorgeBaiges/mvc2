<?php

    namespace Dwes\Galaxias;

    const RADIO = 1.25; //MILLONES DE AÑOS LUZ

    function observar($mensaje){
        print "<br>Estoy mirando a la galaxia" . $mensaje;
    }

    class Galaxia{

        function __construct()
        {
            $this->nacimiento();    
        }

        function nacimiento(){
            print "<br>Soy una nueva galaxia.";
        }

        public static function muerte(){
            print "<br>Me destruyo";
        }

        function __toString()
        {
            return "<br>GALAXIA ESTANDAR";
        }
    } //fin class Galaxia