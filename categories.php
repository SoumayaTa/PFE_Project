<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
      $stmt2 = $con ->prepare("SELECT * FROM categories");
      $stmt2->execute();
      $cats = $stmt2->fetchAll();?>
      <h1 class="text-center">Manage Categories</h1>
      <div class="categories">
        <div class="panel panel-default">
          <div class="panel-heading"> Manage categories </div>
          <div class="panel-body">
           
            <?php
            foreach($cats as $cat){
              echo "<div class = 'cat'>";
               echo "<div class= 'hidden-button'>";
               echo "<a href= 'categories.php?do=Edit&catid=" .$cat["ID"] . " ' class= 'btn  btn-primary'>Edit</a>";
               echo "<a href= 'categories.php?do=Delete&catid=" .$cat["ID"] . "' class= ' confirm btn  btn-danger confirm'>Delete</a>";
              echo "</div>";
              echo "<h3>" . $cat['Name'] . "</h3>";
              echo "<p>";
             
              if($cat['Visibility'] == 1){
                echo '<span class= "Visibility">Hidden</span>';

              }
              if($cat['Allow_comment'] == 1){
                echo '<span class= "commenting">Hidden</span>';

              }
              echo "</div>";
    

              echo "<hr>";

            }
            ?>
            
          </div>
        </div>
        <a  class = "btn btn-primary"href ="categories.php?do=Add"><i class="fa fa-plus"></i> Add new category</a>
      </div>



<?php
    }elseif ($do == 'Add'){?>
     <h1 class="text-center">Add new category</h1>
  <div class="container">
    <form role="form" method="post" action="?do=Insert">
	
      <div class="form-group form-group-lg">
        <label  class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name"  required="required" placeholder="Name of the category" autocomplete="off" required="required">
          
        </div>
      </div>
      <div class="form-group form-group-lg">
        <label  class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          
          <input type="text" class="form-control"  name="description" placeholder="Describe the category">
          
        </div>
      </div>

	  <div class="form-group form-group-lg">
        <label  class="col-sm-2 col-form-label">Visible</label>
        <div class="col-sm-10">
          <div>
            <input  id="vis-yes" type="radio" name="visibility" value="0" checked/>
            <label   for="vis-yes"> Yes</label><br>
            <input id="vis-no"type="radio" name="visibility" value="1" checked/>
            <label for="vis-no"> No</label>
          </div>
        </div> 
      </div>
      
      <div class="form-group row form-group-lg">
        <div class="offset-sm-4 col-sm-10  ">
          <input type="submit" value="Save" name="submit" class="btn btn-primary btn-lg"/>
        </div>
      </div>
    </form>
  </div>
  

<?php
    }elseif($do == 'Insert' ){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<h1 class ='text-center'>Insert category</h1>";
        echo " <div class ='container'";
    

        $name    = $_POST['name'];
        $desc    = $_POST['description'];
        
        $visible = $_POST['visibility'];
        $comment = $_POST['commenting'];

        $check = checkItem ("Name", "categories", $name);

          if($check ==1){  
            $msg = '<div class = "alert alert-danger">Sorry this category is exist</div>';
            redirectHome($msg, 'back');
            
         }else{
          $stmt = $con ->prepare("INSERT INTO 
          categories(Name, Description, Visibility, Allow_comment) 
          VALUES(:zname, :zdesc, :zvisible, :zcomment)");
          $stmt -> execute( array(
              'zname'     => $name,
              'zdesc'     => $desc,
              'zvisible'  => $visible,
              'zcomment'  => $comment
            ));
          $msg = "<div class ='alert alert-success'>" .$stmt->rowCount() .'Record Inserted </div>';
          redirectHome($msg, 'back');                                                                
        }
         
      }else{
        echo "<div class='container'>";
        $msg = '<div class = "alert alert-danger">Sorry you can not browse this page</div>';
        redirectHome($msg, 'back');
        echo "</div>";
      }


    }elseif($do == 'Edit' ){
      
$catid = isset($_GET['catid'])&& is_numeric($_GET['catid']) ? intval ($_GET['catid']) : 0;
$stmt = $con->prepare("SELECT * FROM categories WHERE ID = ?");
  $stmt ->execute(array($catid));
  $cat= $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){
  ?>
 <h1 class="text-center">Edit category</h1>
  <div class="container">
    <form role="form" method="post" action="?do=Update">
    <input type="hidden" name="catid" value ="<?php echo $catid ?>">
	
      <div class="form-group form-group-lg">
     
        <label  class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value = "<?php echo $cat['Name'];?> " required="required">
          
        </div>
      </div>
      <div class="form-group form-group-lg">
        <label  class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10 ">
          
          <input type="text" class="form-control"  name="description"  value = "<?php echo $cat['Description'];?> " placeholder="Describe the category">
          
        </div>
      </div>
     

	  <div class="form-group form-group-lg">
        <label  class="col-sm-2 col-form-label">Visible</label>
        <div class="col-sm-10">
          <div>
            <input  id="vis-yes" type="radio" name="visibility" value="0" <?php if($cat['Visibility'] == 0){ echo 'checked';}?>/>
            <label   for="vis-yes"> Yes</label><br>
            <input id="vis-no"type="radio" name="visibility" value="1" <?php if($cat['Visibility'] == 1){ echo 'checked';}?>/>
            <label for="vis-no"> No</label>
          </div>
        </div> 
      </div>
      
      <div class="form-group row form-group-lg">
        <div class="offset-sm-4 col-sm-10  ">
          <input type="submit" value="Save" name="submit" class="btn btn-primary"/>
        </div>
      </div>
    </form>
  </div>
  
<?php
}else{
  echo "<div class = 'container'>";
  $msg = '<div class = "alert alert-danger">There is no such id</div>';
  redirectHome($msg, 'back');
  echo "</div>";
}
    }elseif($do == 'Update' ){
      echo "<h1 class='text-center'>Update Category </h1>";
      echo "<div class='container'>";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //get the variable from the form
        $id    = $_POST['catid'];
        $name  = $_POST['name'];
        $desc  = $_POST['description'];
        $visible  = $_POST['visibility'];
        $comment  = $_POST['commenting'];
  
        $stmt =$con->prepare(" UPDATE categories SET 
              Name=?,
              Description =?, 
              Visibility = ? ,
              Allow_comment = ?
         WHERE
          ID = ?");
        $stmt->execute(array($id, $name, $desc, $visible, $comment));
        $msg= '<div class="alert alert-success">' . $stmt->rowCount() . 'Record Updated </div>';
       
      }else{
        $msg = '<div class = "alert alert-danger">Sorry you can not browse this page directly</div>';
        redirectHome($msg, 'back');
      }echo "</div>";

    }elseif($do == 'Delete' ){
      $catid = isset($_GET['catid'])&& is_numeric($_GET['catid']) ? intval ($_GET['catid']) : 0;

      $check = checkItem ('ID', 'categories', $catid);
      if($check > 0){
        $stmt = $con->prepare("DELETE FROM categories WHERE ID = :zid");
        $stmt-> bindParam(":zid", $catid);
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
  font-family: 'Source Sans Pro', sans-serif;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}.col-sm-2{
  color: #fff;
  font-size: 20px;
}label{
  color:#fff;

}
	.text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #fff;
	
	}.form-control{
    position: relative;
  }
  
	.text-center:hover{
		color: #bac34e;
		
	}.col-sm-10{
    margin-bottom: 20px;
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
.control-label{
    font-size: 20px;
    color: #666;
}
</style>

     </body>
     </html>
     
     