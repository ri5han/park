<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png">
    <title>Parkinzo | Welcome</title>
    <link rel="manifest" href="manifest.json" content-type="application/json">

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
    <div class="home-bg">
        <!-- below includes the background and navbar content -->

        <!-- nav semantic elements -->
        <nav id="navbar">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>

            <ul>
                <li><a style="color: #ff4b20" href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="signup.php">SIGN UP</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
        <nav class="topnav" id="myTopnav">
            <img class="logo" src="images\logo.png" alt="park">
            <h1><span style="color: #ff4b20;">Park</span><span style="color: #fff;">inzo</span></h1>

            <a style="padding: 4% 0 0 4%; text-align:center; color: #ff4b20;" href="index.php">HOME</a>
            <a style="margin: 3% 0 0 0%; text-align:center;" href="about.php">ABOUT</a>
            <a style="margin: 3% 0 0 0%; text-align:center;" href="contact.php">CONTACT</a>
            <a style="margin: 3% 0 0 0%; text-align:center;" href="signup.php">SIGNUP</a>
            <a style="margin: 3% 0 5% 0%; text-align:center;" href="login.php">LOGIN</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>




        <!-- header section starts here -->
        <div class="home-bg-overlay">
            <div class="home-bg-content">
                <h1><span style="color: #ff4b20;">Park</span><span>inzo</span></h1>
                <!--                <h2>Because life is too precious to waste time to find parking.</h2>-->
                <h2>Never be upset at No Parking zone, just <span style="color: #ff4b20;">Parkinzo</span>-ne.</h2>
            </div>
        </div>
        <!-- head section ends here -->

    </div>

    <div class="section-border-o"><br></div>

    <!-- first section reflecting features -- center aligned -->
    <div style="background-color: #fff7f4;">
        <div class="head">
            <h1>WHY &nbsp;USE &nbsp;PARKINZO ?</h1>
            <p>We are constantly trying to integrate more features
                to make the site more useful and easy to use.
                <p>Send us your feedback what you liked,what you think we should look into.</p>
                <p>Your feedback means a lot to us.</p>
        </div>

        <!-- all features listed in nested division and grids -->
        <div class="containers">
            <div class="box1">
                <div class="icon">
                    <i class="fa fa-inr" aria-hidden="true"></i></div>
                <div class="contents">
                    <h3>Save Money</h3>
                    <p>Spaces are cheaper than on-street parking.</p>
                </div>
            </div>
            <div class="box1">
                <div class="icon">
                    <i class="fa fa-clock-o" aria-hidden="true"></i></div>
                <div class="contents">
                    <h3>Save Time</h3>
                    <p>Save time by pre booking parking.</p>
                </div>
            </div>
            <div class="box1">
                <div class="icon">
                    <i class="fa fa-free-code-camp" aria-hidden="true"></i></div>
                <div class="contents">
                    <h3>Save Fuel</h3>
                    <p>No more circling around for parking. Navigate directly to the reserved parking space.</p>
                </div>
            </div>
            <br><br>
            <div class="box1">
                <div class="icon">
                    <i class="fa fa-credit-card" aria-hidden="true"></i></div>
                <div class="contents">
                    <h3>Pay Cashless</h3>
                    <p>Pay from your existing digital wallet,card, netbanking within few seconds.You recieve an OTP
                        after paying</p>
                </div>
            </div>

            <div class="box1">
                <div class="icon">
                    <i class="fa fa-flag-checkered" aria-hidden="true"></i></div>>
                <div class="contents">
                    <h3>Guranteed Parking Space</h3>
                    <p>Search & book a parking in seconds – anytime, anywhere with advance booking your parking space
                        get reserved only for you.</p>
                </div>
            </div>

            <div class="box1">
                <div class="icon">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                <div class="contents">
                    <h3>Hassle-Free</h3>
                    <p>Get real time occupancy info of off-street and on-street parking for
                        short time booking.</p>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <div class="section-border-o"><br></div>

    <!-- second section starts here -->
    <!-- bg image has fixed effect -->
    <div style="text-align:center;" class="try">
        <br><br><br><br>
        <h1>If you like what you just read, why not try ?</h1>
        <br><br>
        <a href="signup.php">Get Started</a>
        <br>
    </div>
    <!-- econd section ends here -->

    <div class="section-border-o"><br></div>

    <!-- third section starts here -->
    <!-- bg image has fixed effect -->
    <div class="rent">
        <div class="rent-bg-overlay">
            <div style="color: white;" class="rent-content">
                <br><br>
                <h1>Do you have a space to spare ?</h1>
                <br><br>
                <div>
                    <h2>Be it a garage, plain space or a parking lot,don't let your empty space go to waste!</h2><br>
                    <h2 style="font-size: 35px;">Earn from it!</h2>
                    <br><br><br>
                    <a href="rent.php">Rent now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section-border-o"><br></div>

    <!-- testimonial section starts here -->
    <!-- all users reviews are hard coded in html -->
    <div class="testimonials">
        <div class="head">
            <h1 style="color:#ff4b20; ">WHAT USERS ARE SAYING</h1>
            <br>
            <p>Don’t just take our word for it – check out some of the latest customer reviews</p>
            <p>for our London parking spaces</p>
            <br>
        </div>
        <div class="out">
            <div class="one">
                <p>Not used to reviewing parking spaces, but have to say this one was perfect!
                    We used it as away supporters attending a Cricket game. So much easier
                    than the other alternatives.</p>
                <br>
                <br>
                <br>
                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="head">
                    <br>
                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Akshay Gunjal(Mira-Road)

                </div>
            </div>
            <div class="one">
                <p>Was extremely easy, no need to stress about where I will park anymore.
                    Before it was a complete nightmare to find somewhere in Borivali that
                    was not prohibitively expensive.</p>
                <br>
                <br>
                <br>
                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="head">
                    <br>
                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Nehal Lopes(Virar)</h3>

                </div>
            </div>
            <div class="one">
                <p>I used this space for a hospital appointment in Gujarat. The whole Parkinzo
                    experience has been great! So easy to find and book a space at a brilliant
                    price too! Saved us a bundle of money and stress.</p>
                <br>
                <br>
                <br>
                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="head">
                    <br>
                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Ashutosh (Borivali)</h3>

                </div>
            </div>
            <div class="one">
                <p>Simple and easy-to-use app, perfect for my commute into work. Saves on stress
                    of having to find a space in the morning in such a difficult area to find
                    parking.Thanks alot Parkinzo</p>
                <br>
                <br>
                <br>
                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="head">
                    <br>
                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Varesh kakkadan(Bhayander)</h3>

                </div>
            </div>
            <div class="one">
                <p>The convenient parking made our stay all the more enjoyable. Cheaper than the
                    train and cheaper than other car parks too. Easy booking system and
                    pre-payment takes the stress out of finding cash.</p>
                <br>
                <br>
                <br>
                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <div class="head">
                    <br>
                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Smit Tawar(Andheri)</h3>

                </div>
            </div>
            <div class="one">
                <p>Such a higher quality than other places nearby! Really easy to find and the
                    staff are very professional and friendly. It was also very easy to book
                    using the app, there are spaces all over .</p>
                <br>
                <br>

                <div style="background-color: red;width: 80%;margin-left:10%;margin-right:20%;height: 1px;">
                </div>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="head">
                    <br>

                    <h3 style=" padding-top: 12px;padding-left:40% ">-&nbsp;Sagar Sheth(Churchgate)</h3>
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