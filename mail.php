
<?php 

if(isset($_POST['submit']))
{
   $UserName = $_POST['name'];
   $Email = $_POST['email'];
   
   $Msg = $_POST['message'];

   if(empty($UserName) || empty($Email) || empty($Msg))
   {
       header('location:contact us1.php?error');
   }
   else
   {
       $to = "shoptravel54@gmail.com";

       if(mail($to,$Msg,$Email))
       {
           header("location:contact us1.php?success");
       }
   }
}
else
{
    header("location:contact us1.php");
}
?>