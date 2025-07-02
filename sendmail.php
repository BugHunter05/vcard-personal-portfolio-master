<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    
    // TU CORREO Y CONTRASEÑA DE APLICACIÓN
    $mail->Username = 'vasquezrafaelcarlosadalberto@gmail.com'; 
    $mail->Password = 'xeop rmwn yzcv wdav'; 
    
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom($_POST['email'], $_POST['fullname']);
    $mail->addAddress('vasquezrafaelcarlosadalberto@gmail.com');

    // Contenido del mensaje
    $mail->isHTML(false);
    $mail->Subject = 'Nuevo mensaje desde el portafolio';
    $mail->Body    = "Nombre: {$_POST['fullname']}\nEmail: {$_POST['email']}\nMensaje:\n{$_POST['message']}";

    $mail->send();
    echo "<script>alert('¡Mensaje enviado correctamente!'); window.location.href='index.html';</script>";
} catch (Exception $e) {
    echo "<script>alert('No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}'); window.history.back();</script>";
}
?>
