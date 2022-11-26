<?php
    session_start();

    if(isset($_GET['result'])){
        $result = $_GET['result'];
        
        if( $_GET['result'] == 'NOK' ){
            $strError = 'No ha funcionado correctamente';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Añadir Usuario</title>
    </head>
    <body>
        <h1>Añadir usuario</h1>
        <form action="?method=postUser" method="post">
            <label>Dime el nombre del usuario a añadir</label>
            <input type="text" name="username" required>
            <br>
            <label>Dime los apellidos</label>
            <input type="text" name="surname" required>
            <br>
            <label>Dime la direccion</label>
            <input type="text" name="direction" required>
            <br>
            <label>Dime el telefono</label>
            <input type="text" name="telefono" required>
            <br>
            <input type="file" name="fichero">
            <br>
            <input type="submit" value="enviar">
        </form>
        <br>
        <a href="?method=home">Volver al Inicio</a>
        <br>
        <span style="color: red; font-size: 2rem;"><?php echo $strError ?></span>
    </body>
</html>