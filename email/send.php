<?php
$name = $_POST['name'];
$email = $_POST['email'];
$cellphone = $_POST['cellphone'];
$phone = $_POST['phone'];
$message = $_POST['message'];

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {

    $mail->SetLanguage("br", 'PHPMailer/language/');

    //Server settings
    $mail->SMTPDebug = false;               
    $mail->isSMTP();

    $mail->Host = 'smtp.simposionutricaoufgd.com.br';  
    $mail->SMTPAuth = true;           
    $mail->Username = 'contato@simposionutricaoufgd.com.br';
    $mail->Password = 'sn159263';      
    $mail->SMTPSecure = 'tls';               
    $mail->Port = 587;           

    $mail->SMTPSecure = false;
 	$mail->SMTPAutoTLS = false;                  

    $mail->isHTML(true);
    $mail->Charset = 'UTF-8';
    $mail->Encoding = 'base64';

     //Recipients
    $mail->setFrom('contato@simposionutricaoufgd.com.br', 'Contato');
    $mail->addAddress('contato@simposionutricaoufgd.com.br', 'Simpósio de Nutrição'); 

    $mail->Subject = "Site - (simposionutricaoufgd.com.br)";
    $mail->msgHTML("<html>De: {$name}<br/>Email: {$email}<br/>Telefone: {$phone}<br/>Celular: {$cellphone}<br/>Mensagem: {$message}</html>");
    $mail->AltBody = "<p>De: <b>{$name}</b></p><p>Email: <b>{$email}</b></p><p>Telefone: <b>{$phone}</b></p><p>Celular: <b>{$cellphone}</b></p><p>Mensagem: <b>{$message}</b></p>";

    if ($mail->send()) {
        echo true;
    } else {
        echo "Erro ao enviar o email " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
     echo "Erro ao enviar o email " . $mail->ErrorInfo;
}
die();