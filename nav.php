<nav>
  <style media="screen">
  nav{
    background: #ffffff;
    height: 60px;
    width: 100%;
    display: flex;
    position: fixed;
    z-index: 1;
    top:35px;
    border: 1px solid #ebebeb;
    box-shadow:0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2)
  }

  label.logo{
    color:#222222;
    font-size: 35px;
    line-height: 60px;
    padding: 0 80px;
    position: absolute;
    margin:0px;
  }
  nav ul{
    margin: 0 auto;


  }



  .checkbtncart a{
    color: #222222;

  }

  .checkbtncart a:hover{
    color: #222222;
    background: none;
  }

  #checkcart{
    display: none;
  }
  .checkbtncart{
    font-size: 25px;
    color: #222222;
    float: right;
    line-height: 65px;
    margin-right: 40px;
    cursor: pointer;
    position: absolute;
    right:10px;
    margin-bottom: 0px;
  }

  .icon-user{
    font-size: 25px;
    color: #222222;
    float: right;
    line-height: 60px;
    margin-right: 80px;
    cursor: pointer;
    position: absolute;
    right:10px;
  }


  nav ul li{
  display: inline-block;
  line-height: 60px;
  margin: 0 50px;
  }

  nav ul li a{
    color: #222222;
    font-size: 14px;
    padding: 7px 13px;
    text-transform: uppercase;
  }

  a.active,a:hover{

    border-bottom: 1px solid #222222;
    text-decoration: none;
    font-weight: bold;
    color:#222222;
  }

  .checkbtn{
    font-size: 30px;
    color: #222222;
    float: right;
    line-height: 60px;
    margin-right: 20px;
    cursor: pointer;
    display: none;
    position: absolute;
    right:0px;
  }

  #check{
    display: none;
  }



  @media (max-width: 1300px){
    label.logo{
      font-size: 30px;
      padding-left:50px;
      position:
    }

    nav{
      background: #ffffff;
      height: 60px;
      width: 100%;
      display: flex;
    }
    nav ul{
      margin: 0 auto;
    }
    nav ul li a{
      font-size: 16px;

    }
    nav ul li{
      margin: 0 0px;
    }
  }

  @media (max-width: 800px){
    nav{
      display: block;
    }
    .checkbtn{
      display: block;
      float:right;
      }
      .checkbtncart{
        line-height: 60px;
        margin-right: 50px;
        font-size: 30px;
      }
      .icon-user{
        font-size: 30px;
        margin-right: 90px;
        line-height: 53px;
      }

      #navul{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: lightgrey;
        top:90px;
        left:-100%;
        text-align: center;
        transition: all .5s;
        z-index:99;
      }
      .navli{
        display: block;
        margin: 50px 0;
        line-height: 30px;
      }

      nav ul li a{
        font-size: 20px;
      }
      a:hover,a.active{
        background: none;
        color:#0082e6;
      }
      #check:checked ~ ul{
        left: 0;
      }
  }
  @media(max-width: 430px){

    label.logo{
      padding-left:20px;
    }
  }
  </style>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <span class='icon-menu'></span>
  </label>
  <label class='logo'><strong>VISION</strong></label>
  <!--<label class='logo'><img src='./images/logo.jfif'></label>-->
  <ul id="navul">
    <li class="navli"><a class='home' href="index.php">Home</a></li>
    <li class="navli"><a href="allproducts.php">Products</a></li>
    <li class="navli"><a href="">About</a></li>
    <li class="navli"><a href="">Contact Us</a></li>
    <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='navli'><a href='login.php'>Log In</a></li>";


        echo "<li class='navli'><a href='signup.php'>Sign Up</a></li>";

      }else{
        $logouturl = "index.php?logout='1'";
        echo "<li><a href='" .$logouturl. "'>Logout</a></li>";
      }
     ?>
  </ul>
  <input type="checkbox" id="checkcart">
  <label for="checkcart" class="checkbtncart">
    <a href='cart.php' style='border:none;'><span class='icon-bag'></span></a>
  </label>
  <a href='profile.php'><span class='icon-user'></span></a>
</nav>
