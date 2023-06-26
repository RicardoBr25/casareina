<?php
    
    $resultado = $_GET['resultado'] ?? null;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="todo">
    <div class="arriba">
         <a href="/bebidas.php">bebidas</a>
         <a href="/comidas.php">Comidas</a>
    </div>
    <br>

     <?php if( intval( $resultado ) === 1): ?>
        <p>Comida creado correctamente</p>
     <?php endif; ?>
     <?php if( intval( $resultado ) === 2): ?>
        <p>Bebida creada correctamente</p>
     <?php endif; ?>
</div>
</body>
</html>