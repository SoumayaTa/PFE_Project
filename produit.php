<?php
session_start();
$username = $_SESSION['username'];
include 'connect.php';
include 'functions.php';
include 'h.php';

?>
<?php

@$conn=mysqli_connect("localhost","root","","notreshop");

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message = 'product already added to cart';
   }else{
      $insert_product = ( "INSERT INTO cart(idC, name, price, image, quantity)VALUES ('1','$product_name', '$product_price', '$product_image', '$product_quantity')");
      mysqli_query($conn,$insert_product)or die(mysqli_error($conn));
      $message = 'product added to cart successfully';
   }

}
if(isset($_POST['add_to_wishlist'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_wishlist) > 0){
      $message = 'product already added to wishlist';
   }else{
      $insert_product =("INSERT INTO wishlist(Member_name, name, price, image)VALUES ('$username','$product_name','$product_price','$product_image')");
      mysqli_query($conn,$insert_product) or die(mysqli_error($conn));
      $message = 'product added to wishlist successfully';
   }}
  ?>
<br>
<br>
<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>PRODUCTS</title>
</head>
<body>
<div class="title"><h1> <span>Products</span></h1></div>

    <style>
      .ctr{
        z-index: 2;
      }
.popup2{
  width:400px;
  HEIGHT:200px;
  background: #fff;
  border-radius: 6px;
  border:1px solid #eee;
  position:absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1);
  text-align: center;
  padding: 0 30px 30px;
  color: #333;
  
  transition: transform 0.4s, top 0.4s;
}.popup2 h2{
  font-size:38px;
  font-weight:500;
  margin: 30px 0 10px;
}.popup2 button{
  width:100%;
  margin-top:50px;
  padding:10px 0;
  background: #bac43e;
  color:#fff;
  outline: none;
  font-size: 18px;
  border-radius:4px;
  cursor:pointer;
  box-shadow:0 2px 5px rgba(0,0,0,0.2);
}
    </style>
  <div class="gallery">
  <?php 
   if(isset($message)){?>
   <div class="ctr">
    <div class="popup2" id="popup2">
      
      <h2>Good!</h2>
      <?php echo '<p>'.$message.'</p>';?>
      <button type = "button">OK </button>
    </div></div>
    <script>
       document.getElementById("popup2").onclick = function(){
        document.getElementById("popup2").style.display ="none";
       }
      
    </script><?php } ?>
 <?php foreach(getItems($_GET['catid']) as $item){?>
  
    <div class="content"><?php
       echo"<img src ='jennate/" . $item['picture'] ."' alt =''/>";?>
<h4 ><?= $item['Name'] ?></h4>
<h3><?= $item['Price'] ?>DH</h3>
<ul class="product-links">
    <li><a href="#"  name = "add_to_wishlist"><i class="fa fa-heart" style = "color:#ff878d;"></i></a></li>
    <li><a href=""  name = "add_to_cart"><i class="fa fa-shopping-cart" style = "color:#3b98b7;"></i></a></li>
</ul>
<button class=" buy"><i class="fa fa-search" style="color:#fff;"></i> Quick View </button>
        </div>
        <form action="" method="POST">
        <div class="popup-view"><br>
        <br>
          <div class="popup-card">
            <a><i class="fas fa-times close-btn"></i></a>
            <div class="product-img">
              <img src="jennate/<?= $item['picture'] ?>">
            </div>
            
            <div class="info">
              <h2><?= $item['Name'] ?></h2>
              <p><?= $item['Description'] ?></p>
              <span class="price"><?= $item['Price'] ?>DH</span>
              <br><ul>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star checked"></i></li>
    <li> <i class="fa fa-star"></i></li>
</ul>
            <input type="hidden" name="product_id" value="<?= $item['item_ID'] ?>">
            <input type="hidden" name="product_name" value="<?= $item['Name'] ?>">
            <input type="hidden" name="product_price" value="<?= $item['Price'] ?>">
            <input type="hidden" name="product_image" value="<?= $item['picture'] ?>">
            <br>
              <input type="submit" class="add-cart-btn" value="Add to Cart" name="add_to_cart">
              <input type="submit" class="add-cart-btn2" value="Add to wishlist" name="add_to_wishlist">
            </div>

          </div>
 </form>
        </div>
        
<?php } ?>
</div>
<?php
include 'footer.php';
?>
 <script type="text/javascript">
    var popupViews = document.querySelectorAll('.popup-view');
    var popupBtns = document.querySelectorAll('.buy');
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
<style>
body{
     margin: 0;
     background: #f2f2f2;
     overflow-x: hidden;
     font-family: cursive;
}
h3{
     text-align: center;
     font-size: 30px;
     margin: 0;
     padding-top: 45px;
}a{
     text-decoration: none;
}.gallery{
     display: flex;
     flex-wrap: wrap;
     width: 100%;
     justify-content: center;
     align-items: center;
     margin: 50px 0;
     gap:15px;
}.content{
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
}.gallery .popup-view{
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
}.gallery .popup-view.active{
  opacity: 1;
  visibility: visible;
}.gallery .popup-card{
  position: relative;
  display: flex;
  width: 800px;
  height: 530px;
  margin: 20px;
}.gallery .popup-card .product-img{
  z-index: 2;
  background: #b7b3b3;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50%;
  height: 90%;
  transform: translateY(25px);
  border-top-left-radius: 40px;
  border-bottom-left-radius: 40px;
}.gallery .popup-card .product-img img{
  z-index: 2;
  position: relative;
  width: 400px;
  height:350px;
  left: -45px;
}.gallery .popup-card .info{
  z-index: 2;
  background: #fff;
  display: flex;
  flex-direction: column;
  width: 55%;
  height: 100%;
  box-sizing: border-box;
  padding: 40px;
  border-radius: 20px;
}.gallery .popup-card .close-btn{
  color: #555;
  z-index: 3;
  position: absolute;
  right: 0;
  font-size: 20px;
  margin: 20px;
  cursor: pointer;
}.gallery .popup-card .info h2{
  font-size: 30px;
  line-height: 20px;
  margin: 10px;
}.gallery .popup-card .info h2 span{
  font-size: 15px;
  text-transform: uppercase;
  letter-spacing: 2px;
}.gallery .popup-card .info p{
  font-size: 15px;
  margin: 10px;
}.gallery .popup-card .info .price{
  font-size: 45px;
  font-weight: 300;
  margin: 10px;
}.gallery .popup-card .info .add-cart-btn{
  color: #fff;
  background: #3b98b7;
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
}.gallery .popup-card .info .add-cart-btn3{
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
}.gallery .popup-card .info .add-cart-btn2{
  color: #fff;
  background: #ff878d;
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
}.gallery .popup-card .info .add-cart-btn:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.gallery .popup-card .info .add-cart-btn2:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.gallery .popup-card .info .add-cart-btn3:hover{
    background: #555;
    transform: translateY(-7px);
    color: #fff;
    box-shadow: 0px 10px 25PX rgba(46, 223, 229, 0.445);
}.gallery .popup-card .info .add-wish{
  color: #009DD2;
  font-size: 16px;
  text-align: center;
  font-weight: 600;
  text-transform: uppercase;
}.content:hover{
     box-shadow:0 3px 6px rgba(0,0,0,0.16),
     0 3PX 6PX RGBA(0,0,0,0.23);
     transform: translate(0px,-8px,);
}img{
     width: 200px;
     height: 200px;
     text-align: center;
     margin: 0 auto;
     display: block;
}h4{
     text-align: center;
     color: #b2bec3;
     /*padding-top: 0 8px;*/
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
}.checked{
     color: #3b98b7;
}.fa:hover{
     transform: scale(1.3);
     transition: .6s;
}button{
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
}.buy{
     background: #3b98b7;
     padding-top: 4px;
     padding-bottom: 4px;
}@media(max-width:1000px){
     .content{
         width: 50%;
     }
}@media(max-width:750px){
     .content{
         width: 100%;
     }
}.title h1{        
         -webkit-box-align: center;
             -ms-flex-align: center;
                 align-items: center;
         font-size: 3rem;
         margin-bottom: 3rem;
         padding: 1.2rem 0;
         border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
         color: #222;
         text-align: center;
}a{
          text-decoration: none;
}.title span {
      color: #3b98b7;
      padding-left: .7rem;
} .content .product-links{
    padding: 0;
    margin: 0;
    list-style: none;
    bottom: 7px;
    right: -50px;
}.product-links li{
    margin: 0 0 4px;
    transform: translateX(300px);
    transition: all 0.5s ease 0s;
}.content:hover .product-links li{ transform: translateX(0); }
.content:hover .product-links li:nth-child(2){ transition-delay: 0.1s; }
.content:hover .product-links li:nth-child(3){ transition-delay: 0.2s; }
.content .product-links li:last-child{ margin: 0; }
.content .product-links li a{
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
}
.content .product-links li a:before,
.content .product-links li a:after{
    
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
}.content.product-links li a:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    border-radius: 0;
    transform: translateY(-50%) rotate(45deg);
    right: 58px;
    z-index: -1;
}.content .product-links li a:hover:before,
.content .product-links li a:hover:after{
    visibility: visible;
}.content .product-links li a:hover:before{ right: 55px; }
.content .product-links li a:hover:after{ right: 53px; }
.content .product-links li a i{
    color: #666;
}@media (max-width: 900px){
  .gallery .popup-card{
    flex-direction: column;
    width: 550px;
    height: 50%;
  }.gallery .popup-card .product-img{
    z-index: 3;
    width: 100%;
    height: 200px;
    transform: translateY(0);
    border-bottom-left-radius: 0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }.gallery .popup-card .product-img img{
    left: initial;
    max-width: 100%;
  }.gallery .popup-card .info{
    width: 100%;
    height: auto;
    padding: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }.gallery .popup-card .info h2{
    margin: 20px 5px 5px 5px;
    font-size: 25px;
  }.gallery .popup-card .info h2 span{
    font-size: 10px;
  }.gallery .popup-card .info p{
    margin: 5px;
    font-size: 13px;
  }.gallery .popup-card .info .price{
    margin: 5px;
    font-size: 30px;
  }.gallery .popup-card .info .add-cart-btn{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.gallery .popup-card .info .add-cart-btn2{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.gallery .popup-card .info .add-cart-btn3{
    margin: 5px auto;
    padding: 5px 40px;
    font-size: 14px;
  }.gallery .popup-card .info .add-wish{
    font-size: 14px;
  }.gallery .popup-card .close-btn{
    z-index: 4;
  }
}
</style>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
