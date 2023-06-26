<?php
use App\Bebidas;
if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $bebidas = Bebidas::all();
}else{
    $bebidas = Bebidas::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach ($bebidas as $bebida){ ?>
    <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $bebida->imagen; ?>" alt="anuncio">
      
        <div class="contenido-anuncio">

            <h3><?php echo $bebida->titulo; ?></h3>
            <p><?php echo $bebida->descripcion; ?></p>
            <p class="precio">$<?php echo $bebida->precio; ?></p>
           
              
            <a href="anuncio.php?id=<?php echo $bebida->id; ?>" class="boton boton-amarillo-block">
                Ver bebida
            </a>
        </div> <!--.contenido-anuncio-->
    </div><!--.anuncio-->
    <?php } ?>
</div><!--.contenedor-anuncios-->
