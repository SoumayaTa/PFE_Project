<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>

</head>
<body>
<?php

 session_start();
 if(isset($_SESSION['username'])){
	include 'connect.php';
    include 'h.php';

    $do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if($do == 'Manage'){ //manage page?>
<?php
    }elseif($do == 'Edit'){//Edit page

$userid = isset($_GET['userid'])&& is_numeric($_GET['userid']) ? intval ($_GET['userid']) : 0;
$stmt = $con->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");
  $stmt ->execute(array($userid));
  $row= $stmt->fetch();
$count = $stmt->rowCount();
    if($stmt ->rowCount() > 0){?>
    <br>
    <br>
    <br>
      <h1 class="text-center">Edit Member</h1>
  <div class="container">
    <form role="form" method="post" action="?do=Update">
		<input type="hidden" name="userid" value="<?php echo $userid ?>">
      <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail" name="username" value="<?php echo $row['username']?>" placeholder="Enter your username" autocomplete="off" required="required">
          
        </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="hidden" name="oldpassword" value="<?php echo $row['password']?>" >
          <input type="password" class="form-control" id="inputUser" name="newpassword" placeholder="Enter your password" autocomplete="new-password">
          
        </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $row['email']?>"placeholder="Enter your email"  required = "required">
          
        </div>
      </div>

	  <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail" name="fullname" value="<?php echo $row['FullName']?>" placeholder="Enter your full name"  required = "required">
          
        </div>
      </div>
      <br>
      <div class="form-group row form-group-lg">
        <div class="col-sm-10 offset-sm-4  ">
          <input type="submit" value="Save" name="submit" class="btn btn-primary"/>
        </div>
      </div>
    </form>
  </div>
  <?php
	} else{
		echo 'no such id';
	}
    

    }elseif($do == 'Update'){//update page
      echo "</br>";
		echo "<h1 class='text-center'> </h1>";
    echo "<div class='container'>";
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//get the variable from the form
			$id    = $_POST['userid'];
			$user  = $_POST['username'];
			$email = $_POST['email'];
			$name  = $_POST['fullname'];

      //pass
      $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);
     //VALIDATE THE FORM
     $formErrors = array();
     if (strlen($user)< 4){
       $formErrors[]= '<div class="alert alert-danger">Username can not be less than <strong>4 characters</strong> </div>';
     }
     if (strlen($user) > 10){
      $formErrors[]= '<div class="alert alert-danger">username can not be more than 10 characters</div>';
    }
     if(empty($user)){
      $formErrors[] = '<div class="alert alert-danger">username can not be <strong>empty</strong></div>';
     }
     if(empty($name)){
      $formErrors[] = '<div class="alert alert-danger">Full name can not be <strong>empty</strong></div>';
    }
    if(empty($email)){
      $formErrors[] = '<div class="alert alert-danger">Email can not be <strong>empty</strong></div>';
    }
    foreach($formErrors as $error){
      echo $error . '</br>';
    }
    if(empty($formErrors)){
      $stmt =$con->prepare("UPDATE users SET Username=?, Email =?, FullName = ?, password = ? WHERE UserID =?");
			$stmt->execute(array($user, $email, $name,$pass, $id));
			echo "<div class='alert alert-success'>Successfuly updated </div>";

    }

			//update db 
		



		}else{
			echo 'sorry you can not browse this page directly';
		}echo "</div>";
	}
    }else {
      header('Location:login.php');
      exit();  
      include 'footer.php';   
}?>
<style>
body{
  background-color: #f9f9fa;
  font-family: cursive;
}
	.text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #3b98b7;
	
	}
  
	
	.offset-sm-4 {
		width: auto
		;
		
		margin-left: 590px;
	}
  .form-control{
    position: relative;

  }
  .asterisk{
    font-size: 25px;
    position: absolute;
    right: 30px;
    top: 5px;
    color: red;

  }
  .main-table tr:first-child td{
    background-color: #333;
    color: #fff;
    text-align: center;

  }
  
</style>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    $('input').each(function () {
      if ($(this).attr('required') == 'required'){
        $(this).after('<span class="asterisk">*</span>')
      }
    })
  </script>
</body>
</html>
      
