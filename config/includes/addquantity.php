<?php
require_once"../../connections/connect.php";
session_start();
$productid = $_REQUEST['productid'];
$email = $_SESSION['email'];
$sql = "SELECT * FROM cart WHERE productID = ? AND email = ?";
$stmt = mysqli_stmt_init($link);
   if(!mysqli_stmt_prepare($stmt, $sql)){
     echo "SQL Error";
   }else{
     mysqli_stmt_bind_param($stmt, "is", $productid, $email);
     mysqli_stmt_execute($stmt);
     echo "Done!";
     $result = mysqli_stmt_get_result($stmt);
     $row = mysqli_fetch_array($result);
     $currentquantity = $row['quantity'];
     echo $currentquantity;
     //header("location:../../cart.php");
   }

   $updatedquantity = $currentquantity + 1;
  $sql2 = "UPDATE cart SET quantity = ? WHERE email = ? AND productID = ?";
  echo $sql2;
  $stmt2 = mysqli_stmt_init($link);
     if(!mysqli_stmt_prepare($stmt2, $sql2)){
       echo "SQL Error";
     }else{
       mysqli_stmt_bind_param($stmt2, "isi", $updatedquantity, $email, $productid);
       mysqli_stmt_execute($stmt2);
       header("location:../../cart.php");
     }

 ?>
