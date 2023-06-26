<?php

require '../../includes/app.php';
incluirTemplate('header');

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

// Validar el usuario y contraseña
if (!empty($_POST['usuario']) && !empty($_POST['contraseña'])) {
    
    $_SESSION['usuario']=$usuario;

    $conexion=mysqli_connect("localhost","root","","casareyna");

    $consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_fetch_array($resultado);

   

    if($filas !== null){ //hay un registro con el usuario y contrasena ingresados
        if($filas['id_cargo']==1){ //administrador
            header("location: /admin.php");
            $_SESSION['login'] = true;
        }else
        if($filas['id_cargo']==2){ //cliente
            header("location: /cliente.php");
            $_SESSION['login'] = true;
        }else
        if($filas['id_cargo']==3){
            header("location: /vendedor.php");
            $_SESSION['login'] = true;
        }
        else{
            ?>
                <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
            <?php
            include("../../index.php");
        }
    } else {
        ?>
            <h1 class="bad">Usuario y/o contraseña incorrectos</h1>
        <?php
        include("../paginas/iniciar-sesion.php");
    }

    
    mysqli_free_result($resultado);
    mysqli_close($conexion);


} else {
    ?>
        <h1 class="bad">Usuario y/o contraseña obligatorio</h1>
    <?php
    include("../paginas/iniciar-sesion.php");
}


incluirTemplate('footer');