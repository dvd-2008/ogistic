<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $phone_number = $_POST["Phone_Number"];
    $message = $_POST["Message"];

    require 'vendor/autoload.php';


    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtppro.zoho.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'davidhuaman@davidh.tech';
        $mail->Password = 'Geyda.20';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    } catch (Exception $e) {
        echo 'Error al configurar SMTP: ' . $e->getMessage();
        exit;
      }

        $mail->setFrom([$email => $name]);

        $mail->addAddress('davidhuaman@davidh.tech');

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body = $message ;


        try {
            $mail->send();
            header('Location: https://davidh.tech/ogistic');
            exit;
          } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $e->getMessage();
          }
        } else {
          // Si alguien intenta acceder directamente a este script, redirigir al formulario
          header('Location:https://davidh.tech/ogistic');
          exit;
        }
?>
