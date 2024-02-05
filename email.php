<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);


  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];


  try {
    $mail->isSMTP();
    $mail->Host = 'smtppro.zoho.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
  } catch (Exception $e) {
    echo 'Error  SMTP no funciona : ' . $e->getMessage();
    exit;
  }

  $mail->setFrom([$email => $name]);
  $mail->addAddress('');







}