<?php

//mysql:dbname=<nombre_bbdd>;host<=<ip | nombre>;
$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$clave = "secret";
try {
    $bd = new PDO($dsn,$usuario,$clave);
    $sql = "select nombreusu,password from credenciales";
    $registros = $bd->query($sql);
    print "<br>Numero de registros devueltos: " . $registros->rowCount();
    if($registros->rowCount() > 0 ){
        foreach($registros as $fila){
            print "<br>Nombre de usuario: " . $fila["nombreusu"];
            print "<br>Password: " . $fila["password"];
        }
    }else{
        print "<br>No se ha devuelto ninguna fila";
    }
} catch (PDOException $e) {
    print "Mensaje de la excepcion: " . $e->getMessage();
}

