<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Inventario de productos</h1>
    <table>
        <?php
            foreach($products as $item):  ?>
        <tr>
            <td>Identificador: <?=$item[0]?></td>
            <td>Descripcion: <?= $item[1]?></td>
            <td><a href="product/show?method=show&&id=<?= $item[0] ?>">Ver detalles</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>