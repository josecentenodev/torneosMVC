<?php

namespace Model;

class Torneo extends ActiveRecord {
    protected static $tabla = 'torneos';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'equipos', 'fecha', 'organizadorId', 'hora'];
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $equipos;
    public $fecha;
    public $organizadorId;
    public $hora;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->equipos = $args['equipos'] ?? '';
        $this->fecha = date('Y/m/d') ?? '';
        $this->organizadorId = $args['organizadorId'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }

    public function validar () {
        
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }
    
        if(!$this->descripcion){
            self::$errores[] = "Agregale una descripcion papi";
        }
    
        if(!$this->equipos){
            self::$errores[] = "Tienen que haber al menos 8 Equipos o Participantes";
        }
    
        if(!$this->fecha){
            self::$errores[] = "La Fecha es obligatoria";
        }
        if(!$this->organizadorId){
            self::$errores[] = "Elija un Organizador";
        }
    
        if(!$this->hora){
            self::$errores[] = "La Hora es obligatoria";
        }
    
        if(!$this->imagen){
            self::$errores[] = 'La Imagen es Obligatoria';
        }
    
        return self::$errores;
    
        }

}