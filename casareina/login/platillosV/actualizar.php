<?php

use App\Platillos;
use App\Bebidas;
use Intervention\Image\ImageManagerStatic as Image;


require "../../includes/app.php";
estaAutenticado();

//VALIDAR QUE SEA UN ID VALIDO 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
   
    header("Location: /vendedor.php");
}

$platillo = Platillos::find($id);
$bebidas = Bebidas ::all(); 

$consulta = "SELECT * FROM bebidas";
$resultado = mysqli_query($db, $consulta);


$errores = Platillos::getErrores();


if ($_SERVER['REQUEST_METHOD'] === "POST") {


 //ASIGNAR LOS ATRIBUTOS
 $args = [];
 $args = $_POST['platillo'];

 $platillo->sincronizar($args);

//VALIDACION
 $errores = $platillo -> validar();

//GENERA NOMBRE UNICO DE LA IMAGEN
 $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    //SUBIDA DE ARCHIVOS
    if ($_FILES['platillo']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['platillo']['tmp_name']['imagen'])->fit(800, 600);
        $platillo->setImagen($nombreImagen);
    }


    if (empty($errores)) {
        if ($_FILES['platillo']['tmp_name']['imagen']){
        //ALMACENAR LA IMAGEN
        $image->save(CARPETA_IMAGENES . $nombreImagen);
    }
    $platillo->guardar();
    }
}


incluirTemplate("headerVendedor");
?>


<main class="contenedor seccion">
    <h1>Actualizar Platillo</h1>

    <a href="/vendedor.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_platillos.php'; ?>
        <input type="submit" value="Actualizar platillo" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>