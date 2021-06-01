<?php 

namespace Model;

class ActiveRecord {
    // Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    // Errores 
    protected static $errores = [];


    // Definir conexion con DB
    
    public static function setDB($database) {
        self::$db = $database;
    }

    

    public function guardar() {
        if(!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear() {

        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        // Insertar en la DB
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);


        if ($resultado) {
            // echo "Torneo creado correctamente";
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar(){
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        // Armo la query que hace el UPDATE
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado) {
            // Redireccionar al usuario 
            header('Location: /admin?resultado=2');
        }
    }

    // Eliminar un registro 
    public function eliminar() {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    // Identificar y reunir los atributos de la DB
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        // debuguear($sanitizado);
        return $sanitizado;
    }

    // Subida de Archivos
    public function setImagen($imagen){
        // Elimina la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }

        // Asignar al atributo el nombre de la imagen para tener la referencia y guardar en DB
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    // Eliminar archivo
    public function borrarImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }        
    }

    // Validacion

    public static function getErrores() {
        return static::$errores;
    }

    public function validar () {
    static::$errores = [];

    return static::$errores;

    }

    // Lista de todos los torneos
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene una determinada cantidad de torneos para el index
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un torneo por su id

    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado );
    }

    public static function consultarSQL($query) {
        // Consultar la base de datos 
        $resultado = self::$db->query($query);
        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        // Liberar la memoria

        $resultado->free();

        // Retornar los resultados

        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key => $value){
            if(property_exists( $objeto, $key )){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar( $args = [] ) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key ) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

}