<?php

if (!isset($_SESSION)) { //REVISA
    session_start(); //CON ESTE IF SI LA SESION NO ESTA INICIADA SE INICIA (PARA QUE NO SEA DOBLE)
}
$auth = $_SESSION["login"] ?? false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Reyna</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? "inicio" : ""; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/lo.gif" alt="Logotipo de bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Boton dark mode" class="dark-mode-boton">
                    <nav class="navegacion">
                    <a href="/menu.php">Menu</a>                   
                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesion</a>
                            <?php else : ?>
                            <a href="/login/paginas/iniciar-sesion.php">Iniciar Sesion</a>
                        <?php endif; ?>
                        
                    </nav>
                </div>

                

            </div> <!--.barra-->

            <?php echo $inicio ? "<h1>Casa Reyna</h1>" : ""; ?>

        </div>
    </header>