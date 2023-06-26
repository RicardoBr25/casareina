<?php
require 'includes/app.php';

use App\Bebidas;

$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /index.php');
}

$bebidas = Bebidas::find($id);
incluirTemplate('header');
 ?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $bebidas->titulo; ?></h1>

        
            <img loading="lazy" src="/imagenes/<?php echo $bebidas->imagen; ?>" alt="imagen de los bebidas">
        

        <div class="resumen-bebidas">
            <p class="precio">$<?php echo $bebidas->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                  
            </ul>

            <p><?php echo $bebidas->descripcion; ?></p>
        </div>
    </main>

<?php

  incluirTemplate('footer');
 ?>
