<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
function newMail($destinomail,$message){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'spacerocket.noreply@gmail.com';                 // Usuario SMTP
        $mail->Password = 'Alinfinitoymasalla';                           // Password SMTP
        $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
        $mail->Port = 587;                                    // Puerto SMTP

        #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
        #$mail->SMTPSecure = false;				// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
        #$mail->SMTPAutoTLS = false;			// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
    
        $mail->setFrom('spacerocket.noreply@gmail.com');		// Mail del remitente
        $mail->addAddress($destinomail);     // Mail del destinatario
    
        $mail->isHTML(true);
        $mail->Subject = 'Nueva clave de acceso Space Rocket';  // Asunto del mensaje
        $mail->Body    = $message;    // Contenido del mensaje (acepta HTML)
        //$mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
