<?php

require('include/dbconnect.php');

if(isset($_POST['submit'])){
	
    $name = htmlspecialchars($_POST['username']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $city = htmlspecialchars($_POST['city']);

    if(isset($_POST['wifi'])) {
        $wifi = htmlspecialchars($_POST['wifi']);
    } else {
        $wifi = 0;
    }

    if(isset($_POST['charging'])) {
        $charging = htmlspecialchars($_POST['charging']);
    } else {
        $charging = 0;
    }

    if(isset($_POST['handicap'])) {
        $handicap = htmlspecialchars($_POST['handicap']);
    } else {
        $handicap = 0;
    }

    $capacity = htmlspecialchars($_POST['capacity']);
    $duration = htmlspecialchars($_POST['duration']);
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $query = "INSERT INTO rent (name,phone,email,city,wifi,charging,handicap,capacity,duration,image) 
    VALUES('$name','$phone','$email','$city','$wifi','$charging','$handicap','$capacity','$duration','$image')";

    if(mysqli_query($conn,$query)) {
        echo "<script>alert('Details have been sent. We will contact you within 48 hours.');</script>";
    } else {
        echo "<script>alert('There was an error. Please try again.');</script>";
    }
    
    
    // $toEmail = 'rishanmascarenhas@gmail.com';
    // $subject = 'Contact From '.$name;
    // $body = '<h2>Contact Feedback</h2>
    //         <h4>Name</h4><p>'.$name.'</p>
    //         <h4>Phone</h4><p>'.$phone.'</p>
    //         <h4>Email</h4><p>'.$email.'</p>
    //         <h4>City</h4><p>'.$city.'</p>
    //         <h4>Amenities</h4><p>'.$wifi." ".$handicap." ".$Charging.'</p>
    //         <h4>Capacity</h4><p>'.$capacity.'</p>
    //         <h4>Duration</h4><p>'.$duration.'</p>';
    
    // $headers = "MIME-Version: 1.0" ."\r\n";
    // $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
    
    // $headers .= "From: " .$name. "<".$email.">". "\r\n";
    // if(mail($toEmail, $subject, $body, $headers)){
    //     // Email Sent
    //     echo "<script>prompt('Your details have been sent.');</script>";
    // } else {
    //     // Failed
    //     echo "<script>prompt('There was a problem.');</script>";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Parkinzo | Rent with us</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="rentus-bg">
        <nav id="navbar">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="signup.html">SIGN UP</a></li>
                <li><a href="login.html">LOGIN</a></li>
            </ul>
        </nav>
        <div class="login-bg-overlay">
            <center>
                <div style="color:white;" class="signup-bg-content">
                    <div class="login signup rentus">
                        <h1><span style="color: #ff4b20;">Rent</span>with<span>Us</span></h1>
                        <h3>We will contact you within <span style="color: #ff4b20;">48 hrs</span>&nbsp;&nbsp;<i
                                class="fa fa-smile-o" aria-hidden="true"></i></h3>
                        <br>
                        <div class="login-align">
                            <div style="text-align: left;">
                                <form name="Request_Frm" id="Request_Frm" action="rent.php" method="post" enctype="multipart/form-data">
                                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <label>Name</label>&nbsp;&nbsp;<br><input name="username" id="s-username"
                                        type="text" placeholder="Enter name" required>
                                    <br><br>
                                    <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <label>Email</label>&nbsp;&nbsp;<br><input name="email" id="s-email" type="email"
                                        placeholder="Enter email..." required>
                                    <br><br>
                                    <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <label>Mobile</label>&nbsp;&nbsp;<br><input name="phone" id="s-number" type="number"
                                        placeholder="Enter mobile number..." required>
                                    <br><br>
                                    <i class="fa fa-home fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <label>Address</label>&nbsp;&nbsp;<br><textarea name="address" required
                                        placeholder="Enter address"
                                        style="width: 98%;color: white; background-color: transparent;"></textarea>
                                    <br><br>
                                    <i class="fa fa-street-view fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <label>Select your city</label>&nbsp;&nbsp;<br>
                                    <select name="city">
                                        <option value="#">Select</option>
                                        <option value="mumbai">Mumbai</option>
                                        <option value="delhi">Delhi</option>
                                        <option value="banglore">Banglore</option>
                                    </select>
                                    <br><br>
                                    <i class="fa fa-th-list fa-2x"
                                        aria-hidden="true"></i>&nbsp;&nbsp;<label>Amenities</label>
                                    <br>
                                    <div class="ammen">
                                        <label>Handicap&nbsp;wheels</label>
                                        <input value="1" id="city" type="checkbox" name="handicap">
                                    </div>
                                    <div class="ammen">
                                        <label>Charging&nbsp;port</label>
                                        <input value="1" id="city" type="checkbox" name="charging">
                                    </div>
                                    <div class="ammen">
                                        <label>WiFi&nbsp;Enabled</label>
                                        <input value="1" id="city" type="checkbox" name="wifi">
                                    </div><br>
                                    <i class="fa fa-car fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<label>Total
                                        Capacity</label>&nbsp;&nbsp;<br>
                                    <input name="capacity" id="city" type="number" placeholder="Enter capacity"
                                        required>
                                    <br><br>
                                    <i class="fa fa-question-circle-o fa-2x"
                                        aria-hidden="true"></i>&nbsp;&nbsp;<label>Rent duration</label>&nbsp;&nbsp;<br>
                                    <input name="duration" id="city" type="number" placeholder="Enter duration"
                                        required>
                                    <br><br>
                                    <i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<label>Upload
                                        image</label>&nbsp;&nbsp;<br>
                                    <input name="image" id="city" type="file" required>
                                    <br><br>
                            </div>
                        </div>
                        <p>By proceeding with rent with us you agree to the<br> Parkinzo <a style="color:#4fffff;"
                                href="#">Terms & Conditions</a> and <a style="color:#4fffff;" href="#">Privacy
                                Policy</a>.</p>
                        <br><br>
                        <input name="submit" class="login-btn"
                            style="width: 30%; background-color: #ff4b20;border-color: #ff4b20;font-weight: 900;"
                            type="submit" value="SUBMIT">
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>


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