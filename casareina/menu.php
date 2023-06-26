<?php 
    require 'includes/app.php';
   // require 'includes/config/database.php';
    $db = conectarDB();
    
    $errores = []; 
    
    $nombre = '';
    $apellido = '';
    $direccion = '';
    $total = '';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //echo "<pre>";
        //var_dump($_POST);
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
    incluirTemplate('header');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
</head>

<body>
<h1 class="titme">Menú</h1>
    <section class="conmen">
        <a href="#menuplatillos">
            <section class="menuc">
                <section class="tx-mn">
                    <h1 class="ijs">Platillos</h1>
                </section>
                <section class="im-mn"><img src="imagenes/menucomida.jpg" alt=""></section>
            </section>
        </a>
        <a href="#menubebidas">
            <section class="menub">
                <section class="tx-mn">
                    <h1 class="ijs">Bebidas</h1>
                </section>
                <section class="im-mn"><img src="imagenes/menubebidas.jpeg" alt=""></section>
            </section>
        </a>
    </section>
    <section class="line"></section>
    <a name="menuplatillos"></a>
    <h1 class="subtit">Platillos</h1>
    <?php 
            include 'includes/templates/platillosAnuncios.php';
        ?>
       
       
</div>

    <section class="line"></section>
    <a name="menubebidas"></a>
    <h1 class="subtit">Bebidas</h1>

            <?php 
            include 'includes/templates/bebidasAnuncios.php';
        ?>
            
        </section>
 

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
    <section class="line"></section>
    <section class="formpedirr">
        <section class="formm">
            <form method="POST" class="formulario">
                <section class="form-group">
                    <h1 class="titcuenta">Haz tu pedido</h1>
                    <label for="nombre" class="txt">Nombre</label>
                    <input type="text" name="nombre" placeholder="Tu Nombre" id="nombre" class="texto">
                </section>

                <section class="form-group">
                    <label for="apellido" class="txt">Apellido</label>
                    <input type="text" name="apellido" placeholder="Tu Apellido" id="apellido" class="texto">
                </section>

                <section class="form-group">
                    <label for="direccion" class="txt">Dirección</label>
                    <input type="text" name="direccion" placeholder="Tu Dirección" id="direccion" class="texto">
                </section>
                <input type="submit" value="Pedir" class="btnregis">
            </form>

            <style>
                .txt {
                    color: #831313;
                    font-size: 2.9vh;
                }
            </style>
        </section>
        <section class="cuenta">
            <section class="dtcuenta">
                <p class="susstit">Resumen</p> <br>
                <p class="infc">Total: <label id="total"></label></p> <br>
                <button class="btnregis" id="calcular">Calcular</button>
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

                        // Mostrar el total en la etiqueta "total"
                        totalLabel.textContent = ' $' + total.toFixed(2); // Asegurarse de mostrar el total con dos decimales
                    });


                </script>
            </section>
        </section>
    </section>
</body>
</html>
<?php 
    incluirTemplate('footer');
    
?>