<?php
require_once"../../connections/connect.php";
session_start();
$productid = $_REQUEST['productid'];
$email = $_SESSION['email'];
$sql = "INSERT INTO cart (email, productID)
         VALUES(?, ?)";


   $stmt = mysqli_stmt_init($link);
   if(!mysqli_stmt_prepare($stmt, $sql)){
     echo "SQL Error";
   }else{
     mysqli_stmt_bind_param($stmt, "ss", $email, $productid);
     mysqli_stmt_execute($stmt);
     echo "Done!";
     header("location:../../allproducts.php?productadded");
   }
 ?>
