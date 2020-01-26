<!DOCTYPE HTML>

<?php
    session_start();
    include_once 'dbconnect.php';
?>

<html>

<head>
    <title>JC Cinema</title>

    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/stackpath.bootstrapcdn.min.css" >
    <link id="sheet" rel="stylesheet" href="./css/Main.css">
    <link id="sheet" rel="stylesheet" href="./css/Contact_Us.css">
</head>

<body>

    <div id="Background">
        <br><br>
        <div id="Main">
            <div id="Top">
                <div class="container">
                    <img src="./images/Banner.jpg" style="width:100%; height: 160px;">
                </div>
            </div>

            <nav class="navbar sticky-top navbar-expand-xl navbar-default ">
                <div class="navbar-header">
                    <p class="navbar-brand">J.C Cinemas</p>
                </div>

                <button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="nav navbar-nav ml-auto">
                        <li id = "first" class="nav-item">
                            <a class="nav-link" href="home.php">&nbsp;Home&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <?php
        						if(isset($_SESSION["Selected"]) AND isset($_SESSION["DateSelected"]))
        						{
        							echo "<a class='nav-link' href='filmDetails.php'>&nbsp;Film Times&nbsp;</a>";
        						}
        						else
        						{
        							echo "<a class='nav-link' href='film_times.php'>&nbsp;Film Times&nbsp;</a>";
        						}
        					?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="coming_soon.php">&nbsp;Coming Soon&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact_us.php">&nbsp;Contact Us&nbsp;</a>
                        </li>
                        <li id = "last" class="nav-item" >
                            <?php
        					if(isset($_SESSION["account"]))
        					{
        						echo "<a class='nav-link' href='login_register.php'>&nbsp;My Account&nbsp;</a>";
        					}
        					else
        					{
        						echo "<a class='nav-link' href='login_register.php'>&nbsp;Register/Login&nbsp;</a>";
        					}
        					?>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id = "middle">
                <br>
                <img src="./images/lobby.png" id = "lobby" />
                <img src="./images/capture.png" id = "capture" />
                <img src="./images/mix.png" id = "mix" />
                <div id = "details">
                    <br>
                    <p>Here at <font color="#EAC56D" size="5px">JC Cinemas</font> we value our customers. We guarantee complete satisfaction when you
                    visit our cinema. When it comes to service, our team love nothing more than to ensure your
                    experience with us is one to remember. We pride ourselves on delivering a friendly service
                    to both our regular and new customers.</p>
                    <br><br>
                    <p>If you have any compliments or complaints please do not hesitate to get in touch!</p>
                    <br><br>
                    <a href="https://www.facebook.com/" target = "_blank"><img src="./images/facebook.png" id = "social"></a>
                    <a href="https://www.instagram.com/" target = "_blank"><img src="./images/insta.png" id = "social"></a>
                    <a href="https://twitter.com/" target = "_blank"><img src="./images/twitter.png" id = "social"></a>
                </div>
                <br><br><br>
                <h2 id = "o_title">Opening Hours</h2>
                <br>
                <div id = "opening">
                    <p><b>Monday - Wednesday</b> .............. 12am - 10.30pm
                   <br><br><b>Thursday</b> ........................... 12am - 11pm
                   <br><br><b>Friday - Saturday</b> ................... 11am - 11.30pm
                   <br><br><b>Sunday</b> .............................. 12am - 10pm</p>
                </div>
                <br><br><br>

                <h2 id = "o_title">Location</h2>
                <br>
                <div id ="location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9542.595521538786!2d-6.105843594563505!3d53.277910569928906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4867064c9f443743%3A0x2600c7a819b93111!2sDalkey%2C+Co.+Dublin!5e0!3m2!1sen!2sie!4v1542728368908" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <br><br>
            </div>

        </div>
		<br>
		<div id="footer">
			<p align = "left" id = "JCinema">J.C Cinemas</p> <p align = "right" id = "name">Author: Jamie Walsh & Catherine Garner</p>
		</div>

    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
</body>


</html>