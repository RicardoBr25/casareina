<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = ' vendedores';

    protected static $columnasDB = ['id', 'nombre', 'apellido','telefono', 'email', 'password']; 

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;

 public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un apellido";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un telefono";
        }

        else if (!preg_match('/[0-9]{10}/',$this->telefono)) {
            self::$errores[] = "Formato no valido";
        }

        if (!$this->email) {
            self::$errores[] = "Debes añadir un email";
        }

        if (!$this->password) {
            self::$errores[] = "Debes añadir una password";
        }
               
        return self::$errores;
    }
    

}








