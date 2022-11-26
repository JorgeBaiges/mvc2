<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Empresa</title>
</head>
<body>
    <h1>Eliminar Empresa</h1>
    <form action="?method=removeEmp" method="post">
        <label>Dime el nombre de la empresa a eliminar</label>
        <input type="text" name="empname">
        <br>
        <input type="submit" value="enviar">
    </form>
    <br>
    <a href="?method=home">Volver al Inicio</a>
</body>
</html>