<?php
require 'includes/app.php';

use App\Platillos;

$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /index.php');
}

$platillos = Platillos::find($id);
incluirTemplate('header');
 ?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $platillos->titulo; ?></h1>

        
            <img loading="lazy" src="/imagenes/<?php echo $platillos->imagen; ?>" alt="imagen de los platillos">
        

        <div class="resumen-platillos">
            <p class="precio">$<?php echo $platillos->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                  
            </ul>

            <p><?php echo $platillos->descripcion; ?></p>
        </div>
    </main>

<?php

  incluirTemplate('footer');
 ?>
