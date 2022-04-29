<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

  /*   public function enviarConfirmacion() {

        $mail = new PHPMailer();
        $mail->SMTPSecure = 'tls';
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];
        $mail->AddAddress($this->email,'AppSalon.com');
        $mail->FromName = "AppSalon";
        $mail->Subject = "Confirmacion de Alta de Cuenta";
        $mail->Host = "smtp.live.com";
        $mail->Port = 587;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->From = $mail->Username;
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu cuenta en 
        AppSalon, solo debes confirmarla presionando en el siguiente enlace </P>";
        $contenido .= "<p>Presiona aquí: <a href='http://". $_SERVER["HTTP_HOST"] . "/confirmar-cuenta?token=".$this->token."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje </p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        $mail->send();


    } */
    public function enviarConfirmacion() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '25281089791d5d';
        $mail->Password = 'e967dc1bfdaeb9';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu cuenta en 
        AppSalon, solo debes confirmarla presionando en el siguiente enlace </P>";
        $contenido .= "<p>Presiona aquí: <a href='http://". $_SERVER["HTTP_HOST"] . "/confirmar-cuenta?token=".$this->token."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje </p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        $mail->send();
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer();
        $mail->SMTPSecure = 'tls';
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];
        $mail->AddAddress($this->email,'AppSalon.com');
        $mail->FromName = "AppSalon";
        $mail->Subject = 'Reestablece tu Password';
        $mail->Host = "smtp.live.com";
        $mail->Port = 587;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->From = $mail->Username;
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Parece que has olvidado 
        tu Password, sigue el siguiente enlace para recuperarla </P>";
        $contenido .= "<p>Presiona aquí: <a href='http://". $_SERVER["HTTP_HOST"] . "/recuperar?token=" .$this->token . "'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje </p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        $mail->send(); 

    }
}