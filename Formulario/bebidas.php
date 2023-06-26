<?php
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    $nombre = '';
    $precio = '';
    $descripcion = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";
        
        //Arreglo con los errores
        

        //Ejecutar el codigo despues que el usuario lo envia al formulario
        $nombre = mysqli_real_escape_string($db, $_POST['nombre'] );
        $precio = mysqli_real_escape_string($db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

        //Asignar files a una variable, esto es para subir imagen
        $imagen = $_FILES['imagen'];

        if (!$nombre){
            $errores[] = "Debes agregar un nombre";
        }

        if (!$precio){
            $errores[] = "Debes agregar un precio";
        }

        if (strlen($descripcion < 60 )){
            $errores[] = "Debes agregar una descripcion y debe tener al menos 60 caracteres";
        }

        if (!$imagen['name']){
            $errores[] = "La imagen es obligatoria";
        }

        // Validar por tamanio 
        $medida = 1000 * 1000;
        if (!$imagen['name'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }
        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";
        

        //Revisar que el array de errores este vacio
        if (empty($errores)){
            // SUBIDA DE ARCHIVOS 

            //Crear carpeta 
            $carpetaImagenes = 'imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
           
            //subir la imagen 
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );

            $query = " INSERT INTO bebidas (imagen, nombrepro, descripcionpro, precio) VALUES 
            ('$nombreImagen', '$nombre', '$precio', '$descripcion')";
        
        //echo $query;

        $resultado = mysqli_query($db, $query);
        if ($resultado){
            //echo "Insertado Correctamente";
            header('location: /index.php?resultado=2');
        }
        }

        //Insertar en la base de datos
        
            
    }
       
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
    <h1> Productos Menus</h1>
    <a href="/index.php">volver</a>
    <br>
    <br>

    <?php foreach($errores as $error): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
    <?php endforeach; ?>
            
<form class="formulario" method="POST" action="/bebidas.php" enctype="multipart/form-data">
<fieldset>
        <legend>Anote la bebida</legend>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre de la bebida" value="<?php echo $nombre ?>">
        <br>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="precio del producto" value="<?php echo $precio ?>">
        <br>
        <br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
        <br>
        <br>

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        <br>
        <br>

    </fieldset>

    <input type="submit" value="Crear bebida" class="boton">
</form>
 </body>
 </html>
