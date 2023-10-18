<!DOCTYPE html>
    <head>
        <meta charset="UTF-8"/>
        <title>header</title>
        <link rel="stylesheet" href="css/styleh.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    </head>
    <body>
    <div class="header">
     <h2 class="logo"><i class="fas fa-hiking"></i> SheShop.</h2>
            <div class="navbar">
                 <a href="main.php"> <i class="fas fa-home"></i> Home</a>
                 <a href="shop.php"> <i class="fas fa-shop"></i> Shop</a>
                 <a href="About.php"> <i class="fas fa-users"></i> About</a>
                 <a href="Package.php"><i class="fas fa-box"></i> Package</a>
                 <a href="contact us1.php"><i class="fas fa-phone-office"></i> Contact us</a>
            </div>
            <div class="icons">
            
            <div id="search-btn" class="fas fa-search"></div>
            <div id="cart-btn" class="fas fa-shopping-cart"></div>
            <a href="login.php"><div id="login-btn" class="fas fa-user"></div></a>
        <form action="" class="search-form">
         <input type="search" placeholder="search here..." id="search-box">
         <label for="search-box" class="fas fa-search"></label>
        </form>
        
    </div>
            
</div>
<script>let searchForm = document.querySelector('.header .icons .search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    cart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}</script>
<style>
    .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  background: #fff;
  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: sticky;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: .9rem 4%;
 
}
.header .logo {
    font-size: 2.2rem;
    font-weight: bolder;
    color: #666;
  }
 .logo i {
 color: #bac34e;
 padding-right: .2rem;
}
.header .navbar a {
 font-size: 1.2rem;
 color: #666;
 margin: 0 1rem; 
 text-decoration: none;
 text-transform: uppercase;
}
.header .navbar a:hover {
    color: #bac34e;
  }
  .header .icons div {
    font-size: 1.2rem;
    margin-left: 1.7rem;
    cursor: pointer;
    color: #666;
  }
  
  .header .icons div:hover {
    color: #bac34e;
  }
  
  .header .search-form {
    position: absolute;
    top: -150%;
    right: 1rem;
    width: 30rem;
    border-radius: .3rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
     align-items: center;
    height: 4.5rem;
    -webkit-box-shadow: 0 0.5rem .3rem rgba(0, 0, 0, 0.1);
    box-shadow: 0 0.5rem .3rem rgba(0, 0, 0, 0.1);
    background: var(--main-color);
  }
  
  .header .search-form.active {
    top: 150%;
  }
  
  .header .search-form input {
    height: 70%;
    width: 100%;
    padding: 0 1rem;
    font-size: 1rem;
    color: #222;
    text-transform: none;
    border-radius: 50px;
    border: 0;
  }
  
  
  .header .search-form label {
    font-size: 1.5rem;
    margin-right: 2rem;
    cursor: pointer;
    color: #666;
  }
  @-webkit-keyframes fadeLeft {
    0% {
      -webkit-transform: translateX(-5rem);
              transform: translateX(-5rem);
      opacity: 0;
    }
  }
  
  @keyframes fadeLeft {
    0% {
      -webkit-transform: translateX(-5rem);
              transform: translateX(-5rem);
      opacity: 0;
    }
  }
  
  @-webkit-keyframes fadeUp {
    0% {
      -webkit-transform: scale(0.5);
              transform: scale(0.5);
      opacity: 0;
    }
  }
  
  @keyframes fadeUp {
    0% {
      -webkit-transform: scale(0.5);
              transform: scale(0.5);
      opacity: 0;
    }
  }
  
  .header .search-form label:hover {
    color: #bac34e;
  }
  


</style>
<script src="script2.js"></script>
</body>
</html>