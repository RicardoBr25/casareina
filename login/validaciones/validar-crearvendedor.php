<?php

$conexion=mysqli_connect("localhost","root","","login");

$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$contraseñan=$_POST['contraseñan'];


$id_cargo='3';

if(!empty($nombre) && !empty($usuario) && !empty($contraseña) && !empty($contraseñan)){
    if(buscarRepetido($usuario,$conexion)==1){
        header("location:location:/login/paginas/crear-vendedor.php");
    }
    else{
        $consulta="INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo) VALUES ('$nombre', '$usuario', '$contraseña', '$id_cargo')";
        $resultado=mysqli_query($conexion,$consulta);
        header("location:/admin.php");
    }
}else {
    ?>
    <h1 class="bad">Todos los campos son obligatorios</h1>
    <?php
    include("../paginas/crear-vendedor.php");
}
 
    

function buscarRepetido($usuario,$conexion){
    $sql="SELECT * FROM usuarios where usuario='$usuario'";
    $result=mysqli_query($conexion, $sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }
    else{
        return 0;
    }
}



?>
