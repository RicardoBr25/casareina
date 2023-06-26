<?php

require 'includes/app.php';

    incluirTemplate('header');
$db = conectarDB();

//Auntenticar el ususario

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  

    $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) );
    
    $password = mysqli_real_escape_string($db, $_POST['password']);
   
    
    if(!$email){
        $errores[] = "El email es obligatorio o no es válido";
    }
    
    if(!$password){
        $errores[] = "El Password es obligatorio";;
    
    }

    if(empty($errores)){
      
        //Revisar si el ususario existe
        $query = "SELECT * FROM usuarios WHERE email 
        ='${email}' ";
        $resultado = mysqli_query($db, $query);

       // var_dump($resultado);

        if( $resultado-> num_rows){
              
              $ususario = mysqli_fetch_assoc($resultado);
              
    
              $auth = password_verify($password, $ususario['password']);
             // var_dump($auth);

              if($auth){
             
                session_start();
                if( $_SESSION['usuario'] = $ususario['email'] == 'correo@correo.com'){
                 
                  $_SESSION['login'] = true;
                  header('Location: /admin/');
                }
                    if(!($_SESSION['usuario'] = $ususario['email'] == 'correo@correo.com')){
                      $_SESSION['login'] = true;
                      header('Location: index.php');
                    }
 
              } else {
                $errores[] = 'El password es incorrecto';
              }

        } else {
          $errores[] = "El ususario no existe";
        }

    }
    

}

 ?>

<link rel="stylesheet" href="style.css">
<div class="container">
        <main class="contenedor seccion contenido-centrado">
            <div class="tit">
                <h1>Iniciar Sesión</h1>
            </div>

            <?php foreach($errores as $error ): ?> 
           <div class="alerta error">
                 <?php echo $error; ?> 
           </div>  
        
        <?php endforeach; ?>
    
            <form method="POST" class="formulario">
                <div class="form-group">
                    <label for="email" class="txt">E-mail</label>
                    <input type="email" name="email" placeholder="Tu Email" id="email" class="texto">
                </div>
    
                <div class="form-group">
                    <label for="password" class="txt">Contraseña</label>
                    <input type="password" name="password" placeholder="Tu Contraseña" id="Password" class="texto">
                </div>
    
                <a href="crear-cuenta.php"><input  value="Crear Cuenta" class="btnlogin"></a>
                <input type="submit" value="Iniciar Sesión" class="btnlogin">
            </form>
        </main>
    </div>
    <style type="text/css">
      body{
    background-image: url(imagenes/bbe1567359443a326b52162370fa2a36.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
    </style>

<?php
    incluirTemplate('footer');
?>