<?php 
session_start();
    include 'h.php';
    include 'connect.php';
    
    ?>
<br>
<br>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   </head>
<body>
    <div class="full">
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Country</div>
          <div class="text-one">Tetouan</div>
          <div class="text-two">MOROCCO</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+212 641106298</div>
          <div class="text-two">+212 695559512</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">soumaya.tayoub@gmail.com</div>
          <div class="text-two">bouchra.essati@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>  
            We are here to answer your messages 
        </p>
        
      <form  action ="" method="POST">
        <div class="input-box">
          <input type="text" name="name" id="name" placeholder="Enter your name" required="required">
        </div>
        <div class="input-box">
          <input type="text" name="email" id="email" placeholder="Enter your email" required="required">
        </div>
        <div class="input-box message-box">
          <textarea  name="message" id="message"  rows ="4" placeholder="How can we help you ?" required="required"></textarea>
        </div>
        <div class="button">
          <input type="submit" id="submit" name="submit" value="Send Now" >
          <span></span>
        </div>
      </form>
    </div>
    </div>
  </div>
  </div>
  <?php
             use PHPMailer\PHPMailer\PHPMailer;
             use PHPMailer\PHPMailer\SMTP;
             use PHPMailer\PHPMailer\Exception;
 
             if(isset($_POST['submit']))
             {
             require('PHPMailer/Exception.php');
              require('PHPMailer/SMTP.php');
              require('PHPMailer/PHPMailer.php');
                 $name=$_POST['name'];
                 $email=$_POST['email'];
                 $message=$_POST['message'];

            
               
             try {
                 $mail = new PHPMailer(true);

              $mail->isSMTP();                                          
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'hidayaaya1234@gmail.com';                    
                $mail->Password   = 'soumaya2021';                               
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                $mail->Port       = 465;                                   
            
                //Recipients
                $mail->setFrom('hidayaaya1234@gmail.com', 'ADVshop');
                $mail->addAddress("shoptravel154@gmail.com");     
            
            
                //Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'Contact us';
                $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";
                
                $mail->send();
                echo "<script>alert('Message has been sent')</script>";
            
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo})</script>";
            
 } }
        ?>


          
 

  <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family:  cursive;
}
.full{
  min-height: 100vh;
  width: 100%;
 background-color: #f2f2f2;
  display: flex;
  align-items: center;
  justify-content: center;
}
.container{
  width: 85%;
  background: #c6dce9;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.container .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.content .left-side::before{
  content: '';
  position: absolute;
  height: 70%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}
.content .left-side .details{
  margin: 14px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 30px;
  color: #3b98b7;
  margin-bottom: 10px;
}
.content .left-side .details .topic{
  font-size: 18px;
  font-weight: 500;
}
.content .left-side .details .text-one,
.content .left-side .details .text-two{
  font-size: 14px;
  color: #666;
}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: #3b98b7;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #F0F1F8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
}
.right-side .button input[type="submit"]{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3b98b7;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button input[type="submit"]:hover{
  background: #87cefa;
}

@media (max-width: 950px) {
  .container{
    width: 90%;
    padding: 30px 40px 40px 35px ;
  }
  .container .content .right-side{
   width: 75%;
   margin-left: 55px;
}
}
@media (max-width: 820px) {
  .container{
    margin: 40px 0;
    height: 100%;
  }
  .container .content{
    flex-direction: column-reverse;
  }
 .container .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 .container .content .left-side::before{
   display: none;
 }
 .container .content .right-side{
   width: 100%;
   margin-left: 0;
 }
}


  </style>
   <?php 
  include 'footer.php';
  ?>
</body>
</html>
