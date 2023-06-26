<?php

require "../../includes/app.php";


use App\Bebidas;
use App\Platillos;
use Intervention\Image\ImageManagerStatic as Image;


estaAutenticado();

$platillo = new Platillos;

//CONSULTA PARA OBTENER TOPDOS LOS VENDEDORES
$bebidas = Bebidas::all();

//ARREGLO CON MSJ DE ERRORES
$errores = Platillos::getErrores();


//EJECUTA EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    //CREA NUEVA INSTANCIA
    $platillo = new Platillos($_POST['platillo']);

 
    //++SUBIDA DE ARCHIVOS//
    //GENERAR UN NOMBRE UNICO
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //SETEAR LA IMAGEN
    //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
    if ($_FILES['platillo']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['platillo']['tmp_name']['imagen'])->fit(800, 600);
        $platillo->setImagen($nombreImagen);
    }

    //VALIDAR
    $errores = $platillo->validar();
    

    if (empty($errores)) {    // SI NO HAY ERRORES LO VA A GUARDAR EN LA BD



        //CREAR UNA CARPETA
        $carpetaImagenes = "../../imagenes/";
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //GUARDA LA IMAGEN EN EL SERVIDOR
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //GUARDA EN LA BASE DE DATOS
        $platillo->guardar();

    }
}

incluirTemplate("header");
?>


<main class="contenedor seccion">
    <h1>Dar De Alta un Platillo Nuevo</h1>

    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="../../admin/platillos/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_platillos.php'; ?>
        <input type="submit" value="Dar de alta" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>