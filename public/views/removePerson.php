<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar usuario</title>
</head>
<body>
    <h1>Eliminar usuario</h1>
    <form action="?method=removeUser" method="post">
        <label>Dime el nombre del usuario a eliminar</label>
        <input type="text" name="username">
        <br>
        <input type="submit" value="enviar">
    </form>
    <br>
    <a href="?method=home">Volver al Inicio</a>
</body>
</html>