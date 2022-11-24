<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de usuarios</h1>

    <table class="table table-striped table-hover">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>F. nacimiento</th>
        <th></th>
    </tr>

    <?php foreach ($products as $key => $id) { ?>
        <tr>
        <td><?php echo $products->name ?></td>
        <td><?php echo $products->price ?></td>
        <td><?php echo $products->fecha_compra ?></td>
        <td>
        <a href="/user/show/<?php echo $product->id ?>" class="btn btn-primary">Ver </a>
        </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>