<?php
require "../includes/app.php";
$auth = estaAutenticado();

//IMPORTAR CLASES
use App\Propiedad;
use App\Vendedor;

//IMPLEMENTAR UN METODO PARA OBTENER TODAS LAS PROPIEDADES
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

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
            if ($tipo === 'vendedor') {
                //ELIMINAR EL ARCHIVO
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            } else if ($tipo === 'propiedad') {
                //ELIMINAR EL ARCHIVO
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }
    }
}

//INCLUYE UN TEMPLATE
incluirTemplate("header");
?>
<main class="contenedor seccion">
    <h1>vendedor</h1>



<?php
incluirTemplate("footer");
?>