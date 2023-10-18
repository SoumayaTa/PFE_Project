
<!Doctype html>
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <?php
    ob_start();
   session_start();
    if(isset($_SESSION['username'])){
      
        header('Location: profile.php');
    }?>
    <div class="full-page">
      <?php
      include 'functions.php';
    include 'connect.php';
    include 'h.php';




    // check if user is coming from HTTP Post Request


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(isset($_POST['login'])){
       $username = $_POST['user'];
       $password = $_POST['pass'];
      $hashedPass = SHA1($password);
      //chech if user exist in db

      $stmt = $con->prepare("SELECT UserID, username, password FROM users WHERE username = ? AND password = ? 
      LIMIT 1");
      $stmt ->execute(array($username, $hashedPass));
      $count = $stmt->rowCount();
      //if count > 0 THIS MEANS THAT DB COUNTAIN THis username
      if($count > 0) {
        $_SESSION['username'] = $username; //register session name
        $_SESSION['ID'] = $row['UserID'];//REGISTER ID
        header('Location: profile.php');
        exit();
      }
    }else{

      $formErrors = array();
      $username = $_POST['user'];
      $password =$_POST['password'];
      $password2 =$_POST['password1'];
      $email = $_POST['email'];
      $fullname = $_POST['FullName'];
      if(isset($username)){
        $str = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
        if(strlen($str) < 4){
          $formErrors[] = 'Username can not be less than 4 characters';
        }
        if(strlen($str) > 10){
          $formErrors[] = 'Username can not be more than 10 characters';
        }
      }

      if(isset($_POST['password']) && isset($_POST['password1'])){
        $pass1 = sha1($_POST['password']);
        $pass2 = sha1($_POST['password1']);
        if($pass1 !== $pass2){
          $formErrors[] = 'Sorry password is not match';
        }
      }

      if(isset($email)){
        $filteremail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($filteremail, FILTER_VALIDATE_EMAIL) != true){
          $formErrors[] = 'This email is not valid';
        }
      }
      if(empty($formErrors)){

        $check = checkItem("username", "users", $user);
        if($check == 1){
          $formErrors[] ='This user is already exist';
        }else{
        $stmt = $con ->prepare("INSERT INTO
        users(username, password, email, FullName, Date )
        VALUES(:zuser, :zpass, :zmail, :zname, now() )");
        $stmt ->execute( array(
            'zuser' => $username,
            'zpass' => sha1($password),
            'zmail' => $email,
            'zname' => $fullname
        ));
        $succesMsg = 'You are now a member';
      }  
    };
    }}

      ?>
            <br><br>
            <br>
            <br><br><div class="text">
          <p>Register or log in and start your shooping</p></div>
     <div id='login-form' class='login-page'>
       <div class="form-box">
         <div class="button-box">
          <div id="btn">
          </div>
          <button type="button" class="t-b" onclick="login()" >Log in</button>
          <button type="button" class="t-b" onclick="register()">Register</button>
      </div>
        <form id="login" class="input-group" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <input type="text" name='user' class="input-field" placeholder="username" required = "required">
          <input type="password" name='pass' class="input-field" placeholder="password" required = "required">
          
          <button type="submit" name="login" class="submit-btn">Login</button>
          </form>

          <!--registration form-->
          <form id="register" class="input-group" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

              <input type="text" name='FullName' class="input-field" placeholder="Full Name" required = "required">
              <input pattern=".{3,}" title="Username can not be less than 4 characters." type="text" name='user' class="input-field"  placeholder="Username" required = "required">
              <input type="text"  name='email' class="input-field"  placeholder="Email"  required = "required">
              <input type="password" name="password" class="input-field" placeholder="Enter password"   required = "required">
              <input type="password" name="password1" class="input-field" placeholder="Confirm password"   required = "required">
              <button type="submit"  name="signup" class="submit-btn"> Save</button>
          </form>
    </div>
    <div class="errors">
      <?php 
      if(!empty($formErrors)){
        foreach($formErrors as $error){
          echo '<div class="msgerror">' . $error . '</div>';
        }
      }if(isset($succesMsg)){
        echo '<div class="msgsuccess">' . $succesMsg . '</div>';
      }
      ?>
    </div>
   </div>
   <?php
        include 'footer.php';
        ?>
  </div>
<?php ob_end_flush(); ?>
<style>
  *{
    font-family: cursive;
  }
  .text p{
  padding: 10px;
  text-align: center;
  position: relative;
  
  text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 4px;
  overflow: hidden;
  background:linear-gradient(to right,#3b98b7,#6495ed);
  background-repeat: no-repeat;
  background-size: 80%;
  animation: animate 6s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255, 255, 255, 0);
    }

@keyframes animate {
  0% {
    background-position: -500%;
  }
  100% {
    background-position: 500%;
  }
}
*{
    margin: 0;
    padding: 0;
    font-family: spartan sans-serif;
    box-sizing: border-box;
}
body{
    top: 0;
    height: 100%;
    width: 100%;
    /*background-position: center;
    background-size: cover;
    position: absolute;*/
    background-color: #eee;
    
}
.text{
    text-align: center;
    color: black;
    margin-top: 10px;
}
.form-box{
    width: 400px;
    height: 500px;
    position: relative;
    margin: 6% auto;
    background-color: #d9d9d9;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px) ;
   /* padding: px;*/
    overflow: hidden;
}.errors{
  max-width: 400px;
  margin: auto;
  margin-top:0px;
}.errors .msgerror{
  padding: 10px;
  text-align: left;
  border-left: 5px solid #cd6858;
  background-color: #fff;
  margin-bottom: 10px;
  border-right: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  color: #919191;
}.errors .msgerror{
  border-left: 5px solid #cd6858;
}.errors .msgsuccess{
  padding: 10px;
  text-align: left;
  border-left: 5px solid green;
  background-color: #fff;
  margin-bottom: 8px;
  border-right: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  color: #919191;}.errors .msgsuccess{
  border-left: 5px solid green;
}
.button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #6b5d571f;
    border-radius: 30px;
}
.t-b{
    padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
    
}#btn{
    top: 0;
    left: 0;
    position: absolute;
    width: 120px;
    height: 100%;
    background:linear-gradient(to right,#3b98b7,#6495ed);
    border-radius: 40px;
    transition: .5s ;
}#btn{
  background:linear-gradient(to right,#3b98b7,#6495ed);
}
.input-group{
    top: 120px;
    position: absolute;
    width: 280px;
    transition: .5s;
}
.input-field{
    width: 100%;
    padding: 10px 0;
    margin: 5px 0;
    border-left: 0;
    border-top: 0;
    border-right: 0;
    border-bottom: 1px solid grey;
    outline: none;
    background: transparent;
}
.submit-btn{
    width: 85%;
    padding:  10px 30px;
    cursor: pointer;
    display: block;
    margin: 20px;
    border: 0;
    outline: none;
    border-radius: 40px;
}.submit-btn{
  background:linear-gradient(to right,#3b98b7,#6495ed);
}
.chech-box{
    margin: 30px 10px 30px 0;
}
fa a{
    color: grey;
}
fa{
    color: grey;
    font-size: 12px;
    bottom: 68px;
    position: absolute;
}
#login{
    left: 50px;
}

#register{
    left: 450px;
}

</style>
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");

          function register(){
           x.style.left ="-400px";
           y.style.left ="50px";
           z.style.left ="110px";
          }

           function login(){
           x.style.left ="50px";
           y.style.left ="450px";
           z.style.left ="0";}
        </script>
        
</body>
</html>
