<?php
require 'includes/app.php';
    incluirTemplate('header');

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


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <main class="contenedor seccion contenido-centrado">
            <div class="tit">
                <h1>Crear una cuenta</h1>
            </div>
            <form method="POST" class="formulario">
                <div class="form-group">
                    <label for="email" class="txt">E-mail</label>
                    <input type="email" name="email" placeholder="Ingresa tu Email" id="email" class="texto">
                </div>
    
                <div class="form-group">
                    <label for="password" class="txt">Contraseña</label>
                    <input type="password" name="password" placeholder="Ingresa una contraseña" id="Password" class="texto">
                </div>
                <div class="form-group">
                    <label for="password" class="txt">Confirma la contraseña</label>
                    <input type="password" name="password" placeholder="Confirma tu contraseña" id="Password" class="texto">
                </div>
    
                <input type="submit" value="Registrase" class="btnregis">
            </form>
        </main>
    </div>
    <style type="text/css">
      body{
    background-image: url(imagenes/cuenta.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
    </style>
</body>
</html>

<?php 
    incluirTemplate('footer');
?>