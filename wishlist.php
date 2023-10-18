
<?php 

ob_start();
 session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    include 'connect.php';
    include 'h.php';
    include 'functions.php';

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body>
 
 <br/><br/>
 <br/><br/>
 <br/>
    <h1>  wishlist</h1>
<div class="shopping-wishlist" style=" width: 100%;vertical-align: middle;text-align: center;">

<?php 
if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   

   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message = 'product already added to cart';
   }else{
      $insert_product = ( "INSERT INTO cart(idC, name, price, image, quantity)VALUES ('1','$product_name', '$product_price', '$product_image', 1)");
      mysqli_query($conn,$insert_product)or die(mysqli_error($conn));
      $message = 'product added to cart succesfully';
   }

}
@$conn=mysqli_connect("localhost","root","","notreshop");
if (isset($_GET['remove'])){
  
  $remove_id = $_GET['remove'];
  $select_cart = ("DELETE FROM wishlist WHERE id = '$remove_id'");
  mysqli_query($conn,$select_cart) or die(mysqli_error($conn));
  $message = 'product removed from wishlist succesfully';
  
};;
         $conn=mysqli_connect("localhost","root","","notreshop");

        

         $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE Member_name = '$username'");
         $grand_total = 0;
         if(mysqli_num_rows($select_wishlist) > 0){?>
          <div class="column-labels">
          <label class="product-removal"></label>
  <label class="product-image">Image</label>
  <label class="product-details">Product</label>
  <label class="product-price">Price</label>
  <label class="product-removal">Remove</label>
</div>
          <?php  while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){
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
  <div class="product" >
    <div class="product-removal1" style="width:10%;vertical-align:middle;text-align: center;">
    <a href="wishlist.php?remove=<?php echo $fetch_wishlist['id']; ?>" onclick="return confirm('remove item from wishlist?')" class="dalete-btn" style="color:red;font-size:29px;" ><i class="fa fa-trash"></i></a>
    </div>
    <div class="product-image">
      <img src=jennate\<?php echo $fetch_wishlist['image']; ?>>
    </div>
    <div class="product-details">
      <div class="product-title"><?php echo $fetch_wishlist['name']; ?></div>
    </div>
    <div class="product-price"><?php echo number_format($fetch_wishlist['price']); ?></div>
    <input type="hidden" name="product_id" value="<?= $fetch_wishlist['id'] ?>">
            <input type="hidden" name="product_name" value="<?= $fetch_wishlist['name'] ?>">
            <input type="hidden" name="product_price" value="<?= $fetch_wishlist['price'] ?>">
            <input type="hidden" name="product_image" value="<?= $fetch_wishlist['image'] ?>">
    <div class="product-removal" style="vertical-align: middle;text-align: center;">
    
      
      <input type="submit" class="btn btn-sm btn-outline-primary" value="Add to cart" name="add_to_cart">
    </div>
  </div>
  <?php
};
         } else{?>
          <img class="emptycart" src="jennate/R.png"><br>
<span style="font-size:30px;color:#ff878d;">Your wishlist is empty!</span><br>
<a href="shop.php"><input type="submit" value="Go shopping now" style="width: 200px;font-size: 16px;
        font-weight: 600;color: #fff;cursor: pointer;margin: 20px;
        height: 55px;text-align:center;border: none;
        background-size: 300% 100%;background-color: #ff878d;
        border-radius: 50px;
        -o-transition: all .4s ease-in-out;-webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;"></a>
         <?php }
         ?>
  </div>
  </form>
</div>
<style>
    *{
    font-family: cursive;
    
  }
    .product-image {
  float: left;
  width: 25%;
  
}

.product-details {
  float: left;
  width: 25%;
  font-size:26px;
  font-family: cursive;
}

.product-price {
  padding-top:12px;
  float: left;
  width: 12%;
}

.product-removal {
  width: 10%;
   
  display: flex;
  float:right;
}.group:before, .shopping-wishlist:before,
.column-labels:before,
.product:before,
.totals-item:before,
.group:after,
.shopping-wishlist:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: "";
  display: table;
}.group:after, .shopping-wishlist:after,
.column-labels:after,
.product:after,
.totals-item:after {
  clear: both;
}.group, .shopping-wishlist,
.column-labels,
.product,
.totals-item {
  zoom: 1;
}.product .product-price:after,
.product .product-line-price:after,
.totals-value:after {
  content: "DH";
}body {
  
  font-family: cursive;
  font-weight: 100;
}

h1 {
  -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        font-size: 3.5rem;
        margin-bottom: 2rem;
        padding: 1rem 0;
        border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
        color: #ff878d;
        text-align: center;
}

label {
  color: #aaa;
}

.shopping-wishlist {
  margin-top: -45px;
}

/* Column headers */
.column-labels label {
  padding-bottom: 10px;
  margin-bottom: 10px;
 
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

.product .product-image img {
  width: 150px;
}








/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-wishlist {
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

  .product-quantity {
    width: 100px;
  }
  .product-quantity input {
    margin-left: 20px;
  }

  .product-quantity:before {
    content: "x";
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


/* Recalculate  wishlist */
function recalculate wishlist()
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
    $('# wishlist-subtotal').html(subtotal.toFixed(2));
    $('# wishlist-tax').html(tax.toFixed(2));
    $('# wishlist-shipping').html(shipping.toFixed(2));
    $('# wishlist-total').html(total.toFixed(2));
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
  
  /* Update line price display and recalc  wishlist totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculate wishlist();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from  wishlist */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc  wishlist total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculate wishlist();
  });
}
</script>
<?php } else{
   header('Location: login.php');
   exit();
}?>
</body>
<br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/>
