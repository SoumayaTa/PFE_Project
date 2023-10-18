

<body>
  <div class="container">
    <div class="login-header">
      <div class="navigate-option">
        <button id="loginbtn">Login</button>
        <button id="registerBtn">Register</button>
      </div>
      <div class="social-icon">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-google"></i>
        <i class="fab fa-twitter"></i>
      </div>
    </div>
    <div class="login-main">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password"> 
      <input type="checkbox" id="chkBox">Remember Password
    </div>
    <div class="login-footer">
      <button id="loginBtn">Login</button>
    </div>
  </div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap');
*{
  margin:0;
  padding:0;
  box-sizing: border-box;
   font-family: 'Open Sans',sans-serif;
}
body{
  min-height: 100vh;
  display:flex;
  justify-content: center;
  align-items: center;
  background: radial-gradient(#0597F2 , #05DBF2);
}
.container{
  background-color: #fff;
  border-radius: 12px;
  padding: 30px 30px 45px 30px;
  width: 400px;
  box-shadow: 4px 4px 9px 1px rgba(0,0,0,.1), -4px -4px 9px 1px rgba(255,255,255,.1);
}
.login-header{
  display:flex;
  flex-direction: column;
  border-bottom: 1px solid rgba(0,0,0,.05);
  margin: 10px 0px;
}
.navigate-option{
  margin-bottom: 25px;
  display:flex;
  justify-content: center;
}
.social-icon{
  margin-bottom: 18px;
  text-align:center;
}
.navigate-option > button:nth-child(2){
  width: 150px;
  background: white;
  box-shadow: 1px 1px 8px 1px rgba(0,0,0,.1);
  margin-left: -35px;
}
#registerBtn:focus{
  background-color: whitesmoke;
}
.navigate-option > button:nth-child(1){
  z-index: 100;
  box-shadow: 0px 0px 6px 1px lightblue;
}
.navigate-option > button{
  border:none;
  outline:none;
  width: 140px;
  background: linear-gradient(to right,#0597F2,#05DBF2);
  padding: 14px;
  text-align:center;
  border-radius: 50px;
  font-size: 18px;
  cursor:  pointer;
  transition: all .3s ease-in;
}
.social-icon > i{
  margin-right: 12px;
  background: linear-gradient(to right,#0597F2,#05DBF2);
  padding: 12px;
  border-radius: 50%;
  font-size: 18px;
  color:white;
  width: 45px;
  cursor:pointer;
}

/* Login Main */

.login-main{
  margin-top: 40px;
}
input[type="text"]{
  outline: none;
  border:none;
  border-bottom: 1px solid rgba(0,0,0,.1);
  margin-bottom: 24px;
  font-size:16px;
  width: 100%;
  padding: 5px;
}
input[type='password']{
  outline: none;
  border:none;
  font-size: 16px;
  margin-bottom: 24px;
  width: 100%;
  border-bottom: 1px solid rgba(0,0,0,.1);
  padding: 5px;
}
input[type='checkbox']{
  margin-top: 8px;
  margin-right: 10px;
}
#chkBox{
  line-height: 1.5;
}

/* Login Buttons */

.login-footer{
  margin-top: 30px;
  text-align:center;
}
#loginBtn{
  background: linear-gradient(to right,#0597F2,#05DBF2);
  outline:none;
  border:none;
  padding:12px;
  width: 250px;
  border-radius: 50px;
  font-size: 18px;
  cursor: pointer;
  box-shadow: 0px 0px 6px 1px lightblue;
  width: 100%;
  color: white;
}
  </style>
</body>