<?php 
session_start();
?>
<?php 
include 'connect.php';
include 'h.php';
?>
<br>
<br>
<br>
<head>
  <title>Home</title>
</head>
<body>
<div class="slider">
  <div class="slide_viewer">
    <div class="slide_group">
      <div class="slide">
      </div>
      <div class="slide">
      </div>
      <div class="slide">
      </div>
      <div class="slide">
      </div>
    </div>
  </div>
</div>

<div class="slide_buttons">
</div>
 <div class="directional_nav">
 <!-- <div class="previous_btn" title="Previous">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
			c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
          <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
        </g>
      </g>
    </svg>
  </div>
  x<div class="next_btn" title="Next">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
          <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
        </g>
      </g>
    </svg>
  </div>-->
  <div class="text">
<p>Ready to start your next adventure...? </p></div>
</div>
<div class="title"><h1>About <span>us</span></h1></div>
<section class="about top" id="about">
      <div class="container flex">
        <div class="left">
          <div class="img">
            <img src="picture/12.jpg" alt="" class="image1">
            <img src="picture/1.jpg" alt="" class="image2">
          </div>
        </div>
        <div class="right">
          <div class="heading">
            <h5><i class=" fa fa-heart"></i>  Work with heart</h5>
            <h5><i class="fa fa-handshake"></i> Reliable services</h5>
            <h5><i class="fa fa-hand-holding-heart"></i> Great support</h5><br>
            <h4 style="width:500px;padding-left:50px;"> We are the outdoor adventure store with a wide range of professional equipement for camping, hiking, cycling, fitness, off-road and much more! we have what you need!</h4>
            
          </div>
        </div>
      </div>
    </section>
    <style>
      
  
  .mtop {
    margin-top: 5%;
  }
  
  .left, .right {
    width: 50%;
    float:right;
  }
  
  .about {
    margin-bottom: 50px;
    display:flex;
  }
  
  .about .img {
    position: relative;
  }
  
  .about .image1 {
    width: 310px;
    height: 450px;
  }
  
  .about .image2 {
    width: 325px;
    height: 220px;
    position: absolute;
    bottom: 5px;
    z-index: 2;
    right: 10%;
  }
  
  .heading {
    position: relative;
  }
  
  
  
  .heading h5 {
    font-weight: 400;
    letter-spacing: 2px;
    padding-top: 20px;
    color: #5f5f5f;
  }
  
  .heading h2 {
    font-size: 30px;
    font-weight: 400;
    margin: 20px 0 40px 0;
    color: #f2F2F2;
  }
  
  .heading p {
    margin-bottom: 20px;
    line-height: 25px;
    color: #f2F2F2;
    margin: 0 0 20px 50px;
  }
  
  .heading .btn1 {
    margin: 50px 0 20px 50px;
  }
  
  .btn1 {
    background: #C1B086;
    color: white;
  }
  
  /--------------about--------/
 
    </style>
<?php
include 'categoriesF.php'; 
?>
<div class="title"><h1>Best <span>places to visit</span></h1></div>
  <div class="container1">
  <div class="card">
      <div class ="imgbox">
          <img src="picture/OIP (2).jpg">
      </div>
      <div class="cont">
          <h2>Toubkal</h2>
          <P>Toubkal (Berber: Touj Akal) is the highest peak in the Atlas Mountains and is located in Morocco. It is the highest mountain peak in Morocco and North Africa and the seventh highest in Africa, with a height of 4167 m. Jebel Toubkal belongs to the High Atlas mountain range, which is located in its western part. </P>
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
          <P>The Ouzoud Falls are located in the Azilal region, which is 150 km from the northeastern region of Marrakesh, Morocco, and 80 km from the city of Beni Mellal. The tourist site offers many camping sites based on primitive bamboo and reed huts, swimming spots.</P>
      </div>
  </div>
  </div>
  <div class="container1">
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/marrakech.jpg">
      </div>
      <div class="cont">
          <h2>Oukaïmeden</h2>
          <P>Oukaïmeden is a ski resort in the Atlas mountains near Jebel Toubkal, about 80 kilometres (50 mi) from Marrakesh, Morocco.</P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/cabo negro.jpg">
      </div>
      <div class="cont">
          <h2>Cabo Negro</h2>
          <P>Cabo Negro is located on the northern coast of the Kingdom of Morocco, on the Mediterranean Sea, 10 km from the city of Tetouan and 24 km from Ceuta. Famous for its own locations such beaches and mountain scenery. </P>
      </div>
  </div>
  <div class="card">
      <div class ="imgbox">
          <img src="suggestions/Agadir.jpg">
      </div>
      <div class="cont">
          <h2>Taghazout</h2>
          <P>Taghazout is located some 20 kilometers to the north of Agadir. This charming fishing village is easily accessible by taxi or bus. Taghazout boasts the best waves in Morocco with great Atlantic swells, beach breaks, Our area has a wide variety of spots that suit any surfing ability. </P>
      </div>
  </div>
</div>
<div class="title"><h1> <span>Partner</span></h1></div>
<div class="container2" style ="width: 100%;vertical-align: middle;text-align: center;">
  <a href="https://www.poste.ma/wps/portal/messagerie/!ut/p/b1/vZTJcqMwFEW_pT_AhSTmJZOZZYOwGDYuGwOeB0xjzNc3SaU6XelOsujE0kpVV3We7nu6TMYkTHZctJtq0WxOx8X-6ZwJcyryiiT7LJB41wC2DDRd0iRkEzQI0vcFGhQ-vG9zTMwkVoo6_WpXY4PO12kcSl5A0qKvONPJ0QjQ4zqJputLFZVRXaccy4_CnC3aIofsZcbmJNucxqF0CR3cEWPWTNIUQeKtt3VjtjMhuHK5sywabC29dgM64gWGAW1OmqOraLsun7vRND6o1VFL6nlcZuCkOtZ8I5XViFsUUqgrgiblC3XSne_0irJgZXVcKoPAcsxCXLSyUhfmUVV-vHgB3lkK-MyL_7o_9CJmsmeJQJATyoTlKGUFYPMWNUJlDIHKvgg-atez4IMa0kEgviLGsvyEkAzJhwEAEc9ETAK4Odnez3a_68NtH_R4ad8wuEGgUxdHOsWR0UcrF_pG1UFvdsMzcMfG2sU70Pnycrqi4UxVlJ91iOQX4GvJGI6Hkl1BMwMCACc8GOhy3wT8bSkOBAjsqQeh4ijINMVHAx_ew28HTlhdHoBBGImKjSbWw4fm64EOk1X703LIaGqld3EI0Js-BKgTIgmfxcxU16lh4rUv7Km9oWi_rNr2LCqrC-37uamXYo_5tV9xXtaUSb-fHiqTtSZE21aJFYwtv3a22VWr0k1_OM5H3aGTFF9euQZfpiMD1aN-7zXmsrzQyifcOVe00V24GmUjZh5QSW1Lq5i4aTmNc5I3eezN7JiSSh1tQ8iGhXPTgx2DrdOh-CRRvH-MP0G-cQJYT2_AAKiJomCwDuJVARtdxWAHINldUbNUfVKP_WiVvFinnx0tz_7q1ZsgfjRQ4b8J-M4HB_ThQOHRlnLfDXyTKJB_9Au_fkrPh1nrekJo9cmbXZjt4c9d_fgFyKa6iQ!!/dl4/d5/L2dBISEvZ0FBIS9nQSEh/"><img src="jennate/amana.jpg"></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<style>
  *{
    font-family: cursive;
   
}
    .text p{
  /*padding: 20px;*/
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
    html, body {
  background-color:#f9f9fa;
  height: 100%;
  margin: 0;
  padding: 0;
  width: 100%;
}.slider {
  padding-bottom : 0px;
  width: 100%;
}.container2 img{
  width: 300px;
  height: 100px;
  border-radius: 5px;

}.slide_viewer {
  height: 500px;
  overflow: hidden;
  position: relative;
}.slide_group {
  height: 100%;
  position: relative;
  width: 100%;
}.slide {
  display: none;
  height: 100%;
  position: absolute;
  width: 100%;
}

.slide:first-child {
  display: block;
}

.slide:nth-of-type(1) {
    background: url(picture/home-bg-1.jpg) no-repeat;
    margin-top: 1rem;
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
}

.slide:nth-of-type(2) {
    background: url(picture/2.jpg) no-repeat;
    margin-top: 1rem;
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
}

.slide:nth-of-type(3) {
    background: url(picture/11.jpg) no-repeat;
    margin-top: 1rem;
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
}

.slide:nth-of-type(4) {
    background: url(picture/13.jpg) no-repeat;
    margin-top: 1rem;
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
}

.slide_buttons {
  background-color: #f9f9fa;
  left: 0;
  position: absolute;
  right: 0;
  text-align: center;
}

a.slide_btn {
  color: #474544;
  font-size: 42px;
  margin: 0 0.175em;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.slide_btn.active, .slide_btn:hover {
  color: #428CC6;
  cursor: pointer;
}

.directional_nav {
  height: 100px;
  margin: 0 auto;
  max-width: 940px;
  position: relative;
  top: -300px;
}

.previous_btn {
  bottom: 0;
  left: 100px;
  margin: auto;
  position: absolute;
  top: 0;
}

.next_btn {
  bottom: 0;
  margin: auto;
  position: absolute;
  right: 100px;
  top: 0;
}

.previous_btn, .next_btn {
  cursor: pointer;
  height: 65px;
  opacity: 0.5;
  -webkit-transition: opacity 0.4s ease-in-out;
  -moz-transition: opacity 0.4s ease-in-out;
  -ms-transition: opacity 0.4s ease-in-out;
  -o-transition: opacity 0.4s ease-in-out;
  transition: opacity 0.4s ease-in-out;
  width: 65px;
}

.previous_btn:hover, .next_btn:hover {
  opacity: 1;
}

@media only screen and (max-width: 767px) {
  .previous_btn {
    left: 50px;
  }
  .next_btn {
    right: 50px;
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
  background-color: #f9f9fa;
  text-decoration: none ;

}.bd{
  display: flex;
    justify-content: center;
    align-items: center;
    height: 300PX;   
}
</style> 
<script>
$('.slider').each(function() {
  var $this = $(this);
  var $group = $this.find('.slide_group');
  var $slides = $this.find('.slide');
  var bulletArray = [];
  var currentIndex = 0;
  var timeout;
  
  function move(newIndex) {
    var animateLeft, slideLeft;
    
    advance();
    
    if ($group.is(':animated') || currentIndex === newIndex) {
      return;
    }
    
    bulletArray[currentIndex].removeClass('active');
    bulletArray[newIndex].addClass('active');
    
    if (newIndex > currentIndex) {
      slideLeft = '100%';
      animateLeft = '-100%';
    } else {
      slideLeft = '-100%';
      animateLeft = '100%';
    }
    
    $slides.eq(newIndex).css({
      display: 'block',
      left: slideLeft
    });
    $group.animate({
      left: animateLeft
    }, function() {
      $slides.eq(currentIndex).css({
        display: 'none'
      });
      $slides.eq(newIndex).css({
        left: 0
      });
      $group.css({
        left: 0
      });
      currentIndex = newIndex;
    });
  }
  
  function advance() {
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    }, 4000);
  }
  
  $('.next_btn').on('click', function() {
    if (currentIndex < ($slides.length - 1)) {
      move(currentIndex + 1);
    } else {
      move(0);
    }
  });
  
  $('.previous_btn').on('click', function() {
    if (currentIndex !== 0) {
      move(currentIndex - 1);
    } else {
      move(3);
    }
  });
  
  $.each($slides, function(index) {
    var $button = $('<a class="slide_btn">&bull;</a>');
    
    if (index === currentIndex) {
      $button.addClass('active');
    }
    $button.on('click', function() {
      move(index);
    }).appendTo('.slide_buttons');
    bulletArray.push($button);
  });
  
  advance();
});
</script> 
<?php include 'footer.php';?>
</body>
