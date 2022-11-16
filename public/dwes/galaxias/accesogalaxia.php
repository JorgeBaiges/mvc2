<?php

    namespace Dwes\Galaxias;

    print "<br> Namespace actual: " . __NAMESPACE__;
    /*
     * Direccionamiento namespace:
     * 1- Sin direccionamiento
     * 2- Direccionamiento relativo
     * 3- direccionamiento abosoluto
     */
    include "galaxia1.php";
    include "pegaso/pegaso.php";

    print "<h2>Sin direccionamiento</h2>";
    print "<br>Radio de la galaxia: " . RADIO;
    observar("Via lactea");
    $gl = new Galaxia();
    Galaxia::muerte();

    print "<h2>Direccionamiento relativo</h2>";
    print "<br>Radio de la galaxia: " . Pegaso\RADIO;
    Pegaso\observar("Via lactea");
    $gl = new Pegaso\Galaxia();
    Pegaso\Galaxia::muerte();

    print "<h2>Direccionamiento absoluto</h2>";
    print "<br>Radio de la galaxia: " . \Dwes\Galaxias\Pegaso\RADIO;
    \Dwes\Galaxias\Pegaso\observar("Via lactea");
    $gl = new \Dwes\Galaxias\Pegaso\Galaxia();
    \Dwes\Galaxias\Pegaso\Galaxia::muerte();

    use const \Dwes\Galaxias\Pegaso\RADIO;
    use function \Dwes\Galaxias\Pegaso\observar;
    /*
    print "<br><br>Radio de la galaxia: ". RADIO;
    print "<br>" . observar(" Galaxia Termita");
    print "<br>Objeto de galaxia generico: " . new Galaxia() . "<br>";
    */

    //Apodar namespace -> alias
    use \Dwes\Galaxias\Pegaso\Galaxia as Seiya;
    use \Dwes\Galaxias\Galaxia as Galaxus;
    $gp = new Seiya();
    print "<br>" . $gp;

    $gpl = new Galaxus();
    print "<br>". $gpl;


