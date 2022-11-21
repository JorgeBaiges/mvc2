<?php
    $dsn = "mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $password = "secret";
    /**
     * 1- preparar la consulta -> prepare
     * 2- vincular los datos -> bindParam / bindValue
     * 3- ejecutar la sentencia -> execute(); (query , exec)
     */
    try{
        $db = new PDO($dsn,$usuario,$password);
        //establece el nivel de error que muestra en la conexion
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sentencia = $db->prepare("INSERT INTO credenciales 
        //(nombreusu, password) VALUES (:nombre,:clave)");
        $sentencia = $db->prepare("INSERT INTO credenciales 
        (nombreusu, password) VALUES (? , ?)");

        $nombre = "Alicia";
        $clave1 = "Sombrero";
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $clave1);
        //$sentencia->bindValue(":nombre", $nombre);
        //$sentencia->bindValue(":clave", $clave1);

        //$nombre = "Pedro";
        //$clave1 = "789";
        $sentencia->execute();
        print "<h2>Exito</h2>";
        
        
    }catch(PDOException $e){
        print "Error producido al conectar: " . $e->getMessage();
    }