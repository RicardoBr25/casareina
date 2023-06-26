<?php

use App\Bebidas;
use App\Platillos;
use Intervention\Image\ImageManagerStatic as Image;


require "../../includes/app.php";
estaAutenticado();

//VALIDAR QUE SEA UN ID VALIDO 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
   
    header("Location: /admin");
}



//OBTENER LOS DATOS DE LA PROPIEDAD
$bebida = Bebidas::find($id);
$platillos = Platillos ::all(); 





//CONSULTAR PARA OBTENER LOS VENDEDORES
$consulta = "SELECT * FROM platillos";
$resultado = mysqli_query($db, $consulta);


//ARREGLO CON MSJ DE ERRORES
$errores = Bebidas::getErrores();



//EJECUTA EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === "POST") {


 //ASIGNAR LOS ATRIBUTOS
 $args = [];
 $args = $_POST['bebida'];

 $bebida->sincronizar($args);

//VALIDACION
 $errores = $bebida -> validar();

//GENERA NOMBRE UNICO DE LA IMAGEN
 $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    //SUBIDA DE ARCHIVOS
    if ($_FILES['bebida']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['bebida']['tmp_name']['imagen'])->fit(800, 600);
        $bebida->setImagen($nombreImagen);
    }


    if (empty($errores)) {
        if ($_FILES['bebida']['tmp_name']['imagen']){
        //ALMACENAR LA IMAGEN
        $image->save(CARPETA_IMAGENES . $nombreImagen);
    }
    $bebida->guardar();
    }
}


incluirTemplate("headerAdmin");
?>


<main class="contenedor seccion">
    <h1>Actualizar Bebida</h1>

    <a href="/admin.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_bebidas.php'; ?>
        <input type="submit" value="Actualizar bebida" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>