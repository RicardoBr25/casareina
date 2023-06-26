<?php

function conectarDB() : mysqli{
    $db =new mysqli("localhost:3306", "root", "" ,"reinacasa"); //mysqli es la forma O.Objetos
    if(!$db){
       echo "Error no se pudo conectar";
       exit; 
    } 

    return $db;

}