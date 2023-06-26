<?php 
    require '../includes/app.php';
    incluirTemplate('headerVendedor');
    
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
                <section class="im-mn"><img src="../imagenes/menucomida.jpg" alt=""></section>
            </section>
        </a>
        <a href="#menubebidas">
            <section class="menub">
                <section class="tx-mn">
                    <h1 class="ijs">Bebidas</h1>
                </section>
                <section class="im-mn"><img src="../imagenes/menubebidas.jpeg" alt=""></section>
            </section>
        </a>
    </section>
    <section class="line"></section>
    <a name="menuplatillos"></a>
    <h1 class="subtit">Platillos</h1>
    <div class="platillos">
    <?php 
            include '../includes/templates/platillosAnuncios.php';
        ?>
        
</div>

    <section class="line"></section>
    <h1 class="subtit">Bebidas</h1>
    <div class="bebidas">
        
    <?php 
            include '../includes/templates/bebidasAnuncios.php';
        ?>
         

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
    
            <style>
                .txt {
                    color: #831313;
                    font-size: 2.9vh;
                }
            </style>
        </section>
        
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