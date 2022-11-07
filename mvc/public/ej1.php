<?php

//mysql:dbname=<nombre_bbdd>;host<=<ip | nombre>;


function insertar(){
    require "../conexion.php";
    try {
        $bd = new PDO($dsn,$usuario,$clave);
        $sql = "INSERT INTO 'credenciales'('nombreusu', 'password') VALUES ('usuario2','$2y$10\$shIEunwVb9tqirTGx60AWuOPPuIa3c.4phCFfrrdth8jAseAknO9u')";
        $insertar = $bd->query($sql);
        print "<br>Nuevo usuario insertado: " . $insertar;
    } catch (PDOException $e) {
        print "Mensaje de la excepcion: " . $e->getMessage();
    }
}

function actualizar(){
    require "../conexion.php";
    $bd = new PDO($dsn,$usuario,$clave);
    $sql = "UPDATE `credenciales` SET `nombreusu`='[value-1]',`password`='[value-2]'";

}

function borrar(){


}