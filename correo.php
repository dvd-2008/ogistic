<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


// Incluye la biblioteca de PHPMailer
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';


// Configuración de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Zoho
    $mail->isSMTP();
    $mail->Host       = 'smtp.zoho.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'davidhuaman@davidh.tech
    '; // Cambia a tu dirección de correo de Zoho
    $mail->Password   = 'Geyda.20';          // Cambia a tu contraseña de Zoho
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Configuración del correo
    $mail->setFrom('davidhuaman@davidh.tech
    ', 'david');
    $mail->addAddress('davidhuaman@davidh.tech
    ', 'david');
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    
    // Contenido del correo
    $mensaje = "<p>Nombre: {$_POST['Name']}</p>";
    $mensaje .= "<p>Email: {$_POST['Email']}</p>";
    $mensaje .= "<p>Teléfono: {$_POST['Phone_Number']}</p>";
    $mensaje .= "<p>Mensaje: {$_POST['Message']}</p>";
    
    $mail->Body    = $mensaje;

    // Envía el correo
    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>