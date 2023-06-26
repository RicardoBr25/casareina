<?php
require "../includes/app.php";

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

<main class="contenedor seccion">
    <form action="/login/validaciones/validar-crearvendedor.php" method="post" class="w-100">

        <h1>Crear Vendedor</h1>

        <p>Nombre <input type="text" placeholder="ingrese su nombre" name="nombre" id="nombre"></p>
        <p>E-mail <input type="email" placeholder="ingrese su email" name="usuario" id="usuario"></p>
        <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña" id="contraseña"></p>
        <p>Contraseña <input type="password" placeholder="confirme su contraseña" name="contraseñan"></p>

        <input type="submit" value="Enviar" class="boton boton-verde">

    </form>        
    </main>

    <?php
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje) ?></p>
    <?php } ?>

    <main class="contenedor seccion">
    <h1>Administrador de cuentas</h1>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>usuario</th>
                <th>contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--MOSTRAR LOS RESULTADOS -->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre; ?> </td>
                    <td> <?php echo $vendedor->usuario; ?> </td>
                    <td> <?php echo $vendedor->contraseña; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
incluirTemplate("footer");
?>