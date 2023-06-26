<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = ' usuarios';

    protected static $columnasDB = ['id', 'nombre', 'usuario','contraseña', 'id_cargo']; 

    public $id;
    public $nombre;
    public $usuario;
    public $contraseña;
    public $id_cargo;
   
 public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
        $this->id_cargo = $args['id_cargo'] ?? '';
       
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
        if (!$this->usuario) {
            self::$errores[] = "Debes añadir un usuario";
        }

        if (!$this->contraseña) {
            self::$errores[] = "Debes añadir un contraseña";
        }

        else if (!preg_match('/[0-9]{10}/',$this->contraseña)) {
            self::$errores[] = "Formato no valido";
        }

        if (!$this->id_cargo) {
            self::$errores[] = "Debes añadir un id_cargo";
        }

       
               
        return self::$errores;
    }
    

}








