<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina principal</title>
    </head>
    <body>
        <h1>GESTION BASE DE DATOS</h1>
        <h3>Añadir usuario</h3>
        <a href="?method=addPerson" name="addUser">Entrar</a>
        <br>
        <h3>Eliminar usuario</h3>
        <a href="?method=removePerson" name="delUser" >Entrar</a>
        <br>
        <h3>Seleccionar usuario</h3>
        <a href="?method=selectPerson" name="selUser">Entrar</a>
        <br>
        <h3>Actualizar usuario</h3>
        <a href="?method=updatePerson" name="upUser">Entrar</a>
        <br>
        <h3>Añadir empresa</h3>
        <a href="?method=addEmpresa" name="addEmp">Entrar</a>
        <br>
        <h3>Borrar empresa</h3>
        <a href="?method=removeEmpresa" name="delEmp">Entrar</a>
        <br>
        <h3>Seleccionar empresa</h3>
        <a href="?method=selectEmpresa" name="selEmp">Entrar</a>
        <br>
        <h3>Actualizar empresa</h3>
        <a href="?method=updateEmpresa" name="upEmp">Entrar</a>
        <br>
    </body>
</html>