<?php

    print time();
    print "<br>La hora en un mes es: " . strtotime("+1 month");
    print "<br>La fecha actual: " . date("d : F : y");

    $fecha = new DateTime("now");
    print "<br>";
    var_dump($fecha);
    print "<br>";

    $fecha = new DateTime("+11 weeks");
    print "<br>Intento de fecha: " . $fecha->format("d @ M @ Y");

    $mifecha = DateTime::createFromFormat("d/m/Y", "09/07/2018");
    print "<br>Fecha custom";
    var_dump($mifecha);
    
    print "<br><br>fecha custom2: " . $mifecha->format("d/n/Y, H:i:sa");