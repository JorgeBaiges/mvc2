<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Detalle del Product <?php echo $product->id ?></h1>
<ul>
    <li><strong>ID: </strong><?php echo $product->id ?></li>
    <li><strong>NOMBRE: </strong><?php echo $product->name ?></li>
    <li><strong>PRECIO: </strong><?php echo $product->price ?></li>
    <li><strong>FECHA COMPRA: </strong><?php echo $product->fecha_compra ?></li>
</ul>
</body>
</html>