<?php

    session_start();
    require('include/dbconnect.php');

    function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius) {
    // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
  
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
  
        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }
    
    if(isset($_SESSION['username']) == false) {
        echo '<body style="display:none;"></body>';
        echo "<script>alert('You are not authenticated. Please login or signup.');</script>";
    }

    if(isset($_SESSION['latitude']) && isset($_SESSION['longitude'])) {
        $userLat = $_SESSION['latitude'];
        $userLong = $_SESSION['longitude'];
    }
    
    // $userLat = 19.2428309;
    // $userLong = 72.8539441;

    //Sorting nearest space in database
    // $query = "SELECT COUNT(*) FROM spaces;";
    // $result = mysqli_query($conn, $query);
    // $spaceCount = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $spaceCount = $spaceCount[0]['COUNT(*)'];

    $queryLatLng = "SELECT id,lat,lng FROM spaces";
    $result = mysqli_query($conn, $queryLatLng);
    $latLng = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    foreach($latLng as $cords) {
        $distv = vincentyGreatCircleDistance($userLat,$userLong,$cords['lat'],$cords['lng'],6371000);
        $distv = $distv/1000;
        //$distv = getDistanceBetweenPointsNew($userLat,$userLong,$latLng[$i]["lat"],$latLng[$i]["lng"]);
        $id = $cords['id'];
        $queryDist = "UPDATE spaces SET distance='$distv' WHERE id='$id'";
        $updateDistance = mysqli_query($conn, $queryDist);
    }

    $queryList = "SELECT * FROM spaces ORDER BY distance";
    $result = mysqli_query($conn,$queryList);
    $spaces = mysqli_fetch_all($result,MYSQLI_ASSOC);


    if(isset($_POST['find'])) {
        $city = $_POST['search'];
        $queryList = "SELECT * FROM spaces WHERE city LIKE '%$city%' ORDER BY distance";
        $result = NULL;
        $result = mysqli_query($conn,$queryList);
        $spaces = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

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
                <li><a href="listing.php">HOME</a></li>
                <!-- <li><a href="about.html">ABOUT</a></li> -->
                <li><a href="contact.php">CONTACT</a></li>
                <li><i class="fa fa-user"></i>&nbsp;<a style="color: #ff4b20" href="#"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="login.php?logout=1">LOGOUT</a></li>
                <li><a style="color: red;" href="delete.php?delete=1">DELETE</a></li>
                <li><a href="getLocation.php"><i class="fa fa-refresh"></i></a></li>
            </ul>
        </nav>

        <nav class="topnav" id="myTopnav">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>

            <a style="padding: 4% 0 0 4%; text-align:center;" href="listing.php">HOME</a>
            <!-- <a href="#news">ABOUT</a> -->
            <a style="margin: 3% 0 0 0%; text-align:center;" href="contact.php">CONTACT</a>
            <a style="margin: 3% 0 0 0%; text-align:center; color: #ff4b20;" href="#"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['username']; ?></a>
            <a style="margin: 3% 0 0 0%; text-align:center;" href="login.php?logout=1">LOGOUT</a>
            <a style="color: red; margin: 3% 0 3% 0%; text-align:center;" href="delete.php?delete=1">DELETE</a>
            <a style="margin: 3% 0 5% 0%; text-align:center;" href="getLocation.php"><i class="fa fa-refresh"></i>&nbsp;RELOCATE</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <form method="post" action="listing.php">
        <div class="topbar">
            

            <div class="search">
                <fieldset>
                    <legend>Search City</legend>
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" name="search" placeholder="Search">
                </fieldset>
            </div>

            <!-- <div class="search2">
                <fieldset>
                    <legend>Leaving On</legend>
                    <input type="date" placeholder="End Time">
                </fieldset>
            </div> -->
            <div class="search3">
                <button type="submit" name="find" value="SEARCH">Search</button>
            </div>

            
        </div>
        </form>


        <div class="listing">
            <?php foreach($spaces as $space): ?>
            <div class="list1">
                <div class="list1a">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($space['image']).'">'; ?>
                </div>
                <div class="detail">
                    <div class="list1b">
                        <h2><?php echo $space['name']; ?></h2>
                        <h4><?php echo $space['address1']; ?>,</h4>
                        <h4><?php echo $space['address2']; ?>,</h4>
                        <h4><?php echo $space['address3']; ?>.</h4>

                    </div>
                    <div class="list1c">
                        <div class="amenities">
                            <p>Amenties:</p>
                            <?php if($space['wifi']==1): ?>
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                            <?php endif; ?>
                            <?php if($space['handicap']==1): ?>
                            <i class="fa fa-wheelchair" aria-hidden="true"></i>
                            <?php endif; ?>
                            <?php if($space['charging']==1): ?>
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                        <p>Distance:&nbsp;&nbsp;&nbsp;<?php echo $space['distance']; ?>Km</p>
                    </div>
                    <div class="View">
                        <button><a href="details.php?spaceId=<?php echo $space['id']; ?>">VIEW</a></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        
            <div style="border: 1px solid white;" class="list1">
                <h4 style="text-align:center;">No more results found.</h4>
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