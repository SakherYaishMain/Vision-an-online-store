<?php
require_once"./connections/connect.php";
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
      if (isset($_REQUEST['error'])) {
        
        echo '<div class="alert alert-danger alert-dismissible fade show" style="position:absolute;top:100px;z-index:99;left:0px;right:0px;text-align:center;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Wrong Email/Password</strong>
        </div>';
      }
     ?>


    <div class="d-flex justify-content-center information-upper align-items-center">
      <p style='margin:0px;text-transform:uppercase'> FREE 2-DAY SHIPPING & FREE RETURNS</p>
    </div>
    <?php require_once "nav.php"; ?>

    <div class="form">
      <div class="left-form">
        <div class="form-header">
          <p>Sign In</p>
        </div>
        <div class="form-content">
          <form class="" action="./config/config.php" method="post">
            <label for="email">EMAIL</label><br>
            <input type="text" name="email" placeholder="enter your email address" required autocomplete="none"><br><br>
            <label for="password">PASSWORD</label><br>
            <input type="password" name="password" placeholder="" required><br>
            <a href="#">Forgot Password?</a><br><br><br>
            <button type="submit" name="login_user">Sign In</button>
          </form>
        </div>
      </div>
      <div class="right-form">

      </div>
    </div>




  </body>
</html>
