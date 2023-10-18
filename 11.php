<!DOCTYPE html>
<html lang="en">
<head>
  <title>How To create a responsive header HTML with Bootstrap 4</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<!-- Header section -->
<header>
  <button class="menu-toggle">
    <i class="fa fa-bars" aria-hidden="true"></i>
    <i class="fa fa-times" aria-hidden="true"></i>
  </button>
</header>

<!-- Sidebar Navigation -->
<div class="side-menu"> 
  <ul>
    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-tablet" aria-hidden="true"></i> Devices</a></li>
    <li><a href="#"><i class="fa fa-fire" aria-hidden="true"></i> Trending</a></li>
    <li><a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> Library</a></li>
    <li><a href="#"><i class="fa fa-play" aria-hidden="true"></i> Apps & Games</a></li> 
    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Favorites</a></li>
    <li><a href="#"><i class="fa fa-code" aria-hidden="true"></i> App Development</a></li>
    <li><a href="#"><i class="fa fa-android" aria-hidden="true"></i> Android Lounge</a></li>
    <li><a href="#"><i class="fa fa-car" aria-hidden="true"></i> Automotive</a></li>
    <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Help</a></li>
    <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i> Settings</a></li>
  </ul>
</div>

<style>
body{
  margin: 0;
  padding: 0;
  font-family: arial;
  background-color: #f5f5f5;
}
header {
    background-color: #2196F3;
    padding: 15px 20px;
    position: absolute;
    z-index: 99999;
    width: 100%;
    box-sizing: border-box;
}
header button.menu-toggle {
    background: transparent;
    border: none;
    color: #fff;
    font-size: 24px;
    cursor: pointer;
    padding: 0px;
}
.menu-toggle i.fa.fa-times {
    display: none;
}
.side-menu {
    background-color: #fff;
    width: 250px;
    position: absolute;
    left: -250px;
    height: 100%;
    border-right: 1px solid #eee;
    box-shadow: 0px 0px 4px 1px #c1c1c1;
    padding: 60px 0px 20px;
    box-sizing: border-box;
    overflow: auto;
    position: fixed;
    z-index: 100;  
}
.side-menu ul {
    margin: 0;
    padding: 0;
}
.side-menu ul li {
    list-style: none;
    position: relative;
}
.side-menu ul li a {
    color: #607D8B;
    font-size: 17px;
    padding: 14px 10px 14px 45px;
    text-decoration: none;
    display: block;
    transition: 0.4s;
}
.side-menu ul li a:hover{
  background-color: #f5f5f5;
}
.side-menu ul li a i {
    position: absolute;
    left: 15px;
}
</style>
<script>
$(document).ready(function(){
  $(".menu-toggle i").click(function(){
    $(".side-menu").css({
      left: '0px',
      transition: '0.5s'
    });
    $(".menu-toggle i.fa-bars, .menu-toggle i.fa-times").toggle();
  });
  $(".menu-toggle i.fa-times").click(function(){
    $(".side-menu").css({
      left: '-250px',
    });
  });
});
</script>
</body>
</html>