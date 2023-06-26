<?php 
    require '../includes/app.php';
    incluirTemplate('header', $inicio = true);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./script.js" defer></script>
    <title>Casa Reina</title>
</head>
<body>
    
<main>
    <h2>Algunos Platillos</h2>

    <?php 
            $limite = 3;
            include '../includes/templates/platillosAnuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="menu.php" class="boton-verde">Ver Menu</a>
        </div>
   <h2>Algunas Bebidas</h2>

   <?php 
            $limite = 3;
            include '../includes/templates/bebidasAnuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="menu.php" class="boton-verde">Ver Menu</a>
        </div>

    <h2>Nuestros cocineros</h2>
    
    <nav class="nuestros-cocineros">
        <section>
            <img src="/imagenes/chef1.jpg" alt="">
            <p>cocinero 1</p>
        </section>
        <section>
            <img src="/imagenes/chef2.jpg" alt="">
            <p>cocinero 2</p>
        </section>
        <section>
            <img src="/imagenes/chef3.jpeg" alt="">
            <p>cocinero 3</p>
        </section>
        <section>
            <img src="/imagenes/chef4.jpg" alt="">
            <p>cocinero 4</p>
        </section>
    </nav>
</main>
</body>
</html>
<?php 
    incluirTemplate('footer');
?>
