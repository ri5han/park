<?php
    session_start();

    if(isset($_SESSION['username']) == false) {
        echo '<body style="display:none;"></body>';
        echo "<script>alert('You are not authenticated. Please login or signup.');</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <!-- this is audio file to play on startup-->
    <audio autoplay>
        <source src="magic.mp3" type="audio/mpeg">
    </audio>
    <div class="background">
        <!-- below includes the background and navbar content -->

        <!-- nav semantic elements -->
        <nav id="navbar">
            <!-- logo is specified below -->
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>

            <ul>
                <li><a style="color: #ff4b20" href="listing.php">">HOME</a></li>
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

        <div class="topbar">
            <div class="search">
                <fieldset>
                    <legend>Parking at</legend>
                    <i class="fa fa-search" aria-hidden="true"></i><input type="text"
                        placeholder="Where do you want to park?">
                </fieldset>
            </div>
            <div class="search1">
                <fieldset>
                    <legend>Arriving On</legend>
                    <input type="date" placeholder="Start Time">
                </fieldset>
            </div>
            <div class="search2">
                <fieldset>
                    <legend>Leaving On</legend>
                    <input type="date" placeholder="End Time">
                </fieldset>
            </div>
            <div class="search3">
                <button type="button" name="search">SEARCH</button>
            </div>



        </div>

        <div class="listing">
            <div class="list1">
                <div class="list1a">
                    <img src="images\growels.jpg">
                </div>
                <div class="detail">
                    <div class="list1b">
                        <h2>Growels 101</h2>
                        <h4>Akruli Road,</h4>
                        <h4>Samta Nagar,</h4>
                        <h4>Kandivali East.</h4>

                    </div>
                    <div class="list1c">
                        <div class="amenities">
                            <p>Amenties:</p>
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                            <i class="fa fa-wheelchair" aria-hidden="true"></i>

                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <p>Distance:&nbsp;&nbsp;&nbsp;100m</p>
                    </div>
                    <div class="View">
                        <button type="button">View Details</button>
                    </div>
                </div>
            </div>
            <div class="list1">
                <div class="list1a">
                    <img src="images\growels.jpg">
                </div>
                <div class="detail">
                    <div class="list1b">
                        <h2>Growels 101</h2>
                        <h4>Akruli Road,</h4>
                        <h4>Samta Nagar,</h4>
                        <h4>Kandivali East.</h4>

                    </div>
                    <div class="list1c">
                        <div class="amenities">
                            <p>Amenties:</p>
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                            <i class="fa fa-wheelchair" aria-hidden="true"></i>

                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <p>Distance:&nbsp;&nbsp;&nbsp;100m</p>
                    </div>
                    <div class="View">
                        <button type="button">View Details</button>
                    </div>
                </div>
            </div>
            <div class="list1">
                <div class="list1a">
                    <img src="images\growels.jpg">
                </div>
                <div class="detail">
                    <div class="list1b">
                        <h2>Growels 101</h2>
                        <h4>Akruli Road,</h4>
                        <h4>Samta Nagar,</h4>
                        <h4>Kandivali East.</h4>

                    </div>
                    <div class="list1c">
                        <div class="amenities">
                            <p>Amenties:</p>
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                            <i class="fa fa-wheelchair" aria-hidden="true"></i>

                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <p>Distance:&nbsp;&nbsp;&nbsp;100m</p>
                    </div>
                    <div class="View">
                        <button type="button">View Details</button>
                    </div>
                </div>

            </div>
            <br>
            <br>
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