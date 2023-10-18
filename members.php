<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Members</title>

</head>
<body>
<?php
ob_start();
 session_start();
 if(isset($_SESSION['username'])){
	include 'connect.php';
  include 'functions.php';
  include 'adminheader.php';

    $do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if($do == 'Manage'){ //manage page
      $value = "Soumaya";
      checkItem("username", "users", $value);

    $stmt = $con->prepare("SELECT * FROM users WHERE GroupID = 0 ");
    $stmt->execute();
    //assign to var
    $rows = $stmt->fetchAll();
    ?>
     
      <h1 class="text-center">Manage members</h1>
      <div class="container">
        <div class="teble-responsive">
          <table class="main-table table table-bordered">
            <tr>
              <td>#ID</td>
              <td>Username</td>
              <td>Email</td>
              <td>Full Name</td>
              
              <td>Registered Date</td>
              <td>Control</td>
            </tr>
            <?php 

            foreach ($rows as $row){
              echo "<tr>";
              echo "<td>" . $row['UserID'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" .$row['Date'] . "</td>";
                echo "<td>
                <a href='members.php?do=Edit&userid=" . $row['UserID'] . "' class='btn btn-success'>Edit</a>
                <a href='members.php?do=Delete&userid=" . $row['UserID'] . "' class='btn btn-danger confirm'>Delete</a>
                </td>";
              echo "</tr>";
            }
            ?>
            
          </table>
        </div>
        <a href="members.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add new members</a>
      </div>
<?php
    }elseif($do == 'Add'){?>
      <h1 class="text-center">Add Members</h1>
      <div class="container">
        <form role="form" method="post" action="?do=Insert">
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail" name="username"  placeholder="Enter a usernme" autocomplete="off" required="required">
              
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputUser" name="password" placeholder="Enter a password" autocomplete="new-password">
              
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control"  name="email" placeholder="Enter an email"  required = "required">
              
            </div>
          </div>
    
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" placeholder="Enter full name" required = "required">
              
            </div>
          </div>

          

          <div class="form-group row form-group-lg">
            <div class="offset-sm-4 col-sm-10  ">
              <input type="submit" value="Save" name="submit" class="btn btn-primary"/>
            </div>
          </div>
        </form>
      </div>
<?php
    }elseif($do == 'Insert'){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
          $user     = $_POST['username'];
          $pass     = $_POST['password'];
          $email    = $_POST['email'];
          $fullname = $_POST['fullname'];
          $tel      = $_POST['tel'];
  
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
        if (strlen($user) > 10){
         $formErrors[]= 'password can not be more than 10 characters';
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
      }
      foreach($formErrors as $error){
        echo $error . '</br>';
      }
      if(empty($formErrors)){
          $stmt = $con ->prepare("INSERT INTO
          users(username, password, email, FullName, tel, Date )
          VALUES(:zuser, :zpass, :zmail, :zname, :ztel, now() )");
          $stmt ->execute( array(
              'zuser' => $user,
              'zpass' => $hashPass,
              'zmail' => $email,
              'zname' => $fullname,
              'ztel'  => $tel
          ));
          echo "<div class ='alert alert-success'>" .$stmt->rowCount() .'Record Inserted </div>';}
         
      
      }else{
        echo "<div class='container'>";
        $msg = '<div class = "alert alert-danger">Sorry you can not browse this page</div>';
        redirectHome($msg);
        echo "</div>";
      }
    }elseif($do == 'Edit'){//Edit page

$userid = isset($_GET['userid'])&& is_numeric($_GET['userid']) ? intval ($_GET['userid']) : 0;
$stmt = $con->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");
  $stmt ->execute(array($userid));
  $row= $stmt->fetch();
$count = $stmt->rowCount();
    if($stmt ->rowCount() > 0){?>
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
      <div class="form-group row form-group-lg">
        <div class="offset-sm-4 col-sm-10  ">
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
		echo "<h1 class='text-center'>Update Member </h1>";
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
      $msg ="<div class='alert alert-success'>" .$stmt->rowCount() .'Record Updated</div>';
        redirectHome($msg, 'back');
		

    }
		}else{
			echo 'sorry you can not browse this page directly';
		}echo "</div>";
	}elseif($do =='Delete'){
    $userid = isset($_GET['userid'])&& is_numeric($_GET['userid']) ? intval ($_GET['userid']) : 0;
    $stmt = $con->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");
    $stmt ->execute(array($userid));
    $count = $stmt->rowCount();
    if($stmt ->rowCount() > 0){
      $stmt = $con->prepare("DELETE FROM users WHERE UserID = :zuser");
      $stmt-> bindParam(":zuser", $userid);
      $stmt->execute();
      $msg ="<div class='alert alert-success'>" .$stmt->rowCount() .'Record Deleted</div>';
        redirectHome($msg, 'back');
  }
    }else {
      header('Location:adminlogin.php');
      exit(); 

}
}
ob_end_flush();
?>
<style>
   body, html {
    font-family: cursive;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}
	.text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #fff;
	
	}.col-form-label{
    color: #fff;
  }
  
	.text-center:hover{
		color: #bac34e;
		
	}
	.offset-sm-4 {
		width: auto;
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
    background-color: #e83e8c7a;
    color: #fff;
    text-align: center;
  }
    .main-table td{
      background-color:#fff;
      vertical-align : middle  !important;
    }
    .main-table{
      -webkit-box-shadow:0 3px 10px #ccc;
      -moz-box-shadow:0 3px 10px #ccc;
      box-shadow:0 3px 10px #ccc;
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
    });
    $('.confirm').click(function (){
      return confirm ('Are you sure?');
    });

  </script>
</body>
</html>