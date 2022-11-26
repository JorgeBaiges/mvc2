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
        <title>Añadir Empresa</title>
    </head>
    <body>
        <h1>Añadir Empresa</h1>
        <form action="?method=postEmpresa" method="post" enctype="multipart/form-data">
            <label>Dime el nombre de la empresa</label>
            <input type="text" name="empname">
            <br>
            <label>Dime la direccion</label>
            <input type="text" name="direction">
            <br>
            <label>Dime el telefono</label>
            <input type="text" name="telefono">
            <br>
            <label>Dime el email</label>
            <input type="text" name="email">
            <br>
            <input type="file" accept=".jpg,.jpeg,.png" size='5000000' name="fichero">
            <br>
            <input type="submit" value="enviar">
        </form>
        <br>
        <a href="?method=home">Volver al Inicio</a>

        <span style="color: red; font-size: 2rem;"><?php echo $strError ?></span>

    </body>
</html>