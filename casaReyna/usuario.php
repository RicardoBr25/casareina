<?php

//Importar la conexión
require 'includes/app.php';
$db = conectarDB();

//Crear un email y password 
$email = "ven@correo.com";
$password = "1234";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query para crear el ususario 
$query = " INSERT INTO usuario (email, password) VALUES 
( '${email}','${passwordHash}')";

//echo $query;

//exit;

//Agregarlo a la base de datos
mysqli_query($db, $query); 