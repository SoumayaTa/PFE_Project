<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require_once ('PHPMailer/Exception.php');
require_once ('PHPMailer/SMTP.php');
require_once ('PHPMailer/PHPMailer.php');



$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

$mail = new PHPMailer(true);
    try{
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shoptravel54@gmail.com';
        $mail->Password = 'bouchrasoumaya';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '578';

        $mail->setFrom('shoptravel54@gmail.com');
        $mail->addAddress('shoptravel54@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Message Received(Contact us1 page)';
        $mail->Body = "<h3>Name : $name <br>Email : $email<br>Message : $message</h3>";
        $mail->send();
        $alert = '<div class="alert-success">
        <span>Message Sent ! Thank you for contacting us.</span></div>';
    }catch (Exception $e){
        $alert = '<div class="alert-error">
        <span> '. $e->getMessage().'</span></div>';
    }}
