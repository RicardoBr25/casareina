<?php

function conectarDB() : mysqli{
    $db =new mysqli("localhost", "root", "" ,"reinacasa"); //mysqli es la forma O.Objetos
    if(!$db){
       echo "Error no se pudo conectar";
       exit; 
    } 

    return $db;

}

    //Insertar en la base de datos
    
        
