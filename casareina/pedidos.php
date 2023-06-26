<?php
require "includes/app.php";

use App\Bebidas;
use App\Platillos;
use App\Vendedor;
use App\Pedidos;

$platillos = Platillos::all();
$bebidas = Bebidas::all();
$vendedores = Vendedor::all();
$pedidos = Pedidos::all();
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
            }else if($tipo === 'pedidos'){
                $pedido = Pedidos::find($id);
                $pedido->eliminar();
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


    
    <h2>Pedidos</h2>
    <table border="1" class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>direccion</th>
               
            </tr>
        </thead>

        <tbody> <!--MOSTRAR LOS RESULTADOS -->
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td> <?php echo $pedido->id; ?> </td>
                    <td> <?php echo $pedido->nombre; ?> </td>
                    <td> <?php echo $pedido->apellido; ?> </td>
                    <td> <?php echo $pedido->direccion ?> </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  
</body>
</html>

<?php
incluirTemplate("footer");
?>
