<?php 
include_once 'FPDF/fpdf.php';
$pdf = new FPDF();
$pdf -> AddPage();
$pdf ->Image('jennate/amana.jpg',10,10,25,25);
$pdf ->SetFont("Arial","B", 16);
$pdf ->SetTextColor(252,3,3);
$pdf ->Cell(200,20,"Thank you for choosing us","0","1","C");
$pdf ->SetLeftMargin(30);
$pdf ->SetTextColor(0,0,0);



$con = new PDO("mysql:host=localhost;dbname=notreshop","root","");
if(isset($_GET['orderid'])){
    $id = $_GET['orderid'];
    $query ="SELECT * FROM orders WHERE id='$id'";
    $result = $con->prepare($query);
    $result->execute();
    if($result->rowCount()!=0){
        while($order = $result->fetch()){
  $pdf->SetX(300);         
$pdf ->Cell(269,20,"Phone number :".$order['number'],"0","1","B");
$pdf ->Cell(269,20,"Client name :".$order['name'],"0","1","B");
$pdf ->Cell(269,20,"Phone number :".$order['number'],"0","1","B");
$pdf ->Cell(269,20,"Adress:".$order['street'].",".$order['city'].",".$order['country'],"0","1","B");

$pdf ->Cell(269,20,"payment method :".$order['method'],"0","1","B");
$pdf ->Cell(269,20,"Products :".$order['total_products'],"0","1","B");
$pdf ->Cell(269,20,"Total price :".$order['total_price'] ."DH","0","1","B");
$pdf ->Cell(269,20,"Date:".$order['date'],"0","1","B");
$pdf ->Cell(269,20,"NB :This receipt is valid for 10 days.","0","1","B");
$pdf ->SetFont("Arial","",14);
        }
    }else{
        echo "Not Found Record";
    }
}


$pdf ->Output();
?>