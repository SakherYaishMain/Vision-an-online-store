<?php
require_once"./connections/connect.php";
session_start();
if (!isset($_SESSION['username'])) {
   //$_SESSION['msg'] = "You must log in first";
   //header('location: login.php');
 }
 if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['username']);
   //header("location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
      <link rel="stylesheet" type="text/css" href="./css/index.css<?php echo '?'.mt_rand(); ?>" />
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <style media="screen">
        *{
          font-family: 'Roboto';
        }
        </style>
  </head>
  <body>
    <?php
      if(isset($_REQUEST['productadded'])){
        echo '<div class="alert alert-success alert-dismissible fade show" style="position:absolute;top:100px;z-index:99;left:0px;right:0px;text-align:center;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Item Added to cart!</strong>
        </div>';
      }
     ?>
    <div class="d-flex justify-content-center information-upper align-items-center">
      <p style='margin:0px;text-transform:uppercase'> FREE 2-DAY SHIPPING & FREE RETURNS</p>
    </div>
    <?php require_once "nav.php"; ?>

    <div class="content">
      <div class="repeating d-flex flex-wrap">
        <?php
          $sql = "SELECT * FROM products";
          $query = mysqli_query($link, $sql) or die(mysqli_error($link));
          while($row = mysqli_fetch_array($query)) {
            echo '<div class="product">
              <div class="image">
                <a href="productpage.php?productid='.$row['productID'].'" style="text-decoration:none;border:none;"><img src="'.$row['productImage'].'" alt=""></a>
              </div>
              <div class="productdescription">
                <p class="productprice">'.$row['productPrice'].' Sr</p>
                <p class="vision">VISION</p><br>
                <p class="productname">'.$row['productName'].'</p>

              </div>
            </div>';
          }
         ?>

      </div>
    </div>


  </body>
</html>
