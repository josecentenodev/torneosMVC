<?php

namespace Controllers;
use MVC\Router;
use Model\Torneo;
use Model\Organizador;
use Intervention\Image\ImageManagerStatic as Image;

class TorneoController {
    public static function index(Router $router) {
        $torneos = Torneo::all();
        $resultado = $_GET['resultado'] ?? null;
        $organizadores = Organizador::all();

        $router->render('torneos/admin', [
            'torneos' => $torneos,
            'resultado' => $resultado,
            'organizadores' => $organizadores
        ]);
    }

    public static function crear(Router $router) {
        $torneo = new Torneo;
        $organizadores = Organizador::all();
        $errores = Torneo::getErrores();

        // Enviar el codigo despues de que el usuario envia el formulario
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    /** Crea una nueva instancia **/
    $torneo = new Torneo($_POST['torneo']);
    // Crear Carpeta
    if (!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
    }
    // Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la imagen
    // Realiza un resize a la imagen con Intervention
    if ($_FILES) {
        $image = Image::make($_FILES['torneo']['tmp_name']['imagen'])->fit(800, 600);
        $torneo->setImagen($nombreImagen);
    }
    // Revisar que el array de errores este vacio
    $errores = $torneo->validar();

    // INSERTAR EN LA BASE DE DATOS
    if (empty($errores)) {
        // Crear la carpeta para subir imagenes
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guardar la imagen en el server
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la base de datos
        $torneo->guardar();

    }
}

        $router->render('torneos/crear', [
            'torneo' => $torneo,
            'organizadores' => $organizadores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        $torneo = Torneo::find($id);
        $organizadores = Organizador::all();
        $errores = Torneo::getErrores();

        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            // debuguear($_POST);
            // Mapear los atributos para crear el arreglo $_POST
            $args = $_POST['torneo'];
            // Sincronizar 
            $torneo->sincronizar($args);
        
            // Revisar que el array de errores este vacio
            // E
            // INSERTAR EN LA BASE DE DATOS
            $errores = $torneo->validar();
            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            if ($_FILES) {
                $image = Image::make($_FILES['torneo']['tmp_name']['imagen'])->fit(800, 600);
                $torneo->setImagen($nombreImagen);
            }
        
            if(empty($errores)){
                if ($_FILES['torneo']['tmp_name']['imagen']) {
                // Almacenar 
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $torneo->guardar();
                
            }
        
        
        }
        
        $router->render('/torneos/actualizar', [
            'torneo' => $torneo,
            'organizadores' => $organizadores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $torneo = Torneo::find($id);
                    $torneo->eliminar();
                }
            }
        }
    }
}