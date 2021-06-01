<?php 

namespace Controllers;
use MVC\Router;
use Model\Organizador;

class OrganizadorController {
    public static function crear(Router $router){
        $organizador = new Organizador();
        $errores = Organizador::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            
            // Crear una nueva instancia
            
                $organizador = new Organizador($_POST['organizador']);
            
                $organizador->validar();
                // debuguear($organizador->validar());
                if(empty($errores)){
                    $organizador->guardar();
                }
            
            }
        
        $router->render('organizadores/crear', [
            'organizador' => $organizador,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $organizador = Organizador::find($id);
        $errores = Organizador::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            // Asignar los valores 
            $args = $_POST['organizador'];
            $organizador->sincronizar($args);
            $errores = $organizador->validar();
            if(empty($errores)){
                $organizador->guardar();
            }
        
        }

        $router->render('organizadores/actualizar', [
            'organizador' => $organizador,
            'errores' => $errores
        ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
           $tipo = $_POST['tipo'];
           // Validar id
           $id = $_POST['id'];
           $id = filter_var($id, FILTER_VALIDATE_INT);

           if($id) {
               // Validar el tipo a eliminar
               if(validarTipoContenido($tipo)) {
                   $organizador = Organizador::find($id);
                   $organizador->eliminar();
               }
           }
            }
        }
}