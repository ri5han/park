<?php

    session_start();
    $username = $_SESSION['username'];
    require('include/dbconnect.php');
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['username']) == false) {
        echo '<body style="display:none;"></body>';
        echo "<script>alert('You are not authenticated. Please login or signup.');</script>";
    }

    if(isset($_GET['spaceId'])){
        $spaceId = $_GET['spaceId'];
        $_SESSION['spaceId'] = $spaceId;
    } else {
        $spaceId = $_SESSION['spaceId'];
    }

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$query);
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    $query = "SELECT id,price,available FROM spaces WHERE id='$spaceId'";
    $result = mysqli_query($conn,$query);
    $spaces = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if(isset($_POST['wallet'])) {
      $query = "SELECT price FROM spaces WHERE id='$spaceId'";
      $result = mysqli_query($conn,$query);
      $price = mysqli_fetch_all($result,MYSQLI_ASSOC);

      $total = $price[0]['price']+0.5+1.5;
      $_SESSION['total'] = $total;
      $balance = $users[0]['balance'];
      if($balance<=$_SESSION['total']) {
        echo "<script>alert('Your wallet balance is not sufficient.');</script>";
        echo "<script>window.location.href='payment.php';</script>";

      } else {
        $balance = $users[0]['balance'] - $total; 
        $queryDist = "UPDATE users SET balance='$balance' WHERE username='$username'";
        $updateDistance = mysqli_query($conn, $queryDist);

      }
  
      //setcookie('spaceId',$spaceId,time()+864000,'/');
      
      $hrs = $_POST['hrs'];
      $mins = $_POST['mins'];
      $_SESSION['startTime'] = date('h:i',mktime($hrs,$mins));
      $endTime = strtotime($_SESSION['startTime']) + 60*60;
      $_SESSION['endTime'] = date('h:i', $endTime);
      $otp = rand(10000,99999);
      $_SESSION['otp'] = $otp;
      $_SESSION['dbentered'] = 0;
      echo "<script>window.location.href='otp.php';</script>";
      //header('Location: otp.php');

  } elseif(isset($_POST['card'])) {
      //setcookie('spaceId',$spaceId,time()+864000,'/');
      $hrs = $_POST['hrs'];
      $mins = $_POST['mins'];
      $_SESSION['startTime'] = date('h:i',mktime($hrs,$mins));
      $endTime = strtotime($_SESSION['startTime']) + 60*60;
      $_SESSION['endTime'] = date('h:i', $endTime);
      $otp = rand(10000,99999);
      $_SESSION['otp'] = $otp;
      $_SESSION['dbentered'] = 0;
      echo "<script>window.location.href='otp.php';</script>";
      //header('Location: otp.php');

  } elseif(isset($_POST['add-money'])) {
      //setcookie('spaceId',$spaceId,time()+864000,'/');
      $money = $_POST['money'];
      $balance = $users[0]['balance'] + $money;
      $queryDist = "UPDATE users SET balance='$balance' WHERE username='$username'";
      $updateDistance = mysqli_query($conn, $queryDist);
      echo "<script>window.location.href='payment.php';</script>";
      //header('Location: payment.php?spaceId');

  }


    $total = $spaces[0]['price']+0.5+1.5;
    $_SESSION['total'] = $total;
    //echo $_SESSION['total'];

?>


<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="icon" href="images/logo.png">
  <title>Parkinzo | Payment</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    .row {
      display: flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      flex: 25%;
      /* IE10 */
      flex: 25%;

    }

    .col-50 {
      flex: 50%;
      /* IE10 */
      flex: 50%;

    }

    .col-75 {
      flex: 75%;
      /* IE10 */
      flex: 75%;


    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #fff7f4;
      padding: 5px 20px 15px 20px;
      border: 2px solid #ff4b20;
      border-radius: 10px;
      margin-left: 3%;
    }

    .col-25 .container {
      margin-top: 12%;
      margin-right: 5%;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #ff4b20;
      color: white;
      padding: 8px;
      margin: 8px;
      border: none;
      width: 35%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: black;
    }

    select {
      background-color: #fff;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .reverse {
        flex-direction: column;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }

    @media (max-width: 500px) {
      .container {
        margin-left: 1%;
      }


      .col-75 {
        padding: 0 22px;
      }

      h2 {
        font-size: 50px;
      }

    }

    @media (max-width: 360px) {
      .container {
        margin-left: 1%;
      }


      .col-75 {
        padding: 0 22px;
      }

      h2 {
        font-size: 25px;
      }
    }

    @media (max-width: 500px) {
      .container {
        margin-left: 1%;
      }


      .col-75 {
        padding: 0 22px;
      }

      h2 {
        font-size: 25px;
      }




    }
  </style>
</head>

<body>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
  <div class="otp-bg">
    <nav id="navbar">
      <!-- logo is specified below -->
      <img style="width: 85px;" class="logo" src="images\logo.png" alt="park">
      <h1><b><span style="color: #ff4b20;">Park</span><span>inzo</span></b></h1>

      <ul>
        <li><a href="listing.php">HOME</a></li>
        <!-- <li><a href="about.html">ABOUT</a></li> -->
        <li><a href="contact.php">CONTACT</a></li>
        <li><i class="fa fa-user"></i>&nbsp;<a style="color: #ff4b20" href="#"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="login.php?logout=1">LOGOUT</a></li>
      </ul>
    </nav>

    <nav class="topnav" id="myTopnav">
      <img class="logo" src="images\logo.png" alt="park">
      <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>

      <a style="padding: 4% 0 0 4%; text-align:center;" href="listing.php">HOME</a>
      <!-- <a href="#news">ABOUT</a> -->
      <a style="margin: 3% 0 0 0%; text-align:center;" href="contact.php">CONTACT</a>
      <a style="margin: 3% 0 0 0%; text-align:center;" href="#"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['username']; ?></a>
      <a style="margin: 3% 0 5% 0%; text-align:center;" href="login.php?logout=1">LOGOUT</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
      </a>
    </nav>

    <br>
    <form method="post" action="payment.php">
    <div class="container row reverse" style="width: 95%;">
        <h3>&nbsp;Select&nbsp; arriving&nbsp; time:</h3>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="hrs">
          <option value="#">Hrs</option>
          <?php
            $hr = date('h');
            $ampm = date('a');
            if($ampm=='am') {
              for($i=$hr;$i<=23;$i++) {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            } else {
              for($i=$hr+12;$i<=23;$i++) {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
              echo '<option value="0">00</option>';
            }
            
          ?>
        </select>
        &nbsp;&nbsp;&nbsp;
        <select name="mins">
            <option value="#">Mins</option>
            <?php
              for($i=0;$i<=59;$i=$i+5) {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            ?>
          </select>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <small>*You get only 1 hour from arrival time.</small>
    </div>



    <div class="row">
      <div class="col-75">
        <div class="container">
          <div class="row">

            <!-- <form method="post" action="payment.php"> -->
              <div class="col-50">
                <h2><b>Pay&nbsp;by &nbsp;<span style="color: #ff4b20;">Card</span>&nbsp;&nbsp;&nbsp;&nbsp;<i
                      class="fa fa-credit-card"></i></b></h2><br>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="Nikhil Mahendra Patil">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Expiry Date</label>
                <input type="text" id="expdate" name="expdate" placeholder="October">
                <div class="row">

                  <input name="card" type="submit" value="Pay by Card" class="btn">
                </div>
              </div>
            <!-- </form>

            <form method="post" action="payment.php"> -->
              <div class="col-50">
                <h2><b>Pay&nbsp;by&nbsp;<span
                      style="color: #ff4b20;">Payinzo&nbsp;Wallet</span>&nbsp;&nbsp;&nbsp;&nbsp;<i
                      class="fa fa-folder-open-o"></i></b></h3><br>
                  <h3 style="margin-left: 5%;"> Wallet Balance: &nbsp;&nbsp;Rs. <?php echo $users[0]['balance']; ?>
                    &nbsp;&nbsp;</h3><br>

                  <label for="money"><i class="fa fa-envelope"></i> Add Money</label>
                  <input type="text" id="cash" name="money" placeholder="Add money">

                  <div class="row">
                    <div class="col-50">
                      <input name="add-money" type="submit" value="Add" class="btn">
                      <input name="wallet" type="submit" value="Pay via Wallet" class="btn">
                    </div>

                  </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <div class="col-25">
        <div class="container">
          <h3>#&nbsp;Price Details<span class="price" style="color:black"></span></h3>
          <hr><br>
          <p>Parking Lot no.</a> <span class="price"><?php echo $spaces[0]['id']; ?></span></p><br>
          <p>Base Price</a> <span class="price"><i class="fa fa-inr"></i> <?php echo $spaces[0]['price']; ?>/hr</span>
          </p><br>
          <p>Service Tax</a> <span class="price"><i class="fa fa-inr"></i> 1.5</span></p><br>
          <p>Processing Fee</a> <span class="price"><i class="fa fa-inr"></i> 0.5</span></p><br>
          <hr><br>
          <p><b>Total Amount</b><span class="price" style="color:black"><b><i
                  class="fa fa-inr"></i>&nbsp;<?php echo $total; ?></b></span></p>
        </div>
      </div>
    </div>
    <br>
    <div class="section-border-o"><br></div>
    <footer>
      <div id="footer">
        <div style="color: #ff4b20;" id="left-footer">
          <br><br><br>
          <div id="footer-site-links">
            <ul style="list-style-type: none;">
              <h2>Site Map</h2>
              <div style="background-color: black;height: 5px;width:50%;"></div>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="#">Members</a></li>
            </ul>
            <ul style="list-style-type: none;">
              <h2>Explore</h2>
              <div style="background-color: black;height: 5px;width:50%;"></div>
              <li><a href="partners.html">FAQ</a></li>
              <li><a href="contact.php">Feedback</a></li>
              <li><a href="rent.php">Rent Space</a></li>
              <li><a href="terms.html">Terms & Conditions</a></li>
            </ul>
          </div><br><br>
          <div class="wrapper">
            <ul>
              <li><a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google fa-2x" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div id="right-footer">
          <h2 style="color: #ff4b20;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Where are we
            located ?</h2>
          <br>
          <div>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.222610388061!2d72.85372091490721!3d19.22912765213814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0d6e771d27b%3A0xcfe3c6ecba9c4c92!2sBhandarkar%20Bhavan%2C%20Sundar%20Nagar%2C%20Borivali%20West%2C%20Mumbai%2C%20Maharashtra%20400092!5e0!3m2!1sen!2sin!4v1566710714948!5m2!1sen!2sin"
              width="380" height="220" frameborder="0" style="border:0;" allowfullscreen="">
            </iframe>
          </div>
        </div>
      </div>
      <div style="background-color: #1c1c1c;text-align:center;">
        <p style="color: white;">&copy;Copyright &nbsp;Parkinzo&nbsp; 2019</p>
      </div>
    </footer>


</body>

</html>
