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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <style media="screen">
        *{
          font-family: 'Roboto';
        }
        nav ul li a{
          display:inline !important;
        }
        nav ul li{
          float:none;
        }
        nav ul li a:hover{
          background: none;
        }
        nav ul{
          line-height: 24px;
        }
        </style>
  </head>
  <body id="body">
    <div class="d-flex justify-content-center information-upper align-items-center">
      <p style='margin:0px;text-transform:uppercase'> FREE 2-DAY SHIPPING & FREE RETURNS</p>
    </div>
    <?php require_once "nav.php"; ?>

    <div class="content d-flex justify-content-around">
      <!-- Slideshow container -->
        <div class="slideshow-container" style="margin:0px;left:80px;">

  <!-- Full-width images with number and caption text -->
  <?php
  $productid = $_REQUEST['productid'];
  $sql = "SELECT * FROM productimages WHERE productID = '$productid'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  echo '<div class="mySlides">
      <div class="numbertext">1 / 3</div>
      <img src="'.$row['image1'].'" style="width:1000px;height:500px;">

  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="'.$row['image2'].'" style="width:1000px;height:500px;">

  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="'.$row['image3'].'" style="width:1000px;height:500px;">

  </div>'
   ?>


  <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
          <div style="position:relative; margin:0px; left:400px;top:0px;" class="dotsthing">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div>

        </div>
<br>
    <div class="productinfo">
      <?php
        $productid = $_REQUEST['productid'];
        $sql = "SELECT * FROM products WHERE productID = '$productid'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        echo '<p class="name">'.$row['productName'].'</p>';
        echo '<p class="price">'.$row['productPrice'].' Sr</p>';
       ?>


  <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">notes</i>Product Description</div>
      <div class="collapsible-body" style="background:White;"><span>Ray-Ban Erika RB4171 sunglasses are the perfect accessory to complete any look. Featuring both classic and bright rubber fronts, metal temples and tone-on-tone temple tips, Ray-Ban Erika sunglasses will set your look apart from the crowd. The oversized Round Sunglasses shape provides extra coverage and 100% UV protection, while the soft bridge adds a twist to this design. </span></div>
    </li>

  </ul>
  <?php
    if(isset($_SESSION['email'])){
      echo '<form class="" action="./config/includes/addtocart.php?productid='.$_REQUEST['productid'].'" method="post">
        <button type="submit" name="button" style="width:400px;background:black;color:White;height:61px;text-transform:uppercase;font-size:20px;margin-bottom:30px;border:none;">Add to Cart</button>
      </form>';
    }else {
      echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width:400px;background:black;color:White;height:61px;text-transform:uppercase;font-size:20px;margin-bottom:30px;border:none;">
  Add to cart
</button>';
    }
   ?>

  </div>
  <div class="modal fade" id="myModal" style="width:100%;background-color:transparent;max-height:none;width:100%;margin:0px;animation-name:none;">
  <div class="modal-dialog modal-dialog-centered" style="width:50% ;max-width:none;height:300px;">
    <div class="modal-content" style="padding:0px !important;">

      <!-- Modal Header -->

        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->


      <!-- Modal body -->
      <div class="modal-body" style="padding:0px !important;">
        <div class="form" id='productform' style="width:100%;height:100%;position:static;height:auto;">
          <div class="left-form" style="background:white;">
            <div class="form-header">
              <p>Sign In</p>
            </div>
            <div class="form-content">
              <iframe src="" width="" height="" name='myiframe' style='display:none;'></iframe>
              <form class="" action="./config/config.php" method="post" target="myiframe">
                <label for="email" style="background:transparent;">EMAIL</label><br>
                <input type="text" name="email" placeholder="enter your email address" required autocomplete="none"><br><br>
                <label for="password" style="background:transparent;">PASSWORD</label><br>
                <input type="password" name="password" placeholder="" required><br>
                <a href="#">Forgot Password?</a><br><br><br>
                <a href="signup.php" style="margin:0px;">Dont have an account?</a><br><br><br>
                <button type="submit" name="login_user2">Sign In</button>
              </form>
            </div>
          </div>
          <div class="right-form">

          </div>
        </div>
      </div>

      <!-- Modal footer -->


    </div>
  </div>
</div>
<!-- The dots/circles -->

      <!--PRODUCT INFO MOFO-->


    <script type="text/javascript">
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
  $('.collapsible').collapsible();
});

    </script>
  </body>
</html>
