<?php

namespace App;
class Platillos extends ActiveRecord{
    
    protected static $tabla = ' platillos';
    protected static $columnasDB = [
        'id', 'titulo', 'precio', 'imagen',
        'descripcion'
    ]; 

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
   
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
       
    }

    public function validar()
    {

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }


        if (!$this->imagen) {
            self::$errores[] = "La imagen del platillo es obligatoria";
        }

        return self::$errores;
    }


}
