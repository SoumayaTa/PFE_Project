<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Orders</title>

</head>
<body>
<?php
ob_start();
 session_start();
 if(isset($_SESSION['username'])){
	include 'connect.php';
  include 'functions.php';
  include 'adminheader.php';

    $do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if($do == 'Manage'){ //manage page

    $stmt = $con->prepare("SELECT * FROM orders ");
    $stmt->execute();
    //assign to var
    $rows = $stmt->fetchAll();
    ?>
     
      <h1 class="text-center">Manage orders</h1>
      <div class="container">
        <div class="teble-responsive">
          <table class="main-table table table-bordered">
            <tr>
              <td>#ID</td>
              <td>Client's name</td>
              <td>Client's phone number</td>
              <td>Client's email</td>
              <td>Client's adresse</td>
              <td>Client's city</td>
              <td>Client's country</td>
              <td>Products</td>
              <td>Payment method</td>
              <td>Total price</td>
              <td>Date</td>
              <td></td>
            </tr>
            <?php 

            foreach ($rows as $row){
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" .$row['street'] . "</td>";
                echo "<td>" .$row['city'] . "</td>";
                echo "<td>" .$row['country'] . "</td>";
                echo "<td>".$row['total_products'] . "</td>";
                echo "<td>" .$row['method'] .  "</td>";
                echo "<td>" .$row['total_price'] . " DH </td>";
                echo "<td>" .$row['date'] . "  </td>";
                echo "<td><a href='orders.php?do=Delete&orderid=" . $row['id'] . "' class='btn btn-danger confirm'>Delete</a>";
                if($row['statut']==0){
                  echo "<a href='orders.php?do=Approve&orderid=" . $row['id'] . "'class='btn btn-info activate'><i class='fa fa-check'></i> Approve</a>";
        echo "</td>";
              echo "</tr>";
            }
          }
            ?>
          </table>
        </div>
      </div><?php } elseif($do == 'Approve' ){
         echo "<h1 class='text-cente'>Approve Comment</h1>";
         echo "<div class='container'>";
         $orderid = isset($_GET['orderid'])&& is_numeric($_GET['orderid']) ? intval ($_GET['orderid']) : 0;
         $check = checkItem('id', 'orders', $orderid);
         if($check > 0){
             $stmt = $con->prepare("UPDATE orders SET statut = 1 WHERE id = ?");
             $stmt->execute(array($orderid));
             $msg = "<div class = 'alert alert-success'>" .$stmt->rowCount() . ' Comment Approved</div>';
             redirectHome($msg, 'back');

      }
    }elseif($do == 'Delete' ){
        
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
    }
        ?>
        <style>
            body, html {
              font-family: cursive;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}
	.text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #fff;
	
	}.col-form-label{
    color: #fff;
  }
  
	.text-center:hover{
		color: #bac34e;
		
	}
	.offset-sm-4 {
		width: auto;
		margin-left: 590px;
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
    background-color: #e83e8c7a;
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
      width: 150%;
    }
        </style>