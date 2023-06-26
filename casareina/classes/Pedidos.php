<?php

namespace App;
class Pedidos extends ActiveRecord{
    
    protected static $tabla = ' pedidos';
    protected static $columnasDB = [
        'id', 'nombre', 'apellido', 'direccion',
        'total'
    ]; 

    public $id;
    public $nombre;
    public $apellido;
    public $direccion;
    public $total;
   
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->total = $args['total'] ?? '';
       
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }


        if (!$this->direccion) {
            self::$errores[] = "La direccion del platillo es obligatoria";
        }

        return self::$errores;
    }


}
