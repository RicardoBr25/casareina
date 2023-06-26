<?php
use App\Bebidas;
if($_SERVER['SCRIPT_NAME'] === '/anunciosb.php'){
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
           
              
            <a href="anun.php?id=<?php echo $bebida->id; ?>" class="boton boton-amarillo-block">
                Ver bebida
            </a>
        </div> <!--.contenido-anuncio-->
    </div><!--.anuncio-->
    <style>
        .menuc div,
.menub div{
    transition: .4s ease;
}

.menuc div:hover,
.menub div:hover{
    transition: .4s ease;
    backdrop-filter: blur(5px);
    font-size: 6vh;
}
.menuc div:hover .ijs{
    transition: .2s ease;
    margin-top: 28vh;
}

.menub div:hover .ijs{
    transition: .2s ease;
    margin-top: 28vh;
}
.im-mn img{
    width: 65vh;
    height: 65vh;
}

.tx-mn{
    font-size: 4vh;
    position: absolute;
    color: blanchedalmond;
    text-align: center;
}

.ijs {
    margin-top: 30vh;
}

.tx-bebida {
    position: absolute;
    color: whitesmoke;
    text-align: center;
}

.line{
    margin-top: 15vh;
    height: .5vh;
    background-color: #831313;
    border-radius: 3vh;
}

.subtit{
    font-size: 8vh;
    margin-left: 15vh;
    font-family: 'Times New Roman', Times, serif;
}

.platillos{
    margin-left: 20vh;
}

.ali {
    position: relative;
    border-style: solid;
    border-color: #c31a1a;
    display: inline-block;
    background-color: whitesmoke;
    transition: 0.5s ease;
    height: 50vh;
    width: 30vh;
    margin-left: 3vh;
    margin-top: 4vh;
}


.ali:hover {
    transform: scale(1.1);
    transition: 0.5s ease;
    height: 55vh;
    width: 34vh;
    margin-top: 4vh;
    margin-left: 3vh;
}



.titpla {
    font-size: 4vh;
    margin-left: 1%;
    margin-top: 1%;
    text-align: center;
}


.impla img{
    transition: .5s ease;
    margin-top: 10%;
    margin-left: 9%;
    width: 25vh;
    height: 19vh;
}

.ali:hover .impla img{
    margin-left: 10%;
    transition: .5s ease;
    width: 27vh;
    height: 21vh;
    
}


.infpla {
    position: relative;
    margin-top: 1.5vh;
    margin-left: 6%;
    margin-right: 1%;
    font-size: 2.2vh;
    height: 44vh;
    width: 27vh;
}

.platillos .ali {
    word-wrap: break-word;
  }

.bebidas{
    margin-left: 20vh;
}
  .bebidas .beb {
    word-wrap: break-word;
  }

  .beb {
    position: relative;
    border-style: solid;
    border-color: #c31a1a;
    display: inline-block;
    background-color: whitesmoke;
    transition: 0.5s ease;
    height: 50vh;
    width: 30vh;
    margin-left: 3vh;
    margin-top: 4vh;
}


.beb:hover {
    transform: scale(1.1);
    transition: 0.5s ease;
    height: 55vh;
    width: 34vh;
    margin-top: 4vh;
    margin-left: 3vh;
}



.titbeb {
    font-size: 4vh;
    margin-left: 1%;
    margin-top: 1%;
    text-align: center;
}


.imbeb img{
    transition: .5s ease;
    margin-top: 10%;
    margin-left: 9%;
    width: 25vh;
    height: 19vh;
}

.beb:hover .imbeb img{
    margin-left: 10%;
    transition: .5s ease;
    width: 27vh;
    height: 21vh;
    
}


.infbeb {
    position: relative;
    margin-top: 1.5vh;
    margin-left: 6%;
    margin-right: 1%;
    font-size: 2.2vh;
    height: 44vh;
    width: 27vh;
}
    </style>
    <?php } ?>
</div><!--.contenedor-anuncios-->
