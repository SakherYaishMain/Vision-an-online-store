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
 require_once("vendor/autoload.php");
 \Stripe\Stripe::setApiKey('sk_test_nR2at4wMDcFABNvYqeS8hPJD006ZlUVr5c');

 $intent = \Stripe\PaymentIntent::create([
  'amount' => $_SESSION['totalprice'] *100,
  'currency' => 'usd',
  'receipt_email' => 'sokoyiyi@gmail.com',
  // Verify your integration in this guide by including this parameter
  'metadata' => ['integration_check' => 'accept_a_payment'],
]);
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
      <script src="https://js.stripe.com/v3/"></script>
      <script type="text/javascript" src='./js/charge.js' async>

      </script>
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




        <style media="screen">

        </style>
  </head>
  <body id="body">
    <div class="d-flex justify-content-center information-upper align-items-center">
      <p style='margin:0px;text-transform:uppercase'> FREE 2-DAY SHIPPING & FREE RETURNS</p>
    </div>
    <?php require_once "nav.php"; ?>
    <div class="checkoutcontent" style="position:relative;top:280px;width:40%;margin:0px auto;">

      <form id="payment-form">
        <div class="shippinginfo" style="">
          <p style="font-size:20px;text-transform:uppercase;">Shipping and Billing Info</p>
          <label for="name">Name on Card</label>
          <input type="text" id='name' name="name" value="" autocomplete='off' placeholder="John Doe">
          <label for="address">Address</label>
          <input type="text" name="address" value="" placeholder="21st Avenue">
          <label for="country">Country</label>
          <input type="text" name="country" value=""placeholder="Kingdom of Saudi Arabia">
          <label for="city">City/State</label>
          <input type="text" name="city" value=""placeholder="Jeddah">
        </div>
        <div class="">
          <p style="font-size:20px;text-transform:uppercase;">payment information</p>
        </div>
        <div id="card-element">

          <!-- Elements will create input elements here -->
        </div>
        <!-- We'll put the error messages in this element -->
       <div id="card-errors" role="alert"></div>
       <div class="submitbutton" style="text-align:center;">
         <button id="submit" style="margin-top:30px;background:rgb(54, 120, 114);color:white;border:none;width:40%;height:40px;font-size:18px;border-radius:5px;">Pay <?php echo $_SESSION['totalprice']; ?> Sr</button>
       </div>

      </form>
      <button id="card-button" style='display:none;' data-secret="<?= $intent->client_secret ?>">

      </button>

    </div>



<script type="text/javascript">
   $('#payment-form').submit(function(){
       $('#submit').html("Loading....");
   })
</script>
</body>


</html>
