<?php
include 'connect.php';
include 'functions.php';
$Categories= afficher();
?>
 <div class="title"><h1> <span>Categories</span></h1></div>
<div class="con2">

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
     
 
     </div>
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
     <style>
        /*  body{
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          background: #666;
      }*/
        .con2{
         padding-bottom: 10px;
          position: relative;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          gap:13px;
          flex-wrap: wrap;
          padding-left: 10px;
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
}.title span{
      color: #3b98b7;
      padding-left: .7rem;
}.con2 .serviceBox{
          position: relative;
          width: 200px;
          height: 200px;
          background-color: #ffffff10;
          backdrop-filter: blur(12px);
          -webkit-backdrop-filter: blur(12px);
          border-radius: 20px;
          overflow: hidden;
}.con2 .serviceBox .icons{
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
}.con2 .serviceBox:hover .icons{
          width: 80px;
          top: 30px;
          left: calc(50% -40px);
          height: 80px;
          border-radius: 50%;
          background: var(--i);
          transition-delay:0s ;
}.con2 .serviceBox .icons ion-icon{
        font-size: 5rem;
        color:#fff;
        transition: 0.5s;
        transition-delay:0.25s ;
}.con2 .serviceBox:hover .icons ion-icon{
          font-size: 2em;
          transition-delay:0s ;
}.con2 .serviceBox .content1{
          position: relative;
          padding: 20px;
          color: #666;
          text-align: center;
          margin-top: 100px;
          z-index: 1;
          transform: scale(0);
          transition-delay:0s ;
          text-decoration : none;
}.con2 .serviceBox:hover .content1{
          transform: scale(1);
          transition-delay:0.25s ;
}.con2 .serviceBox .content1 h2{
          margin-top: 10px;
          margin-bottom: 5px;
}.con2 .serviceBox .content1 p{
          font-weight: 300;
          line-height: 1.5em;
}
</style>