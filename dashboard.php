<?php
ob_start();
    session_start();
    if(isset($_SESSION['username'])){
       include 'adminheader.php';

       include 'functions.php';
       include 'connect.php';
       
?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Dashboard</title>
</head>


    <body>
        
    
<div class="container">
    <br>

    <h1 class="text-center">Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <DIV class="STAT1">
                <i class="fa fa-users"></i>
                <div class="info">
               Total Members
               <span><a href="members.php"><?php echo countItems('UserID', 'users'); ?></a></span>
                  </div>
            </DIV>
        </div>
        <div class="col-md-4">
            <DIV class="STAT2">
                <i class="fa fa-tag"></i>
                    <div class="info">
                
               Total Items
              
         <span><a href="items.php"><?php echo countItems('item_ID', 'items'); ?></a></span></div>
            </DIV>
        </div>
        

        <div class="col-md-4">
            <DIV class="STAT4">
                <i class="fa fa-box"></i>
                <div class="info">
               Total Orders
               <span><a href="orders.php"><?php echo countItems('id', 'orders'); ?></a></span></div>
            </DIV>
        </div>
    </div>
</div>
<div class="latest">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
            <?php  $latestUsers = 5?>
                <div class="panel-heading"> <i class="fa fa-users"></i>  Latest <?php  echo $latestUsers?> Registered Users</div>
                <div class="panel-body"> <?php $theLatest = getLatest("*", "users", "UserID", 5);
                  ?> <ul class="list-unstyled latest-users"><?php
                   foreach ($theLatest as $user)
                {
                    echo '<li>' .  $user ['username'] . '<a href="members.php?do=Edit&userid=' . $user['UserID'] . '"><span class ="btn btn-success pull-right"> <i class= "fa fa-edit"></i> Edit</a></span> </li>';
                } 
                
                ?></ul></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
            <?php  $latestUsers = 5?>
                <div class="panel-heading"> <i class="fa fa-box"></i>  Latest <?php  echo $latestUsers?> Orders</div>
                <div class="panel-body"> <?php $theLatest = getLatest("*", "orders", "id", 5);
                  ?> <ul class="list-unstyled latest-users"><?php
                   foreach ($theLatest as $user)
                {
                    echo '<li>' .  $user['total_products'] .'<div class="cadre">' .  $user['total_price']. ' DH</div></li>';
                     
                } 
                
                ?></ul></div>
            </div></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
            <?php  $latestItems = 5?>
                <div class="panel-heading"> <i class="fa fa-tags"></i> Latest <?php  echo $latestItems?> Items</div>
                <div class="panel-body"> <?php $theLatest = getLatest("*", "items", "item_ID", 5);
                  ?> <ul class="list-unstyled latest-users"><?php
                   foreach ($theLatest as $item)
                {
                    echo '<li>' .'<img src="jennate/'.$item['picture'] .'"><br>'.  $item ['Name'] . '<a href="items.php?do=Edit&userid=' . $item['item_ID'] . '"><span class ="btn btn-success pull-right"> <i class= "fa fa-edit"></i> Edit</a></span> </li>';
                } 
                
                ?></ul></div>
            </div>
        </div>
    </div>
<style>
    .latest-users li img{
        width: 50px;
      height: 50px;
      
    }
</style>
    <div class="row">
        
           
        </div>
        
            


    
</div>
<?php

} else{
    header('Location: adminlogin.php');
    exit();
} 
ob_end_flush();
?>     
 
<style>
    body, html {
  font-family: cursive;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}
    .container{
        margin-left: 100px;
        text-align: center;
    }
    .latest{
        
        margin-left: 100px;
        margin-top: 30px;
       
        
    }.container .STAT1 i{
       position: absolute;
       font-size: 60px;
       top:57px;
       left:27px;
       color:#fff;

    }.container .STAT2 i{
       position: absolute;
       font-size: 60px;
       top:57px;
       left:27px;
       color:#fff;

    }.container .STAT3 i{
       position: absolute;
       font-size: 60px;
       top:57px;
       left:27px;
       color:#fff;

    }.cadre{
      width: 70px;
        padding: 3px 3px;
        background-color:#ffb8b8;
        border-color: #ffb8b8;
        font-size: 17px;
        border-radius: 5px;
        float: right;
        font-weight: 800;
        text-align: center;
    }
   
    .container .STAT3{
        background-color: #CCABD8;
        border: 1px solid #ccc;
        padding: 20px;
        font-size: 25px;
        border-radius: 20px;
    }
    .container .STAT3 span{
        display: block;
        font-size: 50px;
        color: #FFF;

    }
    .container .STAT4 i{
       position: absolute;
       font-size: 60px;
       top:57px;
       left:27px;
       color:#fff;

    }
   
    .container .STAT4{
        background-color: #ffb8b8;
        border: 1px solid #ccc;
        padding: 20px;
        font-size: 25px;
        border-radius: 20px;
    }.container .STAT4 span{
        display: block;
        font-size: 50px;
        color: #FFF;

    }
    
    .container .STAT2{
        background-color: #26bac9de;
        border: 1px solid #ccc;
        padding: 20px;
        font-size: 25px;
        border-radius: 20px;
    }
    .container .STAT2 span{
        display: block;
        font-size: 50px;
        color: #FFF;

    }
    .container .STAT1 a{
        color: #fff;
        text-decoration: none;
    }
    .container .STAT2 a{
        color: #fff;
        text-decoration: none;
    }
    .container .STAT3 a{
        color: #fff;
        text-decoration: none;
    }.container .STAT4 a{
        color: #fff;
        text-decoration: none;
    }
    .container .STAT1{
        background-color: #00b894;
        border: 1px solid #ccc;
        padding: 20px;
        font-size: 25px;
        border-radius: 20px;
    }
    .container .STAT1 span{
        display: block;
        font-size: 50px;
        color: #FFF;

    }
    
    .latest-users {
        margin-bottom: 0;
    }
    .latest-users li{
        padding: 6px 0;
        overflow: hidden;
        
    }
    .latest.latest-users li:nth-child(odd){
        background-color: #CCABD8;

    }
    .latest-users .btn-success{
        padding: 2px 8px;
        background-color:#ffb8b8;
        border-color: #ffb8b8;
        font-size: 17px;
    }.comment-box .member-c .btn-success{
        padding: 2px 8px;
        background-color:#ffb8b8;
        border-color: #ffb8b8;
        font-size: 17px;
       
    }


	.text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #fff;
	
	}
  
	.text-center:hover{
		color: #bac34e;
		
	}.comment-box{
        margin: 5px 0 10px ;
    }/*.comment-box .member-n,
    .comment-box .member-c{
        float: left;
    }*/.comment-box .member-n{
        width: 80px;
        text-align: center;
        margin-right: 20px;
        position: relative;
        top: 5px;
        color: #00b894;
    }.comment-box .member-c{
       
        background-color: #2bb89c7a;
        padding: 10px;
      
        
    }
    .comment-box .member-c{
        width:  calc(100% -100px);
    
    }.panel {
    margin-bottom: 20px;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 10px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%)
}.panel .panel-body{
    color:#fff;
    font-size: 20px;
    
}.panel .panel-body ul li{
    border-bottom: 1px solid #CCABD8;
    
}

  
</style>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>