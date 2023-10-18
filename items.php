<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>items manage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php
ob_start();
 session_start();
  if(isset($_SESSION['username'])){
    include 'connect.php';
    include 'adminheader.php';
    include 'functions.php';

    $do= isset($_GET['do'])? $_GET['do'] :'Manage';
    if($do =='Manage'){
      $stmt = $con->prepare("SELECT items.*, categories.Name AS cat_name
                           FROM items
                               INNER JOIN categories
       ON categories.ID = items.cat_ID");



      $stmt->execute();
      //assign to var
      $items = $stmt->fetchAll();
      ?>
       
        <h1 class="text-centr">Manage items</h1>
        <div class="container">
          <div class="teble-responsive">
            <table class="main-table manage-items text-center table table-bordered">
              <tr>
                <td>#ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Category</td>
                <td>Image</td>
                <td>Control</td>
              </tr>
              <?php 
  
              foreach ($items as $item){
                echo "<tr>";
                echo "<td>" . $item['item_ID'] . "</td>";
                  echo "<td>" . $item['Name'] . "</td>";
                  echo "<td>" . $item['Description'] . "</td>";
                  echo "<td>" . $item['Price'] . "</td>";
                  echo "<td>" . $item['cat_name'] . "</td>";
                  echo "<td><img src = 'jennate/" . $item['picture'] . "' alt =''/></td>";
                  echo "<td>
                  <a href='items.php?do=Edit&itemid=" . $item['item_ID'] . "' class='btn btn-success'>Edit</a>
                  <a href='items.php?do=Delete&itemid=" . $item['item_ID'] . "' class='btn btn-danger confirm'>Delete</a>
                  </td>";
                echo "</tr>";
              }
              ?>
              
            </table>
          </div>
          <a href="items.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add new item</a>
        </div>
  <?php
    }elseif ($do == 'Add'){?>
     <h1 class="text-centr">Add new item</h1>
  <div class="container">
    <form role="form" method="post" action="?do=Insert" enctype="multipart/form-data">
	
      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="name"  required="required" placeholder="Name of the item" autocomplete="off" required="required">
        <br>
        </div>
      </div>

      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="desc"  required="required" placeholder="Description of the item" autocomplete="off" required="required">
          <br>
        </div>
      </div>


   <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Price</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="price"  required="required" placeholder="Price of the item" autocomplete="off" required="required">
          <br>
        </div>
      </div>
      

      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10 ">
          <select class = "form-control" name="category" >
              <option value="0">...</option>
              <?php
              $stmt2 = $con ->prepare("SELECT * FROM categories");
              $stmt2->execute();
              $cats =$stmt2 ->fetchAll();
              foreach($cats as $cat){
                  echo "<option value='" . $cat['ID'] . "'>" . $cat['Name'] . "</option>";

              }
            ?>

          </select>
          <br>
        </div>
      </div>

      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Item picture</label>
        <div class="col-sm-10 ">
          <input type="file" class="form-control" name="picture"  required="required" placeholder="Picture of the item" autocomplete="off">
          <br>
        </div>
      </div>

     

      <div class="form-group  form-group-lg">
        <div class="offset-sm-6 col-sm-10">
          <input type="submit" value="Save" name="submit" class="btn btn-primary "/>
        </div>
      </div>
    </form>
  </div>
  

<?php
    }elseif($do == 'Insert' ){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){?>
        <h1 class ='text-centr'>Insert item</h1>
         <div class ='container'>
    <?php
        $pictureName = $_FILES['picture']['name'];
        $pictureSize = $_FILES['picture']['size'];
        $pictureTmp = $_FILES['picture']['tmp_name'];
        $pictureType = $_FILES['picture']['type'];
        
        $name    = $_POST['name'];
        $desc    = $_POST['desc'];
        $price   = $_POST['price'];
        $cat     = $_POST['category'];
       
       

        $formErrors = array();
        if(empty($name)){
            $formErrors[] = 'Name can not be empty';
        }
        if(empty($desc)){
            $formErrors[] = 'description can not be empty';
        }
        if(empty($price)){
            $formErrors[] = 'price can not be empty';
        }
        if($cat == 0){
            $formErrors[] = 'Choose a category';
        }
        foreach($formErrors as $error){
            echo '<div class = "alert alert-danger">' . $error .' </div>';
            
        }
        if(empty($formErrors)){
$picture = rand(0, 10000000000) . '_' . $pictureName; 
move_uploaded_file($pictureTmp, "jennate\\". $picture);

             $stmt = $con ->prepare("INSERT INTO 
          items(Name, Description, Price, cat_ID, picture) 
          VALUES(:zname, :zdesc, :zprice, :zcat, :zpic)");
          $stmt -> execute( array(
              'zname'     => $name,
              'zdesc'     => $desc,
              'zprice'    => $price,
              'zcat'      => $cat,
              'zpic'      => $picture,
              
            ));
          $msg = "<div class ='alert alert-success'>" .$stmt->rowCount() .'Record Inserted </div>';
          redirectHome($msg, 'back');                                                                
          }
      }else{
        echo "<div class='container'>";
        $msg = '<div class = "alert alert-danger">Sorry you can not browse this page</div>';
        redirectHome($msg);
        echo "</div>";
      }


    }elseif($do == 'Edit' ){
      
      $itemid = isset($_GET['itemid'])&& is_numeric($_GET['itemid']) ? intval ($_GET['itemid']) : 0;
      $stmt = $con->prepare("SELECT * FROM items WHERE item_ID = ?");
        $stmt ->execute(array($itemid));
        $item= $stmt->fetch();
      $count = $stmt->rowCount();

if($count > 0){
  ?>
 <h1 class="text-centr">Edit item</h1>
  <div class="container">
    <form role="form" method="post" action="?do=Update">
    <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="name" value="<?php echo $item['Name']?>"  placeholder="Name of the item" autocomplete="off" required="required">
        <br>
        </div>
      </div>

      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="desc" value="<?php echo $item['Description']?>"  placeholder="Description of the item" autocomplete="off" required="required">
          <br>
        </div>
      </div>


   <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Price</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" name="price" value="<?php echo $item['Price']?>"  placeholder="Price of the item" autocomplete="off" required="required">
          <br>
        </div>
      </div>
      

      <div class="form-group form-group-lg">
        <label  class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10 ">
          <select class = "form-control" name="category" >
              <option value="0">...</option>
              <?php
              $stmt2 = $con ->prepare("SELECT * FROM categories");
              $stmt2->execute();
              $cats =$stmt2 ->fetchAll();
              foreach($cats as $cat){
                  echo "<option value='" . $cat['ID'] . "'";
                  if($item['cat_ID'] == $cat['ID']){
                    echo 'selected';} echo ">"
                     . $cat['Name'] . "</option>";

              }
            ?>

          </select>
          <br>
        </div>
      </div>

     
   

      <div class="form-group  form-group-lg">
        <div class="offset-sm-6 col-sm-10">
          <input type="submit" value="Save" name="submit" class="btn btn-primary "/>
        </div>
      </div>
      
    </form>
    
    <?php
    $stmt = $con->prepare("SELECT comments.*, users.username AS User
    FROM 
    comments
    INNER JOIN
    users
    ON
    users.UserID = comments.user_id
    WHERE item_id = ?");
    $stmt->execute(array($itemid));
    //assign to var
    $rows = $stmt->fetchAll();
    if(!empty($rows)){
    ?>
    
      <h1 class="text-centr">Manage [<?php echo $item['Name']?>] comments</h1>
        <div class="teble-responsive">
          <table class="main-table text-center table table-bordered">
            <tr>
              
              <td>Comment</td>
              <td>User name</td>
              <td>Added date</td>
              <td>Control</td>
            </tr>
            <?php 

            foreach ($rows as $row){
              echo "<tr>";
              
                echo "<td>" . $row['comment'] . "</td>";
                echo "<td>" . $row['User'] . "</td>";
                echo "<td>" .$row['comment_date'] . "</td>";
                echo "<td>
                <a href='comments.php?do=Edit&comid=" . $row['c_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                <a href='comments.php?do=Delete&comid=" . $row['c_id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                if($row['statut']==0){
                    echo "<a href='comments.php?do=Approve&comid=" . $row['c_id'] . "'class='btn btn-info activate'><i class='fa fa-check'></i> Approve</a>";
               echo "</td>";
              echo "</tr>"; 
            }  
            }
            ?>
          </table>
        </div>
      <?php }?>
  </div>

  
<?php
}else{
  echo "<div class = 'container'>";
  $msg = '<div class = "alert alert-danger">There is no such id</div>';
  redirectHome($msg, 'back');
  echo "</div>";
}
    }elseif($do == 'Update' ){
      echo "<h1 class='text-centr'>Update item </h1>";
      echo "<div class='container'>";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //get the variable from the form
        $id    = $_POST['itemid'];
        $name  = $_POST['name'];
        $desc  = $_POST['desc'];
        $price = $_POST['price'];
        $cat  = $_POST['category'];

        $formErrors = array();
        if(empty($name)){
            $formErrors[] = 'Name can not be empty';
        }
        if(empty($desc)){
            $formErrors[] = 'description can not be empty';
        }
        if(empty($price)){
            $formErrors[] = 'price can not be empty';
        }
        if($cat == 0){
            $formErrors[] = 'Choose a category';
        }
        foreach($formErrors as $error){
            echo '<div class = "alert alert-danger">' . $error .' </div>';
            
        }
        if(empty($formErrors)){
       
  
        $stmt =$con->prepare("UPDATE items SET 
              Name=?,
              Description =?, 
              Price = ?,
              cat_ID =?
              
         WHERE
          item_ID = ?");
        $stmt->execute(array($id, $name, $desc, $price, $cat));
        $msg= "<div class='alert alert-success'>" . $stmt->rowCount() . 'Record Updated </div>';
        redirectHome($msg, 'back');
      }
  
       
      
      }else{
        $msg = '<div class = "alert alert-danger">Sorry you can not browse this page directly</div>';
        redirectHome($msg, 'back');
      }echo "</div>";

    }elseif($do == 'Delete' ){
      $itemid = isset($_GET['itemid'])&& is_numeric($_GET['itemid']) ? intval ($_GET['itemid']) : 0;

      $check = checkItem ('item_ID', 'items', $itemid);
      if($check > 0){
        $stmt = $con->prepare("DELETE FROM items WHERE item_ID = :zid");
        $stmt-> bindParam(":zid", $itemid);
        $stmt->execute();
          $msg= '<div class="alert alert-success">' .$stmt->rowCount() .'Record Deleted</div>';
          redirectHome($msg, 'back');
    }else{
      $msg = '<div class ="alert alert-danger">This id is not exist</div>';
      redirectHome($msg, 'back');
    }
    echo '</div>';
    }
    
}else{
    header ('Location : main.php');
    exit();
}
ob_end_flush();
?>




     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
     body, html {
      font-family: cursive;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}
	.text-centr{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #fff;
	
	}.control-label{
    color:#fff;
  }
  
	.text-centr:hover{
		color: #bac34e;
		
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
    }.manage-items img{
      width: 50px;
      height: 50px;

    }
</style>

     </body>
     </html>
     
     