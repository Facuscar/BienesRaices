<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('/paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }

    public static function anuncios(Router $router){

        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function anuncio(Router $router){

        $id = validarORedireccionar('/anuncios');

        //Buscar propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog( Router $router){
        
        $router->render('paginas/blog');
    }

    public static function contacto( Router $router ){

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHP mailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '29200dcefcc095';
            $mail->Password = 'b3fc8e68a0db0c';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';

            //Configurar el contenido del email.
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            

            //Enviar de forma condicional algunos campos
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Prefiere ser contactado por ' . $respuestas['contacto'] . '</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Quiere ser contactado el dia: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>A las: ' . $respuestas['hora'] . '</p>';
            } else{
                //Es email entonces agregamos campo de email
                $contenido .= '<p>Prefiere ser contactado por ' . $respuestas['contacto'] . '</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido .= '</html>';
            


            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            } else{
                $mensaje = "El mensaje no se puedo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    
}