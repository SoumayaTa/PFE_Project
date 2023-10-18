

<?php

include 'connect.php';



if(isset($_SESSION['username'])){
   $user_id = $_SESSION['ID'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<?php include 'h.php'; ?>
<br>
<br>
<br>
<br>
<section class="products" style="padding-top: 0; min-height:100vh;">
   <div class="box-container">
   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = $con->prepare("SELECT * FROM `items` WHERE Name LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="" class="box">
      <img src="jennate/<?= $fetch_product['picture']; ?>" alt="">
      <div class="name"><?= $fetch_product['Name']; ?></div>
      <div class="price"><?= $fetch_product['Price'];?></div>
      <ul class="product-links">
    <li><a href="#" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
    <li><a href="" data-tip="Cart"><i class="fa fa-shopping-cart"></i></a></li>
     </ul>
     <input  type ="button" value="Quick view" class="btn">
   </form>
   <div class="popup-view"><br>
        <br>
          <div class="popup-card">
            <a><i class="fas fa-times close-btn"></i></a>
            <div class="product-img">
              <img src="jennate/<?= $fetch_product['picture']; ?>" alt="">
            </div>
            <div class="info">
              <h2><?= $fetch_product['Name']; ?></h2>
              <p><?= $fetch_product['Description'];?></p>
              <span class="price"><?= $fetch_product['Price'];?></span>
              <ul>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star"></i></li>
</ul>
              <a href="#" class="add-cart-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
              <a href="#" class="add-cart-btn2"><i class="fa fa-heart"></i> Add to Wishlist</a>
              <a href="#" class="add-cart-btn3"><i class="fa fa-comments"></i> Leave a comment</a>
            </div>
          </div>
        </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products found!</p>';
      }
   }
   ?>
   </div>
</section>
<?php include 'footer1.php'; ?>
<script type="text/javascript">
    var popupViews = document.querySelectorAll('.popup-view');
    var popupBtns = document.querySelectorAll('.btn');
    var closeBtns = document.querySelectorAll('.close-btn');
    //javascript for quick view button
    var popup = function(popupClick){
      popupViews[popupClick].classList.add('active');
    }
    popupBtns.forEach((popupBtn, i) => {
      popupBtn.addEventListener("click", () => {
        popup(i);
      });
    });
    //javascript for close button
    closeBtns.forEach((closeBtn) => {
      closeBtn.addEventListener("click", () => {
        popupViews.forEach((popupView) => {
          popupView.classList.remove('active');
        });
      });
    });
    </script>
<style>.box-container .popup-view{
  z-index: 2;
  background: var(--main);
  position: fixed;
  top: 1;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
  transition: 0.5s;
}.box-container .popup-view.active{
  opacity: 1;
  visibility: visible;
}.box-container .popup-card{
  position: relative;
  display: flex;
  width: 800px;
  height: 530px;
  margin: 20px;
}.box-container .popup-card .product-img{
  z-index: 2;
  background: #AFA7BB;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50%;
  height: 90%;
  transform: translateY(25px);
  border-top-left-radius: 40px;
  border-bottom-left-radius: 40px;
}.checked{
     color: #bac34e;
}.box-container .popup-card .product-img img{
  z-index: 2;
  position: relative;
  width: 400px;
  left: -45px;
}.box-container .popup-card .info{
  z-index: 2;
  background: #fff;
  display: flex;
  flex-direction: column;
  width: 55%;
  height: 100%;
  box-sizing: border-box;
  padding: 40px;
  border-radius: 20px;
}.box-container .popup-card .close-btn{
  color: #555;
  z-index: 3;
  position: absolute;
  right: 0;
  font-size: 20px;
  margin: 20px;
  cursor: pointer;
}.box-container .popup-card .info h2{
  font-size: 40px;
  line-height: 20px;
  margin: 10px;
}.box-container .popup-card .info h2 span{
  font-size: 15px;
  text-transform: uppercase;
  letter-spacing: 2px;
}.box-container .popup-card .info p{
  font-size: 15px;
  margin: 10px;
}.box-container .popup-card .info .price{
  font-size: 45px;
  font-weight: 300;
  margin: 10px;
}.box-container .popup-card .info .add-cart-btn{
  color: #fff;
  background: #009DD2;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  margin: 10px auto;
  padding: 10px 50px;
  border-radius: 20px;
  box-shadow: 0px 8PX 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}.box-container .popup-card .info .add-cart-btn3{
  color: #fff;
  background: orange;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  margin: 10px auto;
  padding: 10px 50px;
  border-radius: 20px;
  box-shadow: 0px 8PX 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}.box-container .popup-card .info .add-cart-btn2{
  color: #fff;
  background: #c569c7;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  margin: 10px auto;
  padding: 10px 50px;
  border-radius: 20px;
  box-shadow: 0px 8PX 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}.box-container .popup-card .info .add-cart-btn:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.box-container .popup-card .info .add-cart-btn2:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.box-container .popup-card .info .add-cart-btn3:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.box-container .popup-card .info .add-wish{
  color: #009DD2;
  font-size: 16px;
  text-align: center;
  font-weight: 600;
  text-transform: uppercase;
}body{
  background-color: #f2f2f2;
  text-decoration: none ;
}.price{
  font-size: 40px;
  font-weight: 300;
  margin: 10px;
}.products .box-container{
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  justify-content: center;
  align-items: center;
  margin: 50px 0;
  gap:15px;
}ul{
     list-style: none;
     display: flex;
     justify-content: center;
     align-items: center;
     padding: 0;
}li{
     padding: 5px;
}.fa{
     font-size: 26px;
     transform: .4s;
     margin: 3px;
     color: #666;
}.fa:hover{
     transform: scale(1.3);
     transition: .6s;
}.products .box-container .box{
        overflow: hidden;
     width: 20%;
     margin: 0px;
     box-sizing: border-box;
     float: left;
     text-align: center;
     border-radius: 20px;
     cursor: pointer;
     box-shadow: 0 14px 28px rgba(0,0,0,0.25),
     0 10px 10px rgba(0,0,0,0.22);
     transition: .4s;
     background:#f2F2F2;
     position: relative;
     z-index:1;
}.products .box-container .box img{
    width: 200px;
     height: 200px;
     text-align: center;
     margin: 0 auto;
     display: block;
}.products .box-container .box:hover{
     box-shadow:0 3px 6px rgba(0,0,0,0.16),
     0 3PX 6PX RGBA(0,0,0,0.23);
     transform: translate(0px,-8px,);
 }.btn{
    text-align: center;
     font-size: 30px;
     color: #fff;
     width: 100%;
     padding-top:15px;
     border: 0;
     outline: none;
     cursor: pointer;
     margin-top: 1.5px;
     border-bottom-right-radius: 20px;
     border-bottom-left-radius: 20px;
     background-color: #bac34e;
}
.name{
    text-align: center;
     color: #b2bec3;
}.box .product-links{
    padding: 0;
    margin: 0;
    list-style: none;
    bottom: 7px;
    right: -50px;
}.box .product-links li{
    margin: 0 0 4px;
    transform: translateX(300px);
    transition: all 0.5s ease 0s;
}.box:hover .product-links li{ 
   transform: translateX(0); 
}.box:hover .product-links li:nth-child(2){
    transition-delay: 0.1s; 
   }.box:hover .product-links li:nth-child(3){
       transition-delay: 0.2s; 
}.box .product-links li:last-child{
    margin: 0;
 }.box .product-links li a{
    color: #000;
    background:var(--main);
    font-size: 20px;
    text-align: center;
    line-height: 48px;
    height:45px;
    width: 45px;
    border-radius: 50%;
    display: block;
    position: relative;
     transition: all 200ms ease 0s;
}.box .product-links li a:hover{ background: #bac34e; }
.box .product-links li a:before,
.box .product-links li a:after{
    content: attr(data-tip);
    color: #fff;
    background-color:  #bac34e;;
    font-size: 14px;
    line-height: 22px;
    border-radius: 0;
    padding: 8px 15px;
    border-radius: 5px;
    white-space: nowrap;
    transform: translateY(-50%);
    visibility: hidden;
    position: absolute;
    right: 60px;
    top: 50%;
    transition: all 0.3s ease;
}.box.product-links li a:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    border-radius: 0;
    transform: translateY(-50%) rotate(45deg);
    right: 58px;
    z-index: -1;
}.box .product-links li a:hover:before,
.box .product-links li a:hover:after{
    visibility: visible;
}.box .product-links li a:hover:before{ right: 55px; }
.box .product-links li a:hover:after{ right: 53px; }
.box .product-links li a i{
    color: #666;
}@media(max-width:1000px){
   .products .box-container .box{
         width: 50%;
     }
}@media(max-width:750px){
   .products .box-container .box{
         width: 100%;
     }
}@media (max-width: 900px){
  .box-container .popup-card{
    flex-direction: column;
    width: 550px;
    height: 50%;
  }.box-container .popup-card .product-img{
    z-index: 3;
    width: 100%;
    height: 200px;
    transform: translateY(0);
    border-bottom-left-radius: 0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }.box-container .popup-card .product-img img{
    left: initial;
    max-width: 100%;
  }.box-container .popup-card .info{
    width: 100%;
    height: auto;
    padding: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }.box-container .popup-card .info h2{
    margin: 20px 5px 5px 5px;
    font-size: 25px;
  }.box-container .popup-card .info h2 span{
    font-size: 10px;
  }.box-container .popup-card .info p{
    margin: 5px;
    font-size: 13px;
  }.box-container .popup-card .info .price{
    margin: 5px;
    font-size: 30px;
  }.box-container .popup-card .info .add-cart-btn{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.box-container .popup-card .info .add-cart-btn2{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.box-container .popup-card .info .add-cart-btn3{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.box-container .popup-card .info .add-wish{
    font-size: 14px;
  }.box-container .popup-card .close-btn{
    z-index: 4;
  }
}
</style>
</body>
</html>