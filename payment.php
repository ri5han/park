<?php

    session_start();
    $username = $_SESSION['username'];
    require('include/dbconnect.php');
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['username']) == false) {
        echo '<body style="display:none;"></body>';
        echo "<script>alert('You are not authenticated. Please login or signup.');</script>";
    }

    if($_GET['spaceId']){
        $spaceId = $_GET['spaceId'];
        $_SESSION['spaceId'] = $spaceId;
    } else {
        $spaceId = NULL;
    }

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$query);
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    $query = "SELECT id,price,available FROM spaces WHERE id='$spaceId'";
    $result = mysqli_query($conn,$query);
    $spaces = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $total = $spaces[0]['price']+0.5+1.5;
    $_SESSION['total'] = $total;

    if(isset($_POST['wallet'])) {
        $balance = $users[0]['balance'] - $_SESSION['total']; 
        $queryDist = "UPDATE users SET balance='$balance' WHERE username='$username'";
        $updateDistance = mysqli_query($conn, $queryDist);
        //setcookie('spaceId',$spaceId,time()+864000,'/');
        
        $_SESSION['startTime'] = date('h:i');
        $endTime = strtotime($_SESSION['startTime']) + 60*60;
        $_SESSION['endTime'] = date('h:i', $endTime);
        header('Location: otp.php');

    } elseif(isset($_POST['card'])) {
        //setcookie('spaceId',$spaceId,time()+864000,'/');
        $_SESSION['startTime'] = date('h:i');
        $endTime = strtotime($_SESSION['startTime']) + 60*60;
        $_SESSION['endTime'] = date('h:i', $endTime);
        header('Location: otp.php');

    } elseif(isset($_POST['netbanking'])) {
        //setcookie('spaceId',$spaceId,time()+864000,'/');
        $_SESSION['startTime'] = date('h:i');
        $endTime = strtotime($_SESSION['startTime']) + 60*60;
        $_SESSION['endTime'] = date('h:i', $endTime);
        header('Location: otp.php');

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png">
    <title>Parkinzo | Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("one");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }

    </script>

    <div class="otp-bg">
    <nav id="navbar">
            <!-- logo is specified below -->
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>

            <ul>
                <li><a style="color: #ff4b20" href="listing.php">HOME</a></li>
                <!-- <li><a href="about.html">ABOUT</a></li> -->
                <li><a href="contact.php">CONTACT</a></li>
                <li><a style="color: #ff4b20" href="#"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="login.php?logout=1">LOGOUT</a></li>
            </ul>
        </nav>

        <nav class="topnav" id="myTopnav">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>
            
            <a href="listing.php">HOME</a>
            <!-- <a href="#news">ABOUT</a> -->
            <a href="contact.php">CONTACT</a>
            <a href="#"><?php echo $_SESSION['username']; ?></a>
            <a href="login.php?logout=1">LOGOUT</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <div>
            <div class="pay1">
                <div>
                    <div class="pay-add">
                        <div class="top">
                            <h3 style="padding-left: 5%;background-color:#ff9980;">PAYMENT METHOD</h3>
                        </div>
                        <br>
                        <div class="pay1">
                            <div style="padding-left: 5%; width: 100%;">
                            <form action="payment.php" method="post">

                                &nbsp;&nbsp;&nbsp;<label><b>Pay by <span style="color: #ff4b20;">Payinzo Wallet</span></b></label>
                                <div id="pay-wallet-details">
                                    <h4 style="padding-left: 5%;">Wallet balance: Rs. <?php echo $users[0]['balance']; ?> &nbsp;
                                    <input name="wallet" class="btn btn-primary" type="submit" value="PAY"></h4>
                                </div>
                            </form>
                                <br><br>
                                <div>
                            <form action="payment.php" method="post">
                                    &nbsp;&nbsp;&nbsp;<label><b>Pay by <span style="color: #ff4b20;">Card</span></b></label>
                                    <br>
                                    <div id="pay-card-details" style="padding-left: 5%">
                                        <input type="number" placeholder="Card Number" required>
                                        <input type="number" placeholder="Expiry date" required>
                                        <input type="number" placeholder="CVV" required>
                                        &nbsp;
                                        <input name="card" class="btn btn-primary" type="submit" value="PAY">
                                    </div>
                            </form>
                                </div>
                                <br><br>
                                <div>
                                <form action="payment.php" method="post">
                                    &nbsp;&nbsp;&nbsp;<label><b>Pay by <span style="color: #ff4b20;">Net Banking</span></b></label>
                                    <div id="pay-net-details" style="padding-left: 5%;">
                                        <input type="number" placeholder="Account Number" required>
                                        <input type="password" placeholder="Password" required>
                                        &nbsp;
                                        <input name="netbanking" class="btn btn-primary" type="submit" value="PAY">
                                    </div>
                                </form>
                                </div>
                                <br>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="pay-right">
                        <div class="top">
                            <h3 style="padding-left: 5%;background-color:#ff9980;">PRICE DETAILS</h3>
                        </div>
                        <br>
                        <div class="pay1">
                            <div style="padding-left: 5%;">
                                <b>Time :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                <form action="payment.php" method="post">
                                    <input name="hours" type="number" placeholder="Hrs" style="width:25%; font-weight: bold;">
                                    <button name="calPrice" type="submit" style="width: 30%; background-color: #ff4b20;border:2px solid black; border-radius: 10px;"><b>Get Price</b></button>
                                    <br><br>
                                    <p><b>Parking Lot ID.:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $spaces[0]['id']; ?></p>
                                    <br>
                                    <p> Base Price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.&nbsp;&nbsp;<?php echo $spaces[0]['price']; ?>/ hr</p>
                                    <p> Service Tax :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.&nbsp;&nbsp;&nbsp;&nbsp;1.5</p>
                                    <p> Processing Fee :&nbsp;&nbsp;&nbsp;&nbsp; Rs.&nbsp;&nbsp;0.5</p>
                                    <hr>
                                    <p><b>Total Amount </b>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><span style="color: #ff4b20;">Rs.&nbsp;&nbsp;<?php echo $total; ?></span></b></p>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>


    <footer>
        <div id="footer">
            <div style="color: #ff4b20;" id="left-footer">
                <br><br><br>
                <div id="footer-site-links">
                    <ul style="list-style-type: none;">
                        <h2>Site Map</h2>
                        <div style="background-color: black;height: 5px;width:50%;"></div>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Members</a></li>
                    </ul>
                    <ul style="list-style-type: none;">
                        <h2>Explore</h2>
                        <div style="background-color: black;height: 5px;width:50%;"></div>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
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
                <h2 style="color: #ff4b20;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Where are we located ?</h2>
                <br>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.222610388061!2d72.85372091490721!3d19.22912765213814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0d6e771d27b%3A0xcfe3c6ecba9c4c92!2sBhandarkar%20Bhavan%2C%20Sundar%20Nagar%2C%20Borivali%20West%2C%20Mumbai%2C%20Maharashtra%20400092!5e0!3m2!1sen!2sin!4v1566710714948!5m2!1sen!2sin" width="380" height="220" frameborder="0" style="border:0;" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>

        <div style="background-color: #1c1c1c;text-align:center;">
            <p style="color: white;">&copy;Copyright &nbsp;Parkinzo&nbsp; 2019</p>
        </div>
    </footer>
</body></html>
