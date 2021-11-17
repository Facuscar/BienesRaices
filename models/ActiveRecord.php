<?php

namespace Model;

class ActiveRecord{
    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];

  

    //Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

  

    public function guardar(){
        if (!is_null($this->id)){
            //actualizar
            $this->actualizar();
        }
        else{
            $this->crear();
        }
    }

    public function crear(){

        $atributos = $this->sanitizarEntradas();

        $keys = join(', ',array_keys($atributos));

        $values = join("', '", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . " (${keys}) VALUES ('${values}')" ;
       
        $resultado = self::$db->query($query);

           //Mensaje de exito u error
        if($resultado){
        //Redireccionamos al usuario en caso de que haya llenado del formulario correctamente
        header('Location: /admin?resultado=1');
  }
    }

    public function actualizar(){
        $atributos = $this->sanitizarEntradas();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE ". static::$tabla . " SET ";
        $query .= join(',',$valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
        $query .= " LIMIT 1";

        
        $resultado = self::$db->query($query);

        if($resultado){
            //Redireccionamos al usuario en caso de que haya llenado del formulario correctamente
            header('Location: /admin?resultado=2');
            }
    }

    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = ".self::$db->escape_string($this->id). " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado){
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    public function atributos(){
        $atributos =[];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarEntradas(){
        $atributos = $this->atributos();
        $sanitizado = [];
       

         foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
         }
         return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Elimina una imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        
        //Asignar al atributo el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Eliminar archivo
    public function borrarImagen(){
        //Comprobar si ya existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //Validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
     
        static::$errores = [];
        return static::$errores;
    }

    //Lista todas los registros
    public static function all(){
       $query = "SELECT * FROM " . static::$tabla;

       $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene un número determinado de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ". $cantidad;

        $resultado = self::consultarSQL($query);
 
         return $resultado;
     }

    //Buscar un registro por su id()
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();
        //Retorar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if (property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $args = [] ){
        foreach( $args as $key => $value){
            if(property_exists($this, $key) && !is_null($value) ){
                $this->$key = $value;
            }
        }
    }
}