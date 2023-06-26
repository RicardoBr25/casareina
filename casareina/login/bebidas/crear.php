<?php

require "../../includes/app.php";


use App\Bebidas;
use App\Platillos;
use Intervention\Image\ImageManagerStatic as Image;
estaAutenticado();


$bebida = new Bebidas();

//CONSULTA PARA OBTENER TOPDOS LOS VENDEDORES
$platillos = Platillos::all();

//ARREGLO CON MSJ DE ERRORES
$errores = Bebidas ::getErrores();


//EJECUTA EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    //CREA NUEVA INSTANCIA
    $bebida = new Bebidas($_POST['bebida']);

 
    //++SUBIDA DE ARCHIVOS//
    //GENERAR UN NOMBRE UNICO
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //SETEAR LA IMAGEN
    //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
    if ($_FILES['bebida']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['bebida']['tmp_name']['imagen'])->fit(800, 600);
        $bebida->setImagen($nombreImagen);
    }

    //VALIDAR
    $errores = $bebida->validar();
    

    if (empty($errores)) {    // SI NO HAY ERRORES LO VA A GUARDAR EN LA BD



        //CREAR UNA CARPETA
        $carpetaImagenes = "../../imagenes/";
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //GUARDA LA IMAGEN EN EL SERVIDOR
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //GUARDA EN LA BASE DE DATOS
        $bebida->guardar();

    }
}

incluirTemplate("headerAdmin");
?>


<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="../../login/bebidas/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_bebidas.php'; ?>
        <input type="submit" value="Dar de alta" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>