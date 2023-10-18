<!Doctype html>
<head>
    <meta charset="UTF-8">
    <title>sheshop</title>
    <link rel="stylesheet" href="css/stylemain.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=chilanka&family=Dancing+script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
 </head>
<?php
     include 'h.php';
?>
<body>
<section class="home">
        <div class="swiper home-slider">
       <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="box" style="background: url(picture/home-bg-1.jpg) no-repeat;">
                <div class="content">
                    <span>Discover </span>
                    <h3>our suggestions for you </h3>
                    <p>in your montain side</p>
                    <a href="montain.php" class="btn">get started</a>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
           <a href="deser.php"> <div class="box" style="background: url(picture/4.jpg) no-repeat;"></a>
                <div class="content">
                    <span>make tour</span>
                    <h3>amazing</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                    <a href="#" class="btn">get started</a>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <a href="plage.php"><div class="box" style="background: url(picture/home-bg-3.jpg) no-repeat;"></a>
                <div class="content">
                    <span>explore the</span>
                    <h3>new world</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                    <a href="#" class="btn">get started</a>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <?php 
    include 'categoriesF.php';
    ?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

          <script>
           var swiper = new Swiper(".home-slider", {
           loop:true, 
           grabCursor:true,
           navigation: {
        nextEl: ".swiper-button-next",
           prevEl: ".swiper-button-prev",},});</script> 
   /* <?php include 'footer.php';?>
</div>

</body>