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

    <header id='shoppingheader' style="position:relative;top:180px;width:70%;margin:0px auto;">
      <p style="font-size:25px;">Your shopping bag</p>
    </header>
    <div class="container-cart d-flex" style="position:relative;top:200px; width:70%;margin:0px auto;">
      <div class="cart" style="width:60%;">
        <table id='cart'>
          <tr style="border-bottom:1px solid grey;">
            <th style="padding-bottom:20px;text-align:left;">Product details</th>
            <th style="padding-bottom:20px;text-align:left;">quantity</th>
            <th style="padding-bottom:20px;text-align:left;">price</th>
            <th style="color:white;">delete</th>
          </tr>

          <?php
          if(isset($_SESSION['email'])){
          $sql = "SELECT * FROM cart JOIN products ON cart.productID = products.productID WHERE cart.email=?;";
          $stmt = mysqli_stmt_init($link);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL Statement Failed";
          }else{
            $email = $_SESSION['email'];
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_array($result)){
              echo '<tr style="border-bottom:1px solid grey;">

                <td style="padding:20px 0px;min-width:250px;" id="firsttd">
                  <div class="imagecart d-flex" style="width:120px;height:78px;">
                    <img src="'.$row['productImage'].'" alt="" style="width:120px;height:60px;">
                    <div class="info" style="margin-left:10px;">
                      <p>RayBan</p>
                      <p>Frame:Black</p>
                      <p>Lenses:Brown</p>
                    </div>
                  </div>
                </td>


                <td style="font-size:20px;">';
                if($row['quantity'] < 2){
                  echo $row['quantity'].'<a href="./config/includes/addquantity.php?productid='.$row['productID'].'" class="carticona"><span class="icon-plus carticon" style="font-size:15px;color:black;"></span></a>';
                }else{
                  echo '<a href="./config/includes/subtractquantity.php?productid='.$row['productID'].'" class="carticona"><span class="icon-minus carticon" style="font-size:15px;color:black;"></span></a>'.$row['quantity'].'<a href="./config/includes/addquantity.php?productid='.$row['productID'].'" class="carticona"><span class="icon-plus carticon" style="font-size:15px;color:black;"></span></a>';
                }
                echo '</td>

                <td>
                  '.$row['productPrice'].'SR
                </td>

                <td>
                  <a href="./config/includes/deletefromcart.php?productid='.$row['productID'].'" class="carticona"><span class="icon-trash carticon" style="font-size:20px;color:grey;margin-left:0px;margin-right:-20px;"></span></a>
                </td>
              </tr>';

            }
          }
        }else{
          echo "<h2>You have to be logged in to be able to view your cart!</h2>";
        }
           ?>
        </table>
      </div>

      <div class="checkout" style='width:30%;'>
        <div class="checkoutdel" style="border-bottom:1px solid grey; width:100%;">
          <p style="margin-bottom:5px; font-size:20px;">Expected Delivery</p>
          <p style="font-size:15px;">Not Available</p>
        </div>
        <div class="pricedetails" style="padding-bottom:10px;border-bottom:1px solid grey;">
          <?php
          if(isset($_SESSION['email'])){
          $sql = "SELECT * FROM cart JOIN products ON cart.productID = products.productID WHERE cart.email=?;";
          $stmt = mysqli_stmt_init($link);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL Statement Failed";
          }else{
            $email = $_SESSION['email'];
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $price = 0;
            while($row = mysqli_fetch_array($result)){
              $price = $price + ($row['productPrice'] * $row['quantity']);
              $_SESSION['totalprice'] = $price;
            }
            echo '<p>Subtotal: '.$price.' SR</p>';
          }
        }else{

        }

           ?>

          <p>Shipping Cost: Free</p>
        </div>

        <div class="checkoutbutton" style='text-align:center;padding-top:20px;'>
          <?php
          if(isset($_SESSION['email'])){
            echo '<a href="checkout.php"><input type="button" id="checkout" name="" value="Checkout now" style="background:#222222;color:#ffffff;border:none;border-radius:15px;width:250px;height:33px;font-weight:300;font-size:15px;"></a>';
          }else{
            echo '<input type="button" id="checkout" name="" value="You have to be logged in!" style="background:#222222;color:#ffffff;border:none;border-radius:15px;width:250px;height:33px;font-weight:300;font-size:15px;">';
          }
           ?>

        </div>


      </div>
    </div>










  </body>
</html>
