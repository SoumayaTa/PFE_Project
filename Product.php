
<?php
session_start();
include "connect.php";
include "functions.php";
include 'h.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<br>
<br>
<br>
<div class="title"><h1>all <span>Products</span></h1></div>
<?php   $Produits=afficher1('items'); ?>
   
  <div class="gallery"> 
     <?php foreach($Produits as $produit): ?> 
   
        <div class="content">
<img src="jennate/<?= $produit['Image'] ?>" >
<p ><?= $produit['Name'] ?></p>
<h3><?= $produit['Price'] ?> DH</h3>

<button class=" buy">  Buy Now</button>

        </div>
 <?php endforeach; ?>
</div>

   

   <?php include 'footer.php';?>


   </script>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap');

*{
   font-family: 'Nunito', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   transition: all .2s linear;
   text-transform: capitalize;
}
 
body{
     margin: 0;
     background: #f2f2f2;
     overflow-x: hidden;
 }
 h3{
     text-align: center;
     font-size: 30px;
     margin: 0;
     padding-top: 100px;
 }a{
     text-decoration: none;
 }.gallery{
     display: flex;
     flex-wrap: wrap;
     width: 100%;
     justify-content: center;
     align-items: center;
     margin: 50px 0;
 }.content{
     width: 20%;
     margin: 15px;
     box-sizing: border-box;
     float: left;
     text-align: center;
     border-radius: 20px;
     cursor: pointer;
     box-shadow: 0 14px 28px rgba(0,0,0,0.25),
     0 10px 10px rgba(0,0,0,0.22);
     transition: .4s;
     background:#f2F2F2;
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
     padding-top: 0 8px;
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
 }.checked{
     color: #bac34e;
 }.fa:hover{
     transform: scale(1.3);
     transition: .6s;
 }
 button{
     text-align: center;
     font-size: 30px;
     color: #fff;
     width: 100%;
     padding-top:15px;
     border: 0;
     outline: none;
     cursor: pointer;
     margin-top: 5px;
     
     border-bottom-right-radius: 20px;
     border-bottom-left-radius: 20px;
 }.buy{
     background: #bac34e;
 }@media(max-width:1000px){
     .content{
         width: 50%;

     }
 }@media(max-width:750px){
     .content{
         width: 100%;
         
     }
 }
 .title h1{
         
              
         -webkit-box-align: center;
             -ms-flex-align: center;
                 align-items: center;
         font-size: 3rem;
         margin-bottom: 3rem;
         padding: 1.2rem 0;
         border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
         color: #222;
         text-align: center;
       
      }
      a{
          text-decoration: none;
      }
      .title span {
      color: #bac34e;
      padding-left: .7rem;
      } .products-preview{
   position: fixed;
   top:0; left:0;
   min-height: 100vh;
   width: 100%;
   background: rgba(0,0,0,.8);
   display: none;
   align-items: center;
   justify-content: center;
}
   </style>
   

</body>
</html>
