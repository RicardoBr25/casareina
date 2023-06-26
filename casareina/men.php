
<?php 
require 'includes/config/database.php';
$db = conectarDB();

$errores = []; 

$nombre = '';
$apellido = '';
$direccion = '';
$total = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //echo "<pre>";
    //vahr_dump($_POST);
    //echo "</pre>";
    
    //Arreglo con los errores
    

    //Ejecutar el codigo despues que el usuario lo envia al formulario
    $nombre = mysqli_real_escape_string($db, $_POST['nombre'] );
    $apellido = mysqli_real_escape_string($db, $_POST['apellido'] );
    $direccion = mysqli_real_escape_string($db, $_POST['direccion']);
    //$total = mysqli_real_escape_string($db, $_POST['total']);


    if (!$nombre){
        $errores[] = "Debes agregar un nombre";
    }

    if (!$apellido){
        $errores[] = "Debes agregar un apellido";
    }

    if (!$direccion){
        $errores[] = "Debes agregar una direccion";
    }
  
    if (empty($errores)){



        $query = " INSERT INTO pedidos (nombre, apellido, direccion) VALUES 
        ('$nombre', '$apellido', '$direccion')";
    
    //echo $query;

    $resultado = mysqli_query($db, $query);
    
    if ($resultado){
        //echo "Insertado Correctamente";
        header('location: /menu.php');
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Menú</title>
</head>

<body>
    <div class="conmen">
        <a href="#menuplatillos">
            <div class="menuc">
                <div class="tx-mn">
                    <h1 class="ijs">Platillos</h1>
                </div>
                <div class="im-mn"><img src="imagenes/menucomida.jpg" alt=""></div>
            </div>
        </a>
        <a href="#menubebidas">
            <div class="menub">
                <div class="tx-mn">
                    <h1 class="ijs">Bebidas</h1>
                </div>
                <div class="im-mn"><img src="imagenes/menubebidas.jpeg" alt=""></div>
            </div>
        </a>
    </div>
    <div class="line"></div>
    <a name="menuplatillos"></a>
    <h1 class="subtit">Platillos</h1>
    <div class="platillos">
        <div class="ali">
            <div class="titpla">Baguette</div>
            <div class="impla"><img src="imagenes/menucomida.jpg" alt=""></div>
            <div class="infpla">
                <p>Descripción: es una baguette con milanesa de pollo, arroz, frijol y mayonesa</p>
                <p>Precio: $<label for="" id="precio">100</label></p>
                <div class="cantidadpedir">
                    <button class="btnmenos">-</button>
                    <div class="contador"><label class="txt-contador" id="contaa">0</label></div>
                    <button class="btnmas">+</button>
                </div>
            </div>
        </div>
        <div class="ali">
            <div class="titpla">Baguette</div>
            <div class="impla"><img src="imagenes/menucomida.jpg" alt=""></div>
            <div class="infpla">
                <p>Descripción: es una baguette con milanesa de pollo, arroz, frijol y mayonesa</p>
                <p>Precio: $<label for="" id="precio">80</label></p>
                <div class="cantidadpedir">
                    <button class="btnmenos">-</button>
                    <div class="contador"><label class="txt-contador" id="contaa">0</label></div>
                    <button class="btnmas">+</button>
                </div>
            </div>
        </div>
        <!-- Resto de los elementos de platillos -->
    </div>

    <div class="line"></div>
    <h1 class="subtit">Bebidas</h1>
    <div class="bebidas">
        <div class="beb">
            <a name="menubebidas"></a>
            <div class="titbeb">Chamoyada</div>
            <div class="imbeb"><img src="imagenes/menubebidas.jpeg" alt=""></div>
            <div class="infbeb">
                <p>Descripción: Una Chamoyada con chamoy líquido y en polvo, con dulces picantes encima</p>
                <p>Precio: $<label for="" id="precio">20</label></p>
                <div class="cantidadpedir">
                    <button class="btnmenos">-</button>
                    <div class="contador"><label class="txt-contador" id="contaa">0</label></div>
                    <button class="btnmas">+</button>
                </div>
            </div>
        </div>
        <div class="beb">
            <a name="menubebidas"></a>
            <div class="titbeb">Frappe</div>
            <div class="imbeb"><img src="imagenes/menubebidas.jpeg" alt=""></div>
            <div class="infbeb">
                <p>Descripción: <label class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, a voluptates.</label></p>
                <p>Precio: $<label for="" id="precio">10</label></p>
                <div class="cantidadpedir">
                    <button class="btnmenos">-</button>
                    <div class="contador"><label class="txt-contador" id="contaa">0</label></div>
                    <button class="btnmas">+</button>
                </div>
            </div>
        </div>
        
        </div>

        <script>
            // Obtener todos los botones de menos y más
            const btnMenosList = document.querySelectorAll('.btnmenos');
            const btnMasList = document.querySelectorAll('.btnmas');
            const contadorLabelList = document.querySelectorAll('.txt-contador');

            // Función para aumentar el contador
            function aumentarContador(index) {
                let contador = parseInt(contadorLabelList[index].textContent);
                contador++;
                contadorLabelList[index].textContent = contador;
            }

            // Función para disminuir el contador sin que pase de cero
            function disminuirContador(index) {
                let contador = parseInt(contadorLabelList[index].textContent);
                if (contador > 0) {
                    contador--;
                    contadorLabelList[index].textContent = contador;
                }
            }

            // Asignar eventos a cada botón de menos y más
            for (let i = 0; i < btnMenosList.length; i++) {
                btnMasList[i].addEventListener('click', function () {
                    aumentarContador(i);
                });

                btnMenosList[i].addEventListener('click', function () {
                    disminuirContador(i);
                });
            }
        </script>

    </div>
    <div class="line"></div>
    <div class="formpedir">
        <div class="formm">
        
        <?php foreach($errores as $error): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
    <?php endforeach; ?>

            <form method="POST" class="formulario" action="/menu.php">
                <div class="form-group">
                    <h1 class="titcuenta">Haz tu pedido</h1>
                    <label for="nombre" class="txt">Nombre</label>
                    <input type="text" name="nombre" placeholder="Tu Nombre" id="nombre" class="texto" value="<?php echo $nombre ?>">
                </div>

                <div class="form-group">
                    <label for="apellido" class="txt">Apellido</label>
                    <input type="text" name="apellido" placeholder="Tu Apellido" id="apellido" class="texto" value="<?php echo $apellido ?>">
                </div>

                <div class="form-group">
                    <label for="direccion" class="txt">Dirección</label>
                    <input type="text" name="direccion" placeholder="Tu Dirección" id="direccion" class="texto" value="<?php echo $direccion ?>">
                </div>
                <input type="submit" value="Pedir" id="pedir" class="btnregis">
           

                 <style>
                     .txt {
                        color: #831313;
                       font-size: 2.9vh;
                     }
                    </style>
                </div>
             <div class="cuenta">
               <div class="dtcuenta">
                <p class="susstit">Resumen</p> <br>
                <p class="infc">Total: <label id="total" ></label></p><br>
                <input type="button" class="btnregis" id="calcular" value="Calcular">
                <script>
                    // Obtener el botón "calcular" y la etiqueta "total"
                    // Obtener el botón "calcular" y la etiqueta "total"
                    const btnCalcular = document.getElementById('calcular');
                    const totalLabel = document.getElementById('total');

                    // Agregar evento click al botón "calcular"
                    btnCalcular.addEventListener('click', function () {
                        // Obtener los elementos necesarios para el cálculo de platillos
                        const platilloPrecioList = document.querySelectorAll('.platillos .infpla #precio'); // Obtener todos los elementos con id "precio" en la sección de platillos
                        const platilloContadorList = document.querySelectorAll('.platillos .infpla #contaa'); // Obtener todos los elementos con id "contaa" en la sección de platillos

                        // Obtener los elementos necesarios para el cálculo de bebidas
                        const bebidaPrecioList = document.querySelectorAll('.bebidas .infbeb #precio'); // Obtener todos los elementos con id "precio" en la sección de bebidas
                        const bebidaContadorList = document.querySelectorAll('.bebidas .infbeb #contaa'); // Obtener todos los elementos con id "contaa" en la sección de bebidas

                        let total = 0;

                        // Calcular el total de platillos sumando el resultado de cada platillo
                        for (let i = 0; i < platilloPrecioList.length; i++) {
                            const precio = parseFloat(platilloPrecioList[i].textContent);
                            const cantidad = parseInt(platilloContadorList[i].textContent);
                            const subtotal = precio * cantidad;
                            total += subtotal;
                        }

                        // Calcular el total de bebidas sumando el resultado de cada bebida
                        for (let i = 0; i < bebidaPrecioList.length; i++) {
                            const precio = parseFloat(bebidaPrecioList[i].textContent);
                            const cantidad = parseInt(bebidaContadorList[i].textContent);
                            const subtotal = precio * cantidad;
                            total += subtotal;
                        }

                        var final=total;
                        //alert (final);
                        //

                        // Mostrar el total en la etiqueta "total"
                        totalLabel.textContent = ' $' + total.toFixed(2);
                        
                    });
                
                </script>
                </div>
               </div>
              </div>
            </form>


</body>

</html>