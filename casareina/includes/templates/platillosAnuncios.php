<?php
use App\Platillos;
if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $platillos = Platillos::all();
}else{
    $platillos = Platillos::all();
}

?>


    <?php foreach ($platillos as $bebida){ ?>
        
        <div class="platillos ">
        <section class="ali">
    <section class="titpla"><?php echo $bebida->titulo; ?></section>
    <section class="impla"><img src="/imagenes/<?php echo $bebida->imagen; ?>" ></section>
    <section class="infpla">
    <p>Descripción: <label class="des"><?php echo $bebida->descripcion; ?></label></p>
                <p>Precio: $<label for="" id="precio">26</label></p>
                <section class="cantidadpedir">
                    <button class="btnmenos">-</button>
                    <section class="contador"><label class="txt-contador" id="contaa">0</label></section>
                    <button class="btnmas">+</button>
                </section>
    </section>
        </section></div>

        
        
    <?php } ?>
</div><!--.contenedor-anuncios-->
