<html>
    <link rel="stylesheet" href="service.css">
    <title>who are we?</title> 
    
<body>
     <?php include 'h.php' ;?>
    <br>
    <br>
    <br>
    <br>
    
  <div class="title"><h1><span> who </span>are we<span>?</span></h1></div>
<div class="container1">
     <div class="B">
         <div class="icon" >
         1
        </div>
             <div class="content2">
                 <h3>TAYOUB Soumaya</h3>
                 <p>aaaaaaaaaaaaaaaaaaaaakkkkkkkkkkkkkkkkkkkkkk</p>
                 <a href="">Read more</a>

         </div>
     </div>
     <div class="B">
         <div class="icon" >
         2
        </div>
             <div class="content2">
                 <h3>ESSATI Bouchra</h3>
                 <p>aaaaaaaaaaaaaaaaaaaaaakkkkkkkkkkkkkkkkkkkkk
                     hhhhhhhhhg
                     ddddffk</p>
                 <a href="">Read more</a>

         </div>
     </div>

</div>
<?php
include 'footer1.php' ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');

/*body{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Poppind', sans-serif;
}*/
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
.title span {
color: #bac34e;
padding-left: .7rem;
}
.container1{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container1 .B{
    position: relative;
    width: 450px;
    padding: 40px;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
   border-radius: 4px;
   margin: 20px;
   box-sizing: border-box;
   overflow: hidden;
   text-align: center;
}
.container1 .B .icon{
    position: relative;
    width: 80px;
    height: 80px;
    color: #fff;
    background: #000;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    border-radius: 50%;
    font-size: 40px;
    font-weight: 700;
    transition: 1s;
}
.container1 .B:before{
    content: '';
    width: 50%;
    height: 100%;
    position: absolute;
    top:0;
    background:rgba(255, 255, 255, .2) ;
    left: 0;
    z-index: 2;
    pointer-events: none;
}
.container1 .B:nth-child(1) .icon{
    box-shadow: 0 0 0 0 #e91e63;
    background:#e91e63 ;
}
.container1 .B:nth-child(1):hover .icon{
    box-shadow: 0 0 0 400 #e91e63;
}
.container1 .B:nth-child(2) .icon{
    box-shadow: 0 0 0 0 #bac34e;
    background:#bac34e ;
}
.container1 .B:nth-child(2):hover .icon{
    box-shadow: 0 0 0 400 #bac34e;
}
.container1 .B .content2{
    position: relative;
    z-index: 1;
    transition: 0.5s;

}
.container1 .B:nth-child(1):hover .content2{
    color: #e91e63;

}
.container1 .B:nth-child(2):hover .content2{
    color: #bac34e;

}
.container1 .B .content2 h3{
    font-size: 20px;
    margin: 10px 0;
    padding: 0;
}
.container1 .B .content2 p{
    margin: 0;
    padding: 0;
}
.container1 .B .content2 a{
    display: inline-block;
    padding: 10px 20px;
    background: #fff;
    border-radius: 4px;
    text-decoration: none;
    color: #000;
    font-weight: 500;
    margin-top: 20px;
    box-shadow: 0 2px 5x rgba(0, 0, 0, 0.2);
}

</style>

</body>


