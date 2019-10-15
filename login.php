<?php
    session_start();
    require("include/dbconnect.php");

    
    if(isset($_GET['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['otp']);
        unset($_SESSION['latitude']);
        unset($_SESSION['longitude']);
        unset($_COOKIE['username']);
        session_unset();
        session_destroy();
        $_GET['logout'] = 0;
        //header('Location: login.php');
    } elseif(isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
        setcookie('username',$username,time()+86400);
        header('Location: getLocation.php');
    }
   
    if(isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $query = "SELECT password FROM users WHERE username='$username'";
        $result = mysqli_query($conn,$query);
        if(!$result) {
            echo "<script>alert('Account does not exist. Please signup.');</script>";            
        } else {
            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(password_verify($password,$users[0]['password'])) {
                $_SESSION['username'] = $username;
                setcookie('username',$username,time()+86400);
                header('Location: getLocation.php');
                // echo "Logged in";
                // echo $_SESSION['username'];
            } else {
                echo "<script>alert('Password is incorrect.');</script>";                            
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Parkinzo | Login</title>
    <link rel="manifest" href="manifest.json" content-type="application/json">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="home-bg login-bg">
        <nav id="navbar">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>

            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="signup.php">SIGN UP</a></li>
                <li><a style="color: #ff4b20" href="login.php">LOGIN</a></li>
            </ul>
        </nav>
        <nav class="topnav" id="myTopnav">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>

            <a href="index.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="contact.php">CONTACT</a>
            <a href="signup.php">SIGNUP</a>
            <a style="color: #ff4b20" href="login.php">LOGIN</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <div class="login-bg-overlay">
            <center>
                <div style="color:white;" class="login-bg-content">
                    <div class="login">
                        <h1><span style="color: #ff4b20;">Log</span><span>in</span></h1>
                        <div class="login-align">
                            <div style="text-align: left;">
                                <form method="post" action="login.php">
                                    <i class="fa fa-user fa-2x aria-hidden="
                                        true"></i>&nbsp;&nbsp;<label>Username</label>&nbsp;&nbsp;<br>
                                    <input name="username" type="text" placeholder="Enter username">
                                    <br><br>
                                    <i class="fa fa-lock fa-2x aria-hidden="
                                        true"></i>&nbsp;&nbsp;<label>Password</label>&nbsp;&nbsp;<br>
                                    <input name="password" type="password" placeholder="Enter password">
                            </div>
                            <br>
                        </div>
                        <small><a href="forgot.php" style="color: #4fffff; font-size: 15px;">Forgot password ?</a></small>
                        <br><br>
                        <input name="login" class="login-btn"
                            style="width: 30%; background-color: #ff4b20;border-color: #ff4b20;font-weight: 900;"
                            type="submit" value="LOGIN">
                        </form>
                        <br><br><br>
                        <h4>Don't have an account ?</h4><br><a
                            style="background-color: #3385ff;text-decoration: none; color:white;padding: 10px; border-radius: 25px;"
                            href="signup.php">SIGN UP</a>
                    </div>
                </div>
            </center>
        </div>
    </div>
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
                        <li><a href="#">FAQ</a></li>
                        <li><a href="contact.php">Feedback</a></li>
                        <li><a href="partners.html">Our Partners</a></li>
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