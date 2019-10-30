<?php

    session_start();
    require('include/dbconnect.php');

    if(isset($_SESSION['username']) == false) {
        echo '<body style="display:none;"></body>';
        echo "<script>alert('You are not authenticated. Please login or signup.');</script>";
    }

    $spaceId = $_GET['spaceId'];
    
    $queryList = "SELECT * FROM spaces WHERE id='$spaceId'";
    $result = mysqli_query($conn,$queryList);
    $spaces = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link rel="icon" href="images/logo.png">
    <title>Parkinzo| Parking Details</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body>
    <div class="bg">
        <!-- nav semantic elements -->
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

            <a href="listing.php">HOME</a>
            <!-- <a href="#news">ABOUT</a> -->
            <a href="contact.php">CONTACT</a>
            <i class="fa fa-user"></i>&nbsp;<a href="#"><?php echo $_SESSION['username']; ?></a>
            <a href="login.php?logout=1">LOGOUT</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <?php echo '<img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($spaces[0]['image']).'" alt="First slide">'; ?>
                            </div>
                            <!-- <div class="carousel-item">
                                    <img class="d-block w-100" src="images/nikhil.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/rahul1.jpeg" alt="Third slide">
                                </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><br><br>
                </div>
                <div class="col-md-7">
                    <h3 class="newarrival text-center"><?php echo $spaces[0]['name']; ?></h3>
                    <h2 style="margin-left: 10px; ">
                        <?php echo $spaces[0]['address1']; ?>,<?php echo $spaces[0]['address2']; ?>,
                        <?php echo $spaces[0]['address3']; ?></h2>
                    <p><b>Condition:&nbsp;&nbsp;&nbsp;</b> New </p>
                    <p><b>Amenities:&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        <?php if($spaces[0]['wifi']==1): ?>
                        <i class="fa fa-wifi" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php if($spaces[0]['handicap']==1): ?>
                        <i class="fa fa-wheelchair" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php if($spaces[0]['charging']==1): ?>
                        <i class="fa fa-bolt" aria-hidden="true"></i>
                        <?php endif; ?></p>
                    <p><b>Ratings :&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        <i class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </i>
                    </p>
                    <p><b>Price:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span
                                    style="color: #ff4b20; font-style: italic;">Rs.&nbsp;<?php echo $spaces[0]['price']; ?>
                                    per hour</span></p>
                    <p><b>Parking Capacity:</b>&nbsp;&nbsp;<?php echo $spaces[0]['available']; ?> lots</p>
                    <button class="goto"><a style="color: white; text-decoration:none;"
                            href="payment.php?spaceId=<?php echo $spaces[0]['id']; ?>&pay=1">PROCEED</a></button>
                </div>
            </div>
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
                        <li><a href="partners.html">FAQ</a></li>
                        <li><a href="contact.php">Feedback</a></li>
                        <li><a href="rent.php">Rent Space</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                    </ul>
                </div><br>
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
