<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">  
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

   
</head>
<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><i class="fas fa-hiking"></i> SheShop.</span>

            <div class="menu">
                <div class="logo-toggle">
                    
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="product.php">shop</a></li>
                    <li><a href="cat.php">Categories</a></li>
                    <li><a href="contact us1.php">Contact us</a></li>
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    
                </div>

                    <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div></div>

                    <a href="login.php"><div class="login-btn" ><i class="fas fa-heart"></i> </div></a>
                    <a href="cart.php"><div class="cart-btn" ><i class="fas fa-shopping-cart"></i></div></a>
                    <div class="sub-menus"><a href="#"><i class="fas fa-user"></i></a>
                <ul>
                    <li><a href="profile.php"><i class="fa fa-address-card"></i>  Profile</a></li>
                    <li><a href="members1.php?do=Edit&userid=<?php echo $_SESSION['ID']?>"> <i class="fa fa-edit"></i> Edit profile</a></li>
                   
                    <li><a href="#"><i class="fa fa-heart"></i>  Wishlist</a></li>
                    <li><a href="#"><i class="fa fa-box"></i>  Comandes</a></li>
                     <li><a href="logout.php"> <i class='bx bx-log-out icon' ></i> logout</a></li>
                </ul>
</div>
                    
                </div>
            
        </div>
    </nav>

<script>

const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});

</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: spartan, sans-serif;
    transition: all 0.4s ease;;
}.darkLight-searchBox .sub-menus ul {
    position: absolute;
    top: 47px;
    background-color: #fff;
    padding: 5px 0px;
    min-width: 150px;
    box-shadow: 0px 0px 8px #636363;
    border-radius: 4px;
    display: none;
    list-style: none;
    align-items: center;
    font-weight: bolder;
}
.darkLight-searchBox .sub-menus:hover ul {
    display: block;
}
.darkLight-searchBox .sub-menus ul li {
    padding: 5px 0px;
}
.darkLight-searchBox .sub-menus ul li a {
    padding: 8px 10px;
    display: block;
    color: #666;
    text-decoration: none;
   
        
   
}.darkLight-searchBox .sub-menus{
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 5px;
    display: flex;
    color: #666;

}
.darkLight-searchBox .sub-menus ul li:hover a {
    color: #bac34e;
}
.darkLight-searchBox .sub-menus ul::before {
    content: "";
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
    position: absolute;
    top: -15px;
}


/* ===== Colours ===== */

:root{
    --body-color: #E4E9F7;
    --nav-color: #4070F4;
    --side-nav: #fff;
    --search-bar: #F2F2F2;
    --search-text: #010718;
}


nav{
    position: fixed;
    top: 0;
    left: 0;
    height: 70px;
    width: 100%;
  
    z-index: 100;
    background: #fff;
  
 
    
}

body.dark nav{
    border: 1px solid #393838;

}

nav .nav-bar{
    position: relative;
    height: 100%;
    max-width: 1000px;
    width: 100%;
    background-color: var(--nav-color);
    margin: 0 auto;
    padding: 0 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
  
 
}

nav .nav-bar .sidebarOpen{
    color: var(--text-color);
    font-size: 25px;
    padding: 5px;
    cursor: pointer;
    display: none;
}

nav .nav-bar .logo {
    text-decoration: none;
    font-size: 2rem;
    font-weight: bolder;
    color: #666;
}nav .nav-bar .logo i{
    color: #bac34e;
 padding-right: .2rem;
}

.menu .logo-toggle{
    display: none;
}

.nav-bar .nav-links{
    display: flex;
    align-items: center;
        color: #666;
}

.nav-bar .nav-links li{
    margin: 0 5px;
    list-style: none;
}

.nav-links li a{
    position: relative;
    font-size: 18px;
    font-weight: 400;
    color: #666;
    text-decoration: none;
    padding: 10px;
}.nav-bar .nav-links li a:hover{
    color:#bac34e;
}

.nav-links li a::before{
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background-color: var(--text-color);
    opacity: 0;
    transition: all 0.3s ease;
}

.nav-links li:hover a::before{
    color: #bac34e;
}

.nav-bar .darkLight-searchBox{
    display: flex;
    align-items: center;
}

.darkLight-searchBox .dark-light,
.darkLight-searchBox .searchToggle,
.darkLight-searchBox .cart-btn,
.darkLight-searchBox .login-btn{
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 5px;
    display: flex;
    color: #666;
}.darkLight-searchBox .dark-light:hover,
.darkLight-searchBox .searchToggle:hover,
.darkLight-searchBox .cart-btn:hover,
.darkLight-searchBox .login-btn:hover{
color: #bac34e;
}
.darkLight-searchBox a{
    color: #666;
}

.dark-light i,
.searchToggle i,
.cart-btn i,
.login-btn i{
    position: absolute;
    display: flex;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dark-light i.sun{
    opacity: 0;
    pointer-events: none;
}

.dark-light.active i.sun{
    opacity: 1;
    pointer-events: auto;
}

.dark-light.active i.moon{
    opacity: 0;
    pointer-events: none;
}

.searchToggle i.cancel{
    opacity: 0;
    pointer-events: none;
}

.searchToggle.active i.cancel{
    opacity: 1;
    pointer-events: auto;
}

.searchToggle.active i.search{
    opacity: 0;
    pointer-events: none;
}

.searchBox{
    position: relative;
}

.searchBox .search-field{
    position: absolute;
    bottom: -85px;
    right: 5px;
    height: 50px;
    width: 300px;
    display: flex;
    align-items: center;
    background-color: #219150;
    padding: 3px;
    border-radius: 6px;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
}

.searchToggle.active ~ .search-field{
    bottom: -74px;
    opacity: 1;
    pointer-events: auto;
}

.search-field::before{
    content: '';
    position: absolute;
    right: 14px;
    top: -4px;
    height: 12px;
    width: 12px;
    background-color:#219150;
    transform: rotate(-45deg);
    z-index: -1;
}

.search-field input{
    height: 100%;
    width: 100%;
    padding: 0 45px 0 15px;
    outline: none;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 400;
    color: #219150;
    background-color: var(--search-bar);
}

body.dark .search-field input{
    color: var(--text-color);
}

.search-field i{
    position: absolute;
    color: #219150;
    right: 15px;
    font-size: 22px;
    cursor: pointer;
}

body.dark .search-field i{
    color: #219150;
}

@media (max-width: 790px) {
    nav .nav-bar .sidebarOpen{
        display: block;
    }

    .menu{
        position: fixed;
        height: 100%;
        width: 320px;
        left: -100%;
        top: 0;
        padding: 20px;
        background-color: var(--side-nav);
        z-index: 100;
        transition: all 0.4s ease;
    }

    nav.active .menu{
        left: -0%;
    }

    nav.active .nav-bar .navLogo a{
        opacity: 0;
        transition: all 0.3s ease;
    }

    .menu .logo-toggle{
        display: block;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo-toggle .siderbarClose{
        color: var(--text-color);
        font-size: 24px;
        cursor: pointer;
    }

    .nav-bar .nav-links{
        flex-direction: column;
        padding-top: 30px;
    }

    .nav-links li a{
        display: block;
        margin-top: 20px;
    }
}

</style>
</body>
</html>