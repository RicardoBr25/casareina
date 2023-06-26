<?php
require "includes/app.php";

use App\Bebidas;
use App\Platillos;
use App\Vendedor;

$platillos = Platillos::all();
$bebidas = Bebidas::all();
$vendedores = Vendedor::all();
estaAutenticado();

//MUESTRA MENSAJE CONDICIONAL
$resultado = $_GET['resultado'] ?? null; // "??" placeholder busca ese valor y si no existe asigna null

if ($_SERVER["REQUEST_METHOD"] === "POST") { //COMPROBACION 

//VALIDAR ID
    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $tipo = $_POST['tipo'];

        if (validarTipoContenido($tipo)) {
            //COMPARA LO QUE VAMOS A ELIMINAR
            if ($tipo === 'bebida') {
                //ELIMINAR EL ARCHIVO
                $bebida = Bebidas::find($id);
                $bebida->eliminar();
            } else if ($tipo === 'platillo') {
                //ELIMINAR EL ARCHIVO
                $platillo = Platillos::find($id);
                $platillo->eliminar();
            }else if($tipo === 'vendedor'){
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }
    }
}


incluirTemplate("headerAdmin");
?>

    


    <?php
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje) ?></p>
    <?php } ?>

    <section class="btnadmin">
    <a href="/login/platillosV/crear.php" class="boton boton-verde">Nuevo Platillo</a>
    <a href="/login/bebidasV/crear.php" class="boton boton-amarillo">Nueva Bebida</a>
    </section>
    
<section class="plaadmin">
    <h2>Platillos</h2>

    <table border="1" class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--MOSTRAR LOS RESULTADOS -->
            <?php foreach ($platillos as $platillo) : ?>
                <tr>
                    <td> <?php echo $platillo->id; ?> </td>
                    <td> <?php echo $platillo->titulo; ?> </td>
                    <td> <img src="../imagenes/<?php echo $platillo->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $platillo->precio ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $platillo->id; ?>">
                            <input type="hidden" name="tipo" value="platillo">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/login/platillosV/actualizar.php?id=<?php echo $platillo->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

    <section class="bebadmin">
    <h2>Bebidas</h2>
      <table border="1" class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--MOSTRAR LOS RESULTADOS -->
            <?php foreach ($bebidas as $bebida) : ?>
                <tr>
                    <td> <?php echo $bebida->id; ?> </td>
                    <td> <?php echo $bebida->titulo; ?> </td>
                    <td> <img src="../imagenes/<?php echo $bebida->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $bebida->precio ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $bebida->id; ?>">
                            <input type="hidden" name="tipo" value="bebida">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/login/bebidasV/actualizar.php?id=<?php echo $bebida->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
    
    
</main>
<style>
    body {
        background-color: rgb(91, 87, 87);
        color: #fff;
    }

    table.propiedades {
        background-color: gray;
        color: white;
    }

    table.propiedades th {
        background-color: brown;
        color: white;
    }

    table.propiedades td {
        background-color: gray;
        color: white;
    }
</style>


<style>
    body {
        background-color: rgb(91, 87, 87);
        color: #fff;
    }
</style>

</body>
</html>

<?php
incluirTemplate("footer");
?>
