<?php 
    require 'includes/app.php';
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

<section class="caja">
        <div class="contenido">
            <div class="descont">
                <p class="textt">Bucas un lugar agradable y con buen ambiente?</p> 
                <p class="textod">
                    asa reina es tu mejor opcion para pasar un rato agradable con amigos, familia, una bebida refrescante y sobre todo con la mejor atención. <br>
                </p>
            </div>
            <div class="imcont">
                <img src="imagenes/41d8e52dd1ef428f86166abb43873d07.jpg" alt="">
            </div>
        </div>
    </section>
    <style>
        .caja {
            margin-top: 20vh;
            margin-bottom: 20vh;
            background-color: rgb(80, 49, 28);
            height: 68vh;

        }

        .contenido {
            background-color: rgb(91, 87, 87);
            color: whitesmoke;
            height: 58vh;
            width: 90%;
            margin-left: 5%;
            margin-top: 4.6vh;
            display: inline-block;
            box-shadow: 3px 6px 30px rgba(0, 0, 0, 1);

        }

        .descont {
            width: 50%;
            height: 58vh;


        }

        .imcont {
            width: 50%;
            height: 58vh;
        }

        .descont,
        .imcont {
            width: 50%;
            box-sizing: border-box;
            float: left;
        }

        .imcont img {
            width: 65%;
            height: 45vh;
            margin-left: 18%;
            margin-top: 7%;
            background-size: cover;
            background-position: center;
            box-shadow: 3px 6px 30px rgba(0, 0, 0, 1);
        }

        .contenido .descont {
            word-wrap: break-word;
        }
        .textt{
            margin-top: 10%;
            text-align: center;
            font-size: 4vh;
        }
        .textod {
            width: 65%;
            height: 45vh;
            margin-left: 18%;
            margin-top: 12%;
            font-size: 2.8vh;
        }
        .nuestros-cocineros{
            margin-left: 10vh;
        }
        body{
            background-color: rgb(91, 87, 87);
        }
        *{
            color: #fff;
        }

    </style>
    
<main>
 

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
            <img src="/imagenes/chef3.jpg" alt="">
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
