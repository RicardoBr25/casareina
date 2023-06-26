<?php
require 'includes/app.php';

$mysqli = new mysqli("localhost", "root", "", "casareyna");



if ($mysqli->connect_error) {
  printf("falllo la conexion", $mysqli->connect_error);
  exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$consulta = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

if ($resultado = $mysqli->query($consulta)) {
} 
$resultado = $mysqli->query("SELECT * FROM usuarios", MYSQLI_USE_RESULT);

while($myrow= $resultado -> fetch_array(MYSQLI_ASSOC)){

}


incluirTemplate('header');
 ?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Crear Seción</h1>
       

        <form class="formulario" method="POST" action="/crearSecion.php">
            <fieldset>
               <legend>Email y Password</legend> 
              
               <label for="email">E-mail</label>
               <input type="email" name="email" placeholder="Tu Email" id="email" >

               <label for="password">Password</label>
               <input type="password" name="password" placeholder="Tu Password" id="Password" >
       
            </fieldset>

         <input type="submit" value="Crear Sesión" class="boton boton-verde">

        </form>

    </main>

    <?php
  incluirTemplate('footer');
 ?>