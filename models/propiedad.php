<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '1';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[]= "Debes añadir un titulo";
        }
    
        if(!$this->precio){
            self::$errores[]= "El precio es obligatorio";
        }
    
        if(strlen($this->descripcion)<50){
            self::$errores[]= "No olvides de poner una descripción más larga";
        }
    
        if(!$this->habitaciones){
            self::$errores[]= "Recuerda poner habitaciones.";
        }
    
        if(!$this->wc){
            self::$errores[]= "A una casa no le pueden faltar baños :C";
        }
    
        if(!$this->estacionamiento){
            self::$errores[]= "Hey! Y donde voy a dejar mi coche?";
        }
    
        if(!$this->vendedorId){
            self::$errores[]= "Necesito saber quien me creó!";
        }
    
        if(!$this->imagen){
            self::$errores[]="Alguna fotito pal Instagram?";
        }

        return self::$errores;
    }
}