<?php
session_start();
require_once'../connections/connect.php';

$username = "";
$email = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password_1 = $_POST['password'];
  $password_2 = $_POST['password2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array


  if ($password_1 != $password_2) {
  array_push($errors, "Password is required");
  header('location: ../signup.php?error=passwordsdontmatch');
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $sql = "SELECT * FROM users WHERE email=? LIMIT 1;";
  $stmt = mysqli_stmt_init($link);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL Statement Failed";
  }else{
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

  }





  if ($row) { // if user exists
    if ($row['username'] === $username) {
      array_push($errors, "Password is required");
      header('location: ../signup.php?error=usernameexists');
    }

    if ($row['email'] === $email) {
      array_push($errors, "Password is required");
      header('location: ../signup.php?error=emailexists');
    }
  }

  // Finally, register user if there are no errors in the form
 if (count($errors) == 0) {
   $password = md5($password_1);//encrypt the password before saving in the database

   $sql = "INSERT INTO users (name, email, password)
         VALUES(?, ?, ?)";

   $stmt = mysqli_stmt_init($link);
   if(!mysqli_stmt_prepare($stmt, $sql)){
     echo "SQL Error";
   }else{
     mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password);
     mysqli_stmt_execute($stmt);
     $_SESSION['fullname'] = $fullname;
     $_SESSION['success'] = "You are now logged in";
     $_SESSION['email'] = $email;
     header('location: ../index.php');
   }

 }
}


//////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////LOGIN API/////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['login_user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];




  	$password = md5($password);
  	$sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = mysqli_stmt_init($link);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "SQL Error";
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $email, $password);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1) {
    	  $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $row['name'];
        $_SESSION['email'] = $email;
        header("location:../index.php");
    	}else {
        header('location: ../login.php?error=wrong');
    	}

  }
}

if (isset($_POST['login_user2'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];




  	$password = md5($password);
  	$sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = mysqli_stmt_init($link);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "SQL Error";
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $email, $password);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1) {
    	  $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $row['name'];
        $_SESSION['email'] = $email;
        header('location: ../allproducts.php');
    	}else {
        header('location: ../login.php?error=wrong');
    	}

  }
}

 ?>
