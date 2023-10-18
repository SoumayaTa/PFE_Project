<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com ) -->
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pop-up Contact Form | Webdevtrick.com</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<span type="button" class="btn" id="c-btn">Contact nous</span>
<div id="contact">
  <form method="POST">
    <ul>
      <h1>Contact</h1>
      <li>
        <input type="text" name="name" id="name" placeholder="&#xf2c0; Full name">
        <input type="email" name="email" id="email" placeholder="&#xf003; Email">
      </li>
      <li>
        <textarea name="message" id="message" placeholder="&#xf040; Your message"></textarea>
      </li>
      <li>
        <input type="submit" value="Send message" class="btn1" id="submit" name="Login">
      </li>
    </ul>
  </form>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script  src="js.js"></script>
   

<?php
             use PHPMailer\PHPMailer\PHPMailer;
             use PHPMailer\PHPMailer\SMTP;
             use PHPMailer\PHPMailer\Exception;

             require('PHPMailer/Exception.php');
            require('PHPMailer/SMTP.php');
            require('PHPMailer/PHPMailer.php');

             if(isset($_POST['Login']))
             {
                 $name=$_POST['name'];
                 $email=$_POST['email'];
                 $message=$_POST['message'];

                 $mail = new PHPMailer(true);
             }

             try {
                 
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'zaimjannate671@gmail.com';                     //SMTP username
                $mail->Password   = '0626281857jaja';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('zaimjannate671@gmail.com', 'ElezctroShop');
                $mail->addAddress("intissarelkharraz2002@gmail.com");     //Add a recipient
            
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Contact us';
                $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";
                
                $mail->send();
                echo "<script>alert('Message has been sent')</script>";
            
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo})</script>";
            }

        ?>

</body>
</html>