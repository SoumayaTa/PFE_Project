<?php
    session_start();
    include 'connect.php';

    if(isset($_SESSION['user'])){
      
      header('Location: profile.php');
  }?>
 <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $user     = $_POST['username'];
        $pass     = $_POST['password'];
        $email    = $_POST['email'];
        $fullname = $_POST['FullName'];

        $hashPass = sha1($_POST['password']);


        $formErrors = array();
     if (strlen($user)< 4){
       $formErrors[]= 'Username can not be less than <strong>4 characters</strong> ';
     }
     if (strlen($user) > 10){
      $formErrors[]= 'username can not be more than 10 characters';
    }
    if (strlen($pass)< 4){
        $formErrors[]= 'password can not be less than <strong>4 characters</strong> ';
      }
     if(empty($user)){
      $formErrors[] = 'username can not be <strong>empty</strong>';
     }
     if(empty($pass)){
        $formErrors[] = 'password can not be <strong>empty</strong>';
       }
     if(empty($fullname)){
      $formErrors[] = 'Full name can not be <strong>empty</strong>';
    }
    if(empty($email)){
      $formErrors[] = 'Email can not be <strong>empty</strong>';
    }if(isset($_POST['password']) && isset($_POST['password1'])){
      $pass1 = sha1($_POST['password']);
      $pass2 = sha1($_POST['password1']);
      if($pass1 !== $pass2){
        $formErrors[] = 'Sorry password is not match';
      }
    }
    foreach($formErrors as $error){
      echo $error . '</br>';
    }
    if(empty($formErrors)){
        $stmt = $con ->prepare("INSERT INTO
        users(username, password, email, FullName, Date )
        VALUES(:zuser, :zpass, :zmail, :zname, now() )");
        $stmt ->execute( array(
            'zuser' => $user,
            'zpass' => $hashPass,
            'zmail' => $email,
            'zname' => $fullname
        ));
        echo "<div class ='alert alert-success'>" .$stmt->rowCount() .'Record Inserted </div>';}
       
    };
?>