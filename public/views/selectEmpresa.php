<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seleccionar Empresa</title>
    </head>
    <body>
        <form action="?method=findEmp" method="post">
            <h1>Seleccionar Empresa</h1>>
            <label>Mostrar una Empresa en especifico</label>
            <input type="text" name="nombre">
            <br>
            <input type="submit" value="Buscar empresa" name="enviar">
        </form>
        <form action="?method=findAllEmp" method="post">
            <br><br>
            <input type="submit" value="Buscar todos" name="enviar">
        </form>
        
        <br>
        <a href="?method=home">Volver al Inicio</a>
    </body>
</html>