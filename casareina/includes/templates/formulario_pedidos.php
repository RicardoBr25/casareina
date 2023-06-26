
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
            <form method="POST" class="formulario">
                <div class="form-group">
                    <h1 class="titcuenta">Haz tu pedido</h1>
                    <label for="email" class="txt">Nombre</label>
                    <input type="email" name="email" placeholder="Tu Nombre" id="nombre" class="texto  value=<?php echo s($pedido->nombre); ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="txt">Apellido</label>
                    <input type="password" name="password" placeholder="Tu Apellido" id="apellido" class="texto  value=<?php echo s($pedido->apellido); ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="txt">Dirección</label>
                    <input type="password" name="password" placeholder="Tu Dirección" id="direccion" class="texto value=<?php echo s($pedido->direccion); ?>">
                </div>
                <input type="submit" value="Pedir" class="btnregis">
            </form>

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
            </div>
        </div>
    </div>
</main>