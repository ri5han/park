<?php
	
	if(isset($_POST['submit'])){
		
		$name = htmlspecialchars($_POST['username']);
		$phone = htmlspecialchars($_POST['phone']);
		$email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        
		$toEmail = 'rishanmascarenhas@gmail.com';
		$subject = 'Contact From '.$name;
		$body = '<h2>Contact Feedback</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Phone</h4><p>'.$phone.'</p>
				<h4>Email</h4><p>'.$email.'</p>
				<h4>Message</h4><p>'.$message.'</p>';
		
		$headers = "MIME-Version: 1.0" ."\r\n";
		$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
		
		$headers .= "From: " .$name. "<".$email.">". "\r\n";
		if(mail($toEmail, $subject, $body, $headers)){
		    // Email Sent
		    echo 'Your email has been sent';
		} else {
		    // Failed
			echo 'Your email was not sent';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Parkinzo | Contact us</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="signup-bg contact">
        <nav id="navbar">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>

            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a style="color: #ff4b20" href="contact.php">CONTACT</a></li>
                <li><a href="signup.php">SIGN UP</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
        <nav class="topnav" id="myTopnav">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>

            <a href="index.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a style="color: #ff4b20" href="contact.php">CONTACT</a>
            <a href="signup.php">SIGNUP</a>
            <a href="login.php">LOGIN</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <div class="inner">
            <h1><i class="fa fa-phone">&nbsp;</i><span style="color: #000;">Consult &nbsp;with&nbsp;</span>
                <span style="color: #ff4b20;">&nbsp;Park</span><span style="color: #fff;">inzo</span></h1>
        </div>
    </div>
    <div class="section-border-o"><br></div>

    <div class="content">
        <section>
            <h2 style="font-weight: bold; ">Contact with our <span style="font-weight: initial;">web
                    consultant</span>&nbsp;.&nbsp;.&nbsp;.&nbsp;</h2>
            <p>How about a meeting? We'd love to come around to listen to your needs.</p>
            <p>Thus, we believe that we can better introduce ourselves to you and</p>
            <p>better understand our talents.</p><br>
            <form name="Request_Frm" id="Request_Frm" action="contact.php" method="post">
                <input name="username" type="text" required placeholder="*Enter name"
                    style="width: 36%;">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" placeholder="*Enter mobile" id="phone" name="phone" style="width: 36%;"><br><br>
                <input name="email" type="email" required placeholder="*Enter email" style="width: 75%;"><br><br>
                <textarea name="message" required placeholder="*Enter message"
                    style="width: 75%; padding: 5px;"></textarea><br><br>
                <button class="button" name="submit">Submit</button>
            </form>
        </section>
        <aside><br>
            <h3>Opening Time</h3>
            <hr><br>
            <p>Give us a call or stop by our door anytime, we try to answer all enquiries within 24 hours on business
                days.<br>
                <span style="font-size: 20px; font-weight: bold">We are open from 10am — 7pm week days.</span><br><br>
            </p>
            <h4><i class="fa fa-phone" aria-hidden="true">&nbsp;Call</i></h4>
            <hr>
            <p><a href="tel:91-7263807069">+91-7263807069</a></p><br>
            <h4><i class="fa fa-comments" aria-hidden="true">&nbsp;WhatsApp</i></h4>
            <hr>
            <p><a href="tel:+91-8286858818">+91-8286858818</a></p><br>
            <h4><i class="fa fa-envelope" aria-hidden="true">&nbsp;Email</i></h4>
            <hr>
            <p id="mailto"><a href="mailto:hello@Parkinzo.com">hello@parkinzo.com</a>
            </p>
        </aside>
    </div>
    <br><br><br>
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
                        <li><a href="#">Jobs</a></li>
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
