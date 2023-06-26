<?php
use App\Platillos;
if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $platillos = Platillos::all();
}else{
    $platillos = Platillos::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach ($platillos as $platillo){ ?>
    <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $platillo->imagen; ?>" alt="anuncio">
      
        <div class="contenido-anuncio">

            <h3><?php echo $platillo->titulo; ?></h3>
            <p><?php echo $platillo->descripcion; ?></p>
            <p class="precio">$<?php echo $platillo->precio; ?></p>
           
              
            <a href="anuncio.php?id=<?php echo $platillo->id; ?>" class="boton boton-amarillo-block">
                Ver platillo
            </a>
        </div> <!--.contenido-anuncio-->
    </div><!--.anuncio-->
    <?php } ?>
</div><!--.contenedor-anuncios-->
