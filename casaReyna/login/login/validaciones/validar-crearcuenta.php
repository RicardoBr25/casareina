<?php

$conexion=mysqli_connect("localhost","root","","casareyna");

$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$contraseñan=$_POST['contraseñan'];
$id_cargo='2';
 

if(!empty($nombre) && !empty($usuario) && !empty($contraseña) && !empty($contraseñan)){
    //condicion para verificar si la cuentas es repetita 1=si es repetida
    if(buscarRepetido($usuario,$conexion)==1){
        ?>
        <h1 class="bad">El correo que ingreso ya existe, pruebe con otro</h1>
        <?php
        include("../paginas/crear-cuenta.php");//devuelve a la misma pagina
    }
    else{
        $consulta="INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo) VALUES ('$nombre', '$usuario', '$contraseña', '$id_cargo')";
        $resultado=mysqli_query($conexion,$consulta);
        header("location:/cliente.php");//crea la cuenta e inicia sesion
    }
}else {
    ?>
    <h1 class="bad">Todos los campos son obligatorios</h1>
    <?php
    include("../paginas/crear-cuenta.php");
}

// funcion para verificar que las cuentas no estan repetidas
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
