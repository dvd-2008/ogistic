<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $phone_number = $_POST["Phone_Number"];
    $message = $_POST["Message"];

    $destinatario = 'davidhuaman@davidh.tech'; // Reemplaza con tu dirección de correo destino

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.zoho.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'davidhuaman@davidh.tech';
        $mail->Password = 'Geyda.20';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($email, $name);
        $mail->addAddress($destinatario);

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body = "Nombre: $name <br>Email: $email <br>Teléfono: $phone_number <br>Mensaje: $message";

        $mail->send();
        echo 'El correo fue enviado correctamente.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
