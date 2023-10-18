<?php

   function checkItem($select, $from, $value){
    global $con;
    $statement =$con->prepare("SELECT $select FROM $from WHERE $select = ?");


    $statement ->execute(array($value));


    $count = $statement->rowCount();

    return $count;
}

/*count number of items */
function countItems($item, $table){
    global $con;
    
    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table ");
    $stmt2 ->execute();
    return $stmt2->fetchColumn();


}
/*
get latest record function;
*/

function getLatest($select, $table,$order, $limit= 10){

    global $con;

    $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC   LIMIT $limit");

    $getStmt ->execute();

    $rows = $getStmt-> fetchAll();

    return $rows;

}


function redirectHome($msg, $url = null, $seconds = 3){
       if($url === null){
        $url = 'Dashboard.php';
        $link ='Dashboardpage';
       } else {
            if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
           $url = $_SERVER['HTTP_REFERER'];
           $link= 'previous page';
           } else{
                $url = 'Dashboard.php';
                 $link= 'Dashboard page';
       }
    }     
       echo $msg; 
       echo "<div class ='alert alert-info'>You will be redirected to $link After $seconds seconds.</div>";
        header("refresh:$seconds;url=$url");
        exit();
    }

    $sessionUser = '';
    if(isset ($_SESSION['user'])){
        $sessionUser = $_SESSION['user'];

    }

   
    function afficher1($tableName){
        global $con;
        
            $getAll = $con->prepare("SELECT * FROM $tableName");
    
            $getAll->execute();
    
            $all = $getAll->fetchAll();
    
            return $all;
    }

    function getAllFrom($tableName){
        global $con;
        
            $getAll = $con->prepare("SELECT * FROM $tableName");
    
            $getAll->execute();
    
            $all = $getAll->fetchAll();
    
            return $all;
    }


function afficher()
{
	global $con;

		$req=$con->prepare("SELECT * FROM categories ORDER BY ID ASC");

        $req->execute();

        $con = $req->fetchAll(PDO::FETCH_OBJ);

        return $con;

        $req->closeCursor();
	
}

function getCat(){

    global $con;
    
    $getCat = $con->prepare("SELECT * FROM categories ORDER BY ID ASC");
    
    $getCat->execute();
    
    $cats = $getCat-> fetchAll();
    
    return $cats;
  }  

  function getItems($CatID){

    global $con;
    
    $getItems = $con->prepare("SELECT * FROM items WHERE cat_ID = ? ORDER BY item_ID ASC");
    
    $getItems->execute(array($CatID));
    
    $items = $getItems-> fetchAll();
    
    return $items;
  }  

  
?>

    
