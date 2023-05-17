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
    <div class="d-flex justify-content-center information-upper align-items-center">
      <p style='margin:0px;text-transform:uppercase'> FREE 2-DAY SHIPPING & FREE RETURNS</p>
    </div>
    <?php require_once "nav.php"; ?>


    <div class="banner">

    </div>

    <div class="sections d-flex justify-content-center">
      <div class="left-section">
        <div class="section-shop">
          <p>Mens Sunglasses</p>
          <input type="button" name="" value="SHOP NOW">
        </div>
      </div>
      <div class="right-section">
        <div class="section-shop">
          <p>Womens Sunglasses</p>
          <input type="button" name="" value="SHOP NOW">
        </div>
      </div>
    </div>

    <div class="yes" style='width:100%;height:800px;'>

    </div>

  </body>
</html>
