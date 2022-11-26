<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seleccionar usuario</title>
    </head>
    <body>
        <form action="?method=findUser" method="post">
            <h1>Seleccionar Usuarios</h1>>
            <label>Mostrar un usuario especifico</label>
            <input type="text" name="nombre">
            <br>
            <input type="submit" value="Buscar usuario" name="enviar">
        </form>
        <form action="?method=findAll" method="post">
            <br><br>
            <input type="submit" value="Buscar todos" name="enviar">
        </form>
        
        <br>
        <a href="?method=home">Volver al Inicio</a>
    </body>
</html>