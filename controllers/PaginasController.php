<?php

namespace Controllers;

use MVC\Router;
use Model\Torneo;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index (Router $router) {
        $torneos = Torneo::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'torneos' => $torneos,
            'inicio' => $inicio
        ]);
    }

    public static function torneos (Router $router) {
        $torneos = Torneo::all();
        $router->render('paginas/torneos', [
            'torneos' => $torneos
        ]);
    }

    public static function torneo (Router $router) {

        $id = validarORedireccionar('/admin');
        $torneo = Torneo::find($id);
        $router->render('paginas/torneo', [
            'torneo' => $torneo
        ]);
    }

    public static function nosotros (Router $router) {
        $router->render('paginas/nosotros');
    }

    public static function blog (Router $router) {

        $router->render('paginas/blog');
    }

    public static function entrada (Router $router) {
        $router->render('paginas/entrada');
    }

    public static function contacto (Router $router) {
        $torneos = Torneo::all();
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            
            $respuestas = $_POST['contacto'];
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();
            // Configurar protocolo SMTP    
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '69d4d6fdaa02a5';
            $mail->Password = '270689ed753289';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';

            // Configurar el contenido del mail
            $mail->setFrom('admin@torneostell.com');
            $mail->addAddress('admin@torneostell.com', 'torneostell.com');
            $mail->Subject = 'Torneos TELL - Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            // Enviar campos de forma condicional
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono: </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['contacto'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por Email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['contacto'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Invocador: ' . $respuestas['invocador'] . '</p>';
            $contenido .= '<p>Torneo: ' . $respuestas['torneo'] . '</p>';
            $contenido .= '<p>Contacto: ' . $respuestas['contacto'] . '</p>';
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            $mail->AltBody = 'Texto Alternativo sin html';

            // Enviar el mensaje
            if($mail->send()) {
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'torneos' => $torneos,
            'mensaje' => $mensaje
        ]);
    }

}