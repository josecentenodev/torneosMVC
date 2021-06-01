<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login(Router $router){

        $errores = [];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){
                // Validar el usuario si existe o no (mensaje de error)
                $resultado = $auth->existeUsuario();
                if(!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                // Validar el password
                   $autenticado = $auth->comprobarPassword($resultado);
                   if($autenticado) {
                        // Autenticar el usuario
                        $auth->autenticar();
                   } else {
                       // Password incorrecto (Mensaje de error)
                        $errores = Admin::getErrores();
                   }
                
                }

            }
        }
        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}