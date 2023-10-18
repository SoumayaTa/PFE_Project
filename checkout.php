
<?php
ob_start();
session_start();
include 'connect.php';
include 'h.php';

@$conn=mysqli_connect("localhost","root","","notreshop");
if(isset($_SESSION['username'])){
   $username = $_SESSION['username'];                        
if(isset($_POST['order_btn'])){
   
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $method = $_POST['method'];
   $pin = $_POST['pin'];
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $stmt = $con->prepare( "SELECT orders.*, users.username
   AS Member_name
   FROM orders
   INNER JOIN users
   ON users.username = orders.Member_name");
    
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
         $subto = $price_total - 25;
         $lastto = $subto + 10;
      };
   };
   $total_product = implode(', ',$product_name);
   $detail_query =("INSERT INTO orders(Member_name, name, number, email, street, city, country, total_products, total_price, method, pin, date, statut)VALUES ('$username','$name','$number','$email','$street','$city','$country','$total_product','$lastto','$method','$pin', now(), '0')");
   mysqli_query($conn,$detail_query) or die(mysqli_error($conn));
   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         
         <div class='customer-details'>
            <p> Mr/Ms.<span>".$name."</span>. </br>Your order has been successfully sent!</p>
         </div>
         <div class='display-order'>
         <span><img src=jennate\amana.jpg><p>Guaranteed delivery after 10 days</p></span>
         </div>
            <a href='shop.php' class='btn' style =' display: block;
            width: 100%;
            text-align: center;
            background-color: #3b98b7;
            color:#fff;
            font-size: 1.4rem;
            padding:1rem 2.5rem;
            border-radius: .5rem;
            cursor: pointer;
            margin-top: 1rem;'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
  <!-- <link rel="stylesheet" href="csss/style.css">-->

</head>
<body>
</br>
</br>
</br></br>
<div class="container">

<section class="checkout-form">

   <h1 class="heading">Shipping Address</h1>
   <style>
     .checkout-form h1{
         -webkit-box-align: center;
             -ms-flex-align: center;
                 align-items: center;
         font-size: 3rem;
         margin-bottom: 3rem;
         padding: 1.2rem 0;
         border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
         color: #3b98b7;
         text-align: center;
      }
   </style>

   <form action="" method="post">

  <div class="display-order">
   
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         $sub_total= 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><img src=jennate\<?php echo $fetch_cart['image']; ?>><p>x<?= $fetch_cart['quantity']; ?></p></span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> <div style="text-decoration-line: line-through; ">Total : <?= $grand_total; ?> DH </div></br>

   Sub Total :<?= $sub_total = $grand_total - 25;?> DH </br>shipping cost : 10 DH</br>
Total : <?= $lasttotal= $sub_total + 10;?> DH</span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span></span>
            <input type="text" placeholder="Full name" name="name" required>
         </div>
         <div class="inputBox">
            <span></span>
            <input type="number" placeholder="Phone number" name="number" required>
         </div>
         <div class="inputBox">
            <span></span>
            <input type="text" placeholder="Email" name="email" required>
         </div>
        
        
         <div class="inputBox">
            <span></span>
            <input type="text" placeholder="Adress line" name="street" required>
         </div>
         <div class="inputBox">
            <span></span>
            <input type="text" placeholder="City" name="city" required>
         </div>
         
         <div class="inputBox">
            <span></span>
            <input type="text" value ="Morocco" name="country" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
            </select>
         </div>

         <div class="inputBox">
            <span> </span>
            <input type="number" min="0" name="pin" placeholder="Pin code" >
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn" style=" display: block;
   width: 100%;
   text-align: center;
   background-color: #3b98b7;
   color:#fff;
   font-size: 1.4rem;
   padding:1rem 2.5rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;">
   </form>

</section>

</div>
<?php } else{
   header('Location: login.php');
   exit();
}?>
<script src="jss/script.js"></script>
   <style>/*
      

}.order-message-container .message-container .order-detail span.total{
   display: block;
   background: #bac34E;
   color:#fff;
}*/
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#3b98b7;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#f2F2F2;
   --dark-bg:rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid #999;
}.btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color: #3b98b7;
   color:#fff;
   font-size: 1.4rem;
   padding:1rem 2.5rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;
  
}.display-order span.grand-total{
   width: 50%;
   background-color: #3b98b7;
   color:var(--white);
   padding:1rem;
   margin-top: 1rem;
}.display-order span img{
   width: 100px;
   height: 100px;
   border-radius: 2px;
}.display-order span p{
   display: block;
   width: 100%;
   text-align: center;
   color:#000;
   font-size: 1.8rem;
   border: 3px solid #3b98b7;
   border-radius:3px;
   background-color: #3b98b7;
}

.btn:hover{
   background-color: #87ceeb;
}

*{
   font-family: cursive;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

html{
   
   overflow-x: hidden;
}.checkout-form img{
         width: 250px;
         height: 100px;
         float: left;
         border-radius: 5px;
      }

.container{
   max-width: 1200px;
   margin:0 auto;
   /* padding-bottom: 5rem; */
}

section{
   padding:2rem;
}



.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color: var(--blue);
   color:var(--white);
   font-size: 1.7rem;
   padding:1.2rem 3rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;
}

.option-btn:hover,
.delete-btn:hover{
   background-color: var(--black);
}

.option-btn i,
.delete-btn i{
   padding-right: .5rem;
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   margin-top: 0;
   background-color: var(--red);
}

.message{
   background-color: var(--blue);
   position: sticky;
   top:0; left:0;
   z-index: 10000;
   border-radius: .5rem;
   background-color: var(--white);
   padding:1.5rem 2rem;
   margin:0 auto;
   max-width: 1200px;
   display: flex;
   align-items: center;
   justify-content: space-between;
   gap:1.5rem;
}

.message span{
   font-size: 2rem;
   color:var(--black);
}

.message i{
   font-size: 2.5rem;
   color:var(--black);
   cursor: pointer;
}

.message i:hover{
   color:var(--red);
}

.header{
   background-color: var(--blue);
   position: sticky;
   top:0; left:0;
   z-index: 1000;
}

.header .flex{
   display: flex;
   align-items: center;
   padding:1rem 1.5rem;
   max-width: 1200px;
   margin:0 auto;
}

.header .flex .logo{
   margin-right: auto;
   font-size: 2.5rem;
   color:var(--white);
}

.header .flex .navbar a{
   margin-left: 2rem;
   font-size: 2rem;
   color:var(--white);
}

.header .flex .navbar a:hover{
   color:yellow;
}

.header .flex .cart{
   margin-left: 2rem;
   font-size: 2rem;
   color:var(--white);
}

.header .flex .cart:hover{
   color:yellow;
}

.header .flex .cart span{
   padding:.1rem .5rem;
   border-radius: .5rem;
   background-color: var(--white);
   color:var(--blue);
   font-size: 2rem;
}

#menu-btn{
   margin-left: 2rem;
   font-size: 3rem;
   cursor: pointer;
   color:var(--white);
   display: none;
}

.add-product-form{
   max-width: 50rem;
   background-color: var(--bg-color);
   border-radius: .5rem;
   padding:2rem;
   margin:0 auto;
   margin-top: 2rem;
}

.add-product-form h3{
   font-size: 2.5rem;
   margin-bottom: 1rem;
   color:var(--black);
   text-transform: uppercase;
   text-align: center;
}

.add-product-form .box{
   text-transform: none;
   padding:1.2rem 1.4rem;
   font-size: 1.7rem;
   color:var(--black);
   border-radius: .5rem;
   background-color: var(--white);
   margin:1rem 0;
   width: 100%;
}

.display-product-table table{
   width: 100%;
   text-align: center;
}

.display-product-table table thead th{
   padding:1.5rem;
   font-size: 2rem;
   background-color: var(--black);
   color:var(--white);
}

.display-product-table table td{
   padding:1.5rem;
   font-size: 2rem;
   color:var(--black);
}

.display-product-table table td:first-child{
   padding:0;
}

.display-product-table table tr:nth-child(even){
   background-color: var(--bg-color);
}

.display-product-table .empty{
   margin-bottom: 2rem;
   text-align: center;
   background-color: var(--bg-color);
   color:var(--black);
   font-size: 2rem;
   padding:1.5rem;
}

.edit-form-container{
   position: fixed;
   top:0; left:0;
   z-index: 1100;
   background-color: var(--dark-bg);
   padding:2rem;
   display: none;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   width: 100%;
}

.edit-form-container form{
   width: 50rem;
   border-radius: .5rem;
   background-color: var(--white);
   text-align: center;
   padding:2rem;
}

.edit-form-container form .box{
   width: 100%;
   background-color: var(--bg-color);
   border-radius: .5rem;
   margin:1rem 0;
   font-size: 1.7rem;
   color:var(--black);
   padding:1.2rem 1.4rem;
   text-transform: none;
}

.products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   gap:1.5rem;
   justify-content: center;
}

.products .box-container .box{
   text-align: center;
   padding:2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
}

.products .box-container .box img{
   height: 25rem;
}

.products .box-container .box h3{
   margin:1rem 0;
   font-size: 2.5rem;
   color:var(--black);
}

.products .box-container .box .price{
   font-size: 2.5rem;
   color:var(--black);
}

.shopping-cart table{
   text-align: center;
   width: 100%;
}

.shopping-cart table thead th{
   padding:1.5rem;
   font-size: 2rem;
   color:var(--white);
   background-color: var(--black);
}

.shopping-cart table tr td{
   border-bottom: var(--border);
   padding:1.5rem;
   font-size: 2rem;
   color:var(--black);
}

.shopping-cart table input[type="number"]{
   border: var(--border);
   padding:1rem 2rem;
   font-size: 2rem;
   color:var(--black);
   width: 10rem;
}

.shopping-cart table input[type="submit"]{
   padding:.5rem 1.5rem;
   cursor: pointer;
   font-size: 2rem;
   background-color: var(--orange);
   color:var(--white);
}

.shopping-cart table input[type="submit"]:hover{
   background-color: var(--black);
}

.shopping-cart table .table-bottom{
   background-color: var(--bg-color);
}

.shopping-cart .checkout-btn{
   text-align: center;
   margin-top: 1rem;
}

.shopping-cart .checkout-btn a{
   display: inline-block;
   width: auto;
}

.shopping-cart .checkout-btn a.disabled{
   pointer-events: none;
   opacity: .5;
   user-select: none;
   background-color: var(--red);
}

.checkout-form form{
   padding:2rem;
   border-radius: .5rem;
   background-color: var(--bg-color);
}

.checkout-form form .flex{
   display: flex;
   flex-wrap: wrap;
   gap:1.3rem;
}

.checkout-form form .flex .inputBox{
   flex:1 1 35rem;
}

.checkout-form form .flex .inputBox span{
   font-size: 1.5rem;
   color:var(--black);
}

.checkout-form form .flex .inputBox input,
.checkout-form form .flex .inputBox select{
   width: 100%;
   background-color: var(--white);
   font-size: 1rem;
   color:var(--black);
   border-radius: .5rem;
   margin:1rem 0;
   padding:1rem 1.2rem;
   text-transform: none;
   border:var(--border);
   align-items: center;
}

.display-order{
   
   
   border-radius: .5rem;
   text-align: center;
   padding:.5rem;
   margin:0 auto;
   margin-bottom: 2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
}

.display-order span{
   display: inline-block;
   border-radius: .5rem;
   background-color: var(--bg-color);
   padding:.5rem 1.5rem;
   font-size: 1.5rem;
   color:var(--black);
   margin:.5rem;
}



.order-message-container{
   position: fixed;
   top:0; left:0;
   height: 100vh;
   overflow-y: scroll;
   overflow-x: hidden;
   padding:2rem;
   display: flex;
   align-items: center;
   justify-content: center;
   z-index: 1100;
   background-color: var(--dark-bg);
   width: 100%;
}

.order-message-container::-webkit-scrollbar{
   width: 1rem;
}

.order-message-container::-webkit-scrollbar-track{
   background-color: var(--dark-bg);
}

.order-message-container::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.order-message-container .message-container{
   width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   padding:2rem;
   text-align: center;
}

.order-message-container .message-container h3{
   font-size: 2.5rem;
   color:var(--black);
}

.order-message-container .message-container .order-detail{
   background-color: var(--bg-color);
   border-radius: .5rem;
   padding:1rem;
   margin:1rem 0;
}

.order-message-container .message-container .order-detail span{
   background-color: var(--white);
   border-radius: .5rem;
   color:var(--black);
   font-size: 2rem;
   display: inline-block;
   padding:1rem 1.5rem;
   margin:1rem;
}

.order-message-container .message-container .order-detail span.total{
   display: block;
   background: #3b98b7;
   color:var(--white);
}

.order-message-container .message-container .customer-details{
   margin:1.5rem 0;
}

.order-message-container .message-container .customer-details p{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--black);
}

.order-message-container .message-container .customer-details p span{
   color:#000;
   padding:0 .5rem;
   text-transform: none;
}


















/* media queries  */

@media (max-width:1200px){

   .shopping-cart{
      overflow-x: scroll;
   }

   .shopping-cart table{
      width: 120rem;
   }

   .shopping-cart .heading{
      text-align: left;
   }

   .shopping-cart .checkout-btn{
      text-align: left;
   }

}

@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   #menu-btn{
      display: inline-block;
      transition: .2s linear;
   }

   #menu-btn.fa-times{
      transform: rotate(180deg);
   }

   .header .flex .navbar{
      position: absolute;
      top:99%; left:0; right:0;
      background-color: var(--blue);
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      transition: .2s linear;
   }

   .header .flex .navbar.active{
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
   }

   .header .flex .navbar a{
      margin:2rem;
      display: block;
      text-align: center;
      font-size: 2.5rem;
   }

   .display-product-table{
      overflow-x: scroll;
   }

   .display-product-table table{
      width: 90rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

   .heading{
      font-size: 3rem;
   }

   .products .box-container{
      grid-template-columns: 1fr;
   }

}
   </style>
   <?php include 'footer.php';?>
</body>
</html>