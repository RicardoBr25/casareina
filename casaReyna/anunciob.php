<?php
require 'includes/app.php';
  incluirTemplate('header');
 ?>


    <main class="contenedor seccion">

        <h2>Bebidas</h2>
        <?php
        $limite = 10;
        include 'includes/templates/banuncios.php';
        ?>


    </main>

    <?php
  incluirTemplate('footer');
 ?>