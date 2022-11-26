<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar usuario</title>
    </head>
    <body>
        <form action="?method=updateUser" method="post">
            <h1>Actualizar</h1>
            <label>Nombre Antiguo</label>
            <input type="text" name="nombre">
            <br>
            <label>Nuevo Nombre</label>
            <input type="text" name="nombreNuevo">
            <br>
            <label>Apellidos</label>
            <input type="text" name="apellidoNuevo">
            <br>
            <label>Nueva direccion</label>
            <input type="text" name="direccionNueva">
            <br>
            <label>Nuevo Telefono</label>
            <input type="text" name="telefonoNuevo">
            <br>
            <input type="submit" value="Actualizar">
        </form>
        <br>
        <a href="?method=home">Volver al Inicio</a>
    </body>
</html>