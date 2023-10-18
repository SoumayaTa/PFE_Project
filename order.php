
<?php
ob_start();
 session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    include 'connect.php';
    include 'h.php';
    include 'functions.php';

    $do= isset($_GET['do'])? $_GET['do'] :'Manage';
    if($do =='Manage'){
      $stmt = $con->prepare("SELECT orders.*, users.username AS Member_name
                           FROM orders
                               INNER JOIN users
       ON users.username = orders.Member_name
       WHERE Member_Name = '$username'
       AND orders.statut = '1'");



      $stmt->execute(array());
      //assign to var
      $orders = $stmt->fetchAll();
      ?><br><br><br><br><h1 class="text-centr">My <span>orders</span></h1>
      <div class="container">
        <div class="teble-responsive">
          <table class="main-table manage-items text-center table table-bordered">
            <tr>
              <td>Products</td>
              <td>Total price</td>
              
              <td>Date</td>
              <td>Download</td>
              <td></td>
              
            </tr>
            <?php 

            foreach ($orders as $order){
              echo "<tr>";
              echo "<td>" . $order['total_products'] . "</td>";
                echo "<td>" . $order['total_price'] . " DH</td>";
                echo "<td>" . $order['date'] . "</td>";
                echo "<td><a href='pdf.php?orderid=".$order['id'] ."'>Download Now</a></td>";
                echo "<td><a href='order.php?do=Delete&orderid=" . $order['id'] . "' class='btn btn-danger confirm'>Delete</a></td>";
              echo "</tr>";
            }
            ?>
            
          </table>
        </div>
        
      </div>
      <?php }elseif($do == 'Delete' ){
        
      $orderid = isset($_GET['orderid'])&& is_numeric($_GET['orderid']) ? intval ($_GET['orderid']) : 0;

      $check = checkItem ('id', 'orders', $orderid);
      if($check > 0){
        $stmt = $con->prepare("DELETE FROM orders WHERE id = :zid");
        $stmt-> bindParam(":zid", $orderid);
        $stmt->execute();
        
          echo '<div class="alert alert-success">' .$stmt->rowCount() .'Record Deleted</div>';
          
    }else{
      echo '<div class ="alert alert-danger">This id is not exist</div>';
      
    }
    
    }
      }?>
      <a href="profile.php" style="text-decoration:none;"><i class="fa-solid fa-arrow-left-long-to-line"></i> Return to profile page</a>
      <?php
      include 'footer.php';
      ?>
      <style>
          body, html {
            font-family: cursive;
            background-color: #f9f9fa;
  padding: 0;
  margin: 0;
}
	.text-centr{
    font-family: cursive;
    -webkit-box-align: center;
             -ms-flex-align: center;
                 align-items: center;
         font-size: 3rem;
         margin-bottom: 3rem;
         padding: 1.2rem 0;
         border-bottom: 0.1rem solid rgba(0, 0, 0, 0.1);
         color: #222;
         text-align: center;
	
	}.text-centr span{
    font-family: cursive;
    color: #3b98b7;
      padding-left: .7rem;
  }.control-label{
    color:#fff;
  }
  .categories {
    margin-left: 100px;
    margin-right: 50px;
  }
	.categories .panel-body{
    padding: 0;
  }
  .categories hr{
    margin-top: 5px;
    margin-bottom: 5px;
}
.categories .cat {
  padding: 15px;
  position: relative;
  overflow: hidden;

}
.control-label{
    font-size: 20px;
    color: #fff;
}
.categories .cat:hover .hidden-button{
  right: 10px;
}
.categories .cat .hidden-button a{
  margin-right: 5px;
}
.categories .cat .hidden-button{
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
 transition: all .5s ease-in-out;

  position: absolute;
  top: 30px;
 right: -140px;
}
.categories .cat h3{
  margin:  0 0 10px;
}
.categories .cat:hover{
  background-color: #eee;
}
.categories .cat:last-of-type ~ hr{
  display: none;
}
.categories .cat .visibility{
  color:#d35400;
}
 .form-control{
    position: relative;
  }
  .asterisk{
    font-size: 25px;
    position: absolute;
    right: 30px;
    top: 5px;
    color: red;
  }
  .main-table tr:first-child td{
    background-color: #3b98b7;
    color: #fff;
    text-align: center;
  }
    .main-table td{
      background-color:#fff;
      vertical-align : middle  !important;
    }
    .main-table{
      -webkit-box-shadow:0 3px 10px #ccc;
      -moz-box-shadow:0 3px 10px #ccc;
      box-shadow:0 3px 10px #ccc;
    }.manage-items img{
      width: 50px;
      height: 50px;

    }
      </style>