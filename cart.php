<?php 
session_start();
include_once "h.php";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>cart</title>
</head>
<body><?php


@$conn=mysqli_connect("localhost","root","","notreshop");
if (isset($_GET['remove'])){
  
  $remove_id = $_GET['remove'];
  $select_cart = ("DELETE FROM cart WHERE id = '$remove_id'");
  mysqli_query($conn,$select_cart) or die(mysqli_error($conn));
  $message = 'product removed successfully';
};;
if(isset($_POST['update_update_btn'])){
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = ("UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  mysqli_query($conn,$update_quantity_query) or die(mysqli_error($conn));
  if($update_quantity_query){
    $message = 'Cart updated successfully';
  ;
  };
 };


?>
 <br/>
 <br/><br/>
 <br/>
    <h1>Shopping Cart</h1>

<div class="shopping-cart" style=" width: 100%;
        
        
        vertical-align: middle;
        text-align: center;
        ">

  
  <?php 
         $conn=mysqli_connect("localhost","root","","notreshop");
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){?>
          <div class="column-labels">
          <label class="product-image">Image</label>
          <label class="product-details">Product</label>
          <label class="product-price">Price</label>
          <label class="product-quantity">Quantity</label>
          <label class="product-removal">Remove</label>
          <label class="product-line-price">Total</label>
        </div>
            <?php while($fetch_cart = mysqli_fetch_assoc($select_cart)){

         ?>
  <style>
      .ctr{
        z-index: 2;
      }
.popup2{
  width:400px;
  HEIGHT:200px;
  background: #fff;
  border-radius: 6px;
  position:absolute;
  border:1px solid #eee;
  top: 50%;
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
}</style>
 <?php 
   if(isset($message)){?>
   <div class="ctr">
    <div class="popup2" id="popup2">
      
      <h2>Good!</h2>
      <?php echo '<p>'.$message.'</p>';?>
      <button type = "button">OK </button>
    </div></div>
   <?php } ?> <script>
       document.getElementById("popup2").onclick = function(){
        document.getElementById("popup2").style.display ="none";
       }
      
    </script>
         <form action="" method="POST">
        
  <div class="product"  style=" width: 100%;
        
        
        vertical-align: middle;
        text-align: center;
        ">
    <div class="product-image">
      <img src=jennate\<?php echo $fetch_cart['image']; ?>>
    </div>
    <div class="product-details">
      <div class="product-title"><?php echo $fetch_cart['name']; ?></div>
    </div>
    <div class="product-price"><?php echo number_format($fetch_cart['price']); ?></div>
    <div class="product-quantity">
    <form action="" method="post">
    <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>">
    <input class="mtext-104 cl3 txt-center num-product" type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
   
 </form>
    </div>
   
            <input type="hidden" name="product_name" value="<?= $fetch_cart['name'] ?>">
            <input type="hidden" name="product_price" value="<?= $fetch_cart['price'] ?>">
            <input type="hidden" name="product_image" value="<?= $fetch_cart['image'] ?>">
    <div class="product-removal">
    <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-sm btn-outline-danger" >Remove</a>
    <input type="submit"  value="update" name="update_update_btn" class="btn btn-sm btn-outline-primary">
    
    </div>
    <div class="product-line-price"><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></div>
  </div>
  <?php
           $grand_total += $sub_total;  
            };
         
         ?>
  

  <div class="totals">
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total"><?php echo $grand_total; ?></div>
    </div>
  </div>
  </form>
      <a href="checkout.php" class="btn btn-lg btn-primary">Checkout</a>
 <?php } else{?>
<img class="emptycart" src="jennate/emptycart.png" style="padding-top: 50px;"><br>
<span style="font-size:30px;color:#3b98b7;">Your cart is empty!</span><br>
<a href="shop.php"><input type="submit" value="Go shopping now" style="width: 200px;
                                            font-size: 16px;
                                            font-weight: 600;
                                            color: #fff;
                                            cursor: pointer;
                                            margin: 20px;
                                            height: 55px;
                                            text-align:center;
                                            border: none;
                                            background-size: 300% 100%;
background-color: #3b98b7;
                                            border-radius: 50px;
                                          
                                            -o-transition: all .4s ease-in-out;
                                            -webkit-transition: all .4s ease-in-out;
                                            transition: all .4s ease-in-out;"></a>
 <?php }
 ?>

</div>

<style>
  *{
    font-family: cursive;
  }
    .product-image {
  float: left;
  width: 20%;
}

.product-details {
  float: left;
  width: 25%;
  font-size:26px;
  font-family: cursive;
}

.product-price {
  float: left;
  width: 10%;
}

.product-quantity {
  float: left;
  width: 15%;
}

.product-removal {
  float: left;
  width: 15%;
}

.product-line-price {
  float: left;
  width: 10%;
  text-align: right;
}

/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before,
.column-labels:before,
.product:before,
.totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: "";
  display: table;
}

.group:after, .shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  clear: both;
}

.group, .shopping-cart,
.column-labels,
.product,
.totals-item {
  zoom: 1;
}

/* Apply clearfix in a few places */
/* Apply dh signs */
.product .product-price:after,
.product .product-line-price:after,
.totals-value:after {
  content: "DH";
}

/* Body/Header stuff */
body {
  
 
  font-weight: 100;
}

h1 {
  
  -webkit-box-align: center;
             -ms-flex-align: center;
                 align-items: center;
         font-size: 3rem;
         margin-bottom: 3rem;
         padding: 1rem 0;
         border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
         color: #3b98b7;
         text-align: center;
}

label {
  color: #aaa;
}

.shopping-cart {
  margin-top: -45px;
  padding: 0 30px 30px 30px;
}

/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
 
}
.column-labels .product-image,
.column-labels .product-details,
.column-labels .product-removal {
  text-indent: -9999px;
}

/* Product entries */
.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
  font-size: 12px;
  border-radius: 3px;
}
.product .remove-product:hover {
  background-color: #a44;
}

/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 75%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 25%;
  text-align: right;

}
.totals .totals-item-total {
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}

.btn {
  float: right;
 
  margin-right: 20px;
  margin-top: 20px;
 
 
 
  border-radius: 3px;

}

.checkout:hover {
  background-color: #87ceeb;
}


@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }

  .column-labels {
    display: none;
  }

  .product-image {
    float: right;
    width: auto;
  }
  .product-image img {
    margin: 0 0 10px 10px;
  }

  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }

  .product-price {
    clear: both;
    width: 70px;
  }

  

  

  .product-removal {
    width: auto;
  }

  .product-line-price {
    float: right;
    width: 70px;
  }
}
/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }

  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }

  .product .product-line-price:before {
    content: "Item Total: $";
  }

  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
}

</style>
<script>
    /* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  removeItem(this);
});


/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
  
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
  
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
  
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
