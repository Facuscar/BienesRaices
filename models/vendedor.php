<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['nombre','apellido','telefono', 'id'];
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        if( !$this->nombre ){
            self::$errores[] =  "Debes añadir un nombre";
        }

        if( !$this->apellido ){
            self::$errores[] =  "Debes añadir un apellido";
        }

        if( !$this->telefono ){
            self::$errores[] =  "No olvides el telefono de contacto";
        }

        if( !preg_match('/[0-9]{10}/', $this->telefono) ){
            self::$errores[] = "Formato inválido";
        }

        return self::$errores;
    }
}