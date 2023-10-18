<?php 
session_start();
?>
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
    <body><header>
       <?php
          include 'h.php';
          ?></header>
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
</div>
<div class="text">
<p>Ready to start your next adventure...? </p></div>
<style>
.text p{
  padding: 20px;
  text-align: center;
  position: relative;
  font-family: cursive;
  text-transform: uppercase;
  font-size: 3em;
  letter-spacing: 4px;
  overflow: hidden;
  background: linear-gradient(90deg, #000, #bac24b, #000);
  background-repeat: no-repeat;
  background-size: 80%;
  animation: animate 6s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255, 255, 255, 0);
    }

@keyframes animate {
  0% {
    background-position: -500%;
  }
  100% {
    background-position: 500%;
  }
}
    
    .container1{
  padding-left: 130px;
  justify-content: space-between; 
  padding-bottom: 20px;
  position: relative;
  width: 100%;
  display: flex;
          justify-content: center;
          align-items: center;
      
          gap:45px;
          flex-wrap: wrap;
          
  
}.cont{
  width: 1000px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}.card{
  position: relative;
  left: -6%;
  width: 300px;
  height: 370px;
 
  transition: 0.3s ease-out;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.7);
  border-radius: 10px;
}.card .imgbox{
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}.card .imgbox img{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 80%;
  display: block;
  transition: 0.5s ease;
}.card .cont{
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 100px;
  padding: 12px;
  background: #FFF;
  transition: all 0.5s cubic-bezier(.48, -0.28, 0.41, 1.4);
  box-sizing: border-box;
  overflow: hidden;
}.card:hover .cont{
  width: 100%;
  height: 75%;
  left: 0;
  bottom: 0;
}.cont p{
  margin: 10px 0 0;
  padding: 1em 1 em;
  transform: translateY(2em);
  line-height: 1.3em;
  transition: 0.3s;
  text-align: justify;
  opacity: 0;
}.card:hover .cont p {
  transform: translateY(0);
  opacity: 1;

}.cont h2{
  text-align: center;
}.card:hover{
  box-shadow: 0 0 5em rgba(0, 0, 0, 0.4);
}  .home .box {
   margin-top: 5rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-size: cover !important;
    background-position: center !important;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 1rem 9%;
}body{
  background-color: #f2f2f2;
  text-decoration: none ;

}
</style>
</section>
<?php 
include 'categoriesF.php';
?>
  <div class="title"><h1>our <span>Suggestions</span></h1></div>
  <div class="container1">
  <div class="card">
      <div class ="imgbox">
          <img src="picture/OIP (2).jpg">
      </div>
      <div class="cont">
          <h2>TETOUAN</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="picture/img-6.jpg">
      </div>
      <div class="cont">
          <h2>TETOUAN</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/OUzoud.jpg">
      </div>
      <div class="cont">
          <h2>Ouzoud-Azilal</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
  </div>
  <div class="container1">
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/marrakech.jpg">
      </div>
      <div class="cont">
          <h2>TETOUAN</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/cabo negro.jpg">
      </div>
      <div class="cont">
          <h2>TETOUAN</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/Agadir.jpg">
      </div>
      <div class="cont">
          <h2>TETOUAN</h2>
          <P>tetouan la hdbdh jzhdbd hejen heuzjn deuzjnehdun heuje heudn </P>
      </div>
  </div>
</div>
<?php 
include 'footer1.php';
?>
          <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

          <script>
           var swiper = new Swiper(".home-slider", {
           loop:true, 
           grabCursor:true,
           navigation: {
        nextEl: ".swiper-button-next",
           prevEl: ".swiper-button-prev",},});</script> 
    </body>
   
</html>
    