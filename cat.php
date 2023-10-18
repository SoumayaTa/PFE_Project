<?php
session_start();
include 'connect.php';
include 'functions.php';
include 'h.php';
$Categories= afficher();
?>
<br>
<br>
<br>
<br>
 <div class="title"><h1>Shop by <span>Categories</span></h1></div>
<div class="container">

<?php foreach($Categories as $categories): ?>
     <div class="serviceBox">
     <a href="produit.php?catid=<?= $categories->ID ?>">
         <div class="icons" style="<?= $categories->Coleur ?>">
         <ion-icon name="<?= $categories->Icons ?>"></ion-icon>
        </div>
             <div class="content1">
             <h2><?= $categories->Name ?></h2>
         </div>
     </div> </a>
     <?php endforeach; ?>
     

     </div><?php include 'footer.php';?>
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
     <style>
        /*  body{
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          background: #666;
      }*/
      body{
          background-color: #f2f2f2;

      }*{
          font-family: cursive;
      }
          .container{
              
              padding-bottom: 25px;
          position: relative;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
      
          gap:40px;
          flex-wrap: wrap;
          
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
      color: #3b98b7;
      padding-left: .7rem;
      }
      .container .serviceBox{
          position: relative;
          width: 400px;
          height: 400px;
          background-color: #ffffff10;
          backdrop-filter: blur(12px);
          -webkit-backdrop-filter: blur(12px);
          border-radius: 20px;
          overflow: hidden;
          
      
      }
      .container .serviceBox .icons{
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: var(--i);
          transition: 0.5s;
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 2;
          transition-delay:0.25s ;
      
      }
      .container .serviceBox:hover .icons{
          width: 120px;
          top: 30px;
          left: calc(50% -40px);
          height: 120px;
          border-radius: 50%;
          background: var(--i);
          transition-delay:0s ;
      }
      .container .serviceBox .icons ion-icon{
        font-size: 8rem;
        color:#fff;
        transition: 0.5s;
        transition-delay:0.25s ;
      }
      .container .serviceBox:hover .icons ion-icon{
          font-size: 4em;
          transition-delay:0s ;
      }
      .container .serviceBox .content1{
          position: relative;
          padding: 50px;
          color: #666;
          text-align: center;
          margin-top: 100px;
          z-index: 1;
          transform: scale(0);
          transition-delay:0s ;
      }
      .container .serviceBox:hover .content1{
          transform: scale(1);
          transition-delay:0.25s ;
      
      }
      .container .serviceBox .content1 h2{
          margin-top: 10px;
          margin-bottom: 5px;
          font-size: 40px;
        
      
      }
      .container .serviceBox .content1 p{
          font-weight: 300;
          line-height: 1.5em;
      }
           </style>