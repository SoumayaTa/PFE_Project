<?php
include 'connect.php';
include 'h.php';
?>
<div class="c5">
  <div class="login-to">
    <section class="to">
      <h3>Don't Have an Account?</h3>
      <p>Sign up now and get access to fun new features</p>
      <button class="btn-to" type="button">Sign Up</button>
    </section>
    <section class="to">
      <h3>Have an Account?</h3>
      <p>Login and get back into the fun</p>
      <button class="btn-to" type="button">Login</button>
    </section>
  </div>
  <div id="SL">
    <div class="login-signup">
      <form id="sf" action="javascript:void(0);">
        <h2>Sign Up</h2>
        <input type="text" placeholder="Full Name">
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <button type="button">Sign Up</button>
      </form>
      <form id="lf" action="javascript:void(0);">
        <h2>Login</h2>
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <div>
          <a href="#">Forgot password?</a>
          <button type="button">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
    * {
  padding: 0;
  margin: 0;
  font-family: Open Sans;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('https://cdn.traveler.es/uploads/images/thumbs/201331/vegetacion_del_mundo_872112820_1200x797.jpg');
  background-position: center;
  background-size: cover;
}

h2, h3 {
  letter-spacing: 1px;
  line-height: 1.6em
}

p {
  line-height: 1.2em;
  margin: 10px 0;
}

.c5 {
  position: relative;
}

button {
  width: 100px;
  padding: 7px 0;
  margin-top: 10px;
  background: none;
  border: 1px solid #ddd;
  border-radius: 4px;
  color: #ddd;
  outline: none;
  cursor: pointer;
}

.login-to {
  width: 800px;
  padding: 100px 60px;
  box-sizing: border-box;
  background: rgba(0,0,0,0.8);
  color: #ddd;
  border-radius: 2px;
  display: flex;
  justify-content: space-between;
  
}

.to {
  width: 250px;
}

.to:last-child {
  text-align: right;
}

#SL {
  position: absolute;
  top: -8%;
  left: 60px;
  width: 350px;
  height: 116%;
  background: #fefefe;
  border-radius: 2px;
  box-shadow: 0 2px 8px 1px rgba(0,0,0,0.2);
  overflow: hidden;
  transition: transform 400ms cubic-bezier(.87,-.41,.19,1.44);
}

#SL.tod {
  transform: translateX(330px);
}

.login-signup {
  width: 680px;
  height: 100%;
  display: flex;
  align-items: center;
  transition: transform 400ms cubic-bezier(.87,-.41,.19,1.44);
}

#SL.tod .login-signup {
  transform: translateX(-330px);
}

form {
  display: flex;
  flex-direction: column;
  width: 280px;
  padding: 40px;
}

form:last-child {
  padding-left: 0;
}

form h2 {
  margin-bottom: 20px;
  color: #59a07d;
}

form input {
  margin-bottom: 10px;
  padding: 7px 0;
  border: none;
  border-bottom: 1px solid #888;
  outline: none;
}

form button {
  margin-left: auto;
  background: #59a07d;
  color: hsl(150,10%,95%)
}

form div {
  display: flex;
  align-items: center;
}

form a {
  margin-top: 10px;
  text-decoration: none;
  font-size: 12px;
  color: #ccc;
}
</style>
<script>
    let btnto = Array.from(document.getElementsByClassName('btn-to'));

btnto.forEach(btn => {
  btn.addEventListener('click', () => {
    document.getElementById('SL').classList.to('tod');
  });
});
</script>