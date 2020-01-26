<!DOCTYPE HTML>

<?php
    include_once 'dbconnect.php';
    session_start();
?>
<html lang="en">

<head>
    <title>JC Cinema</title>

    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/stackpath.bootstrapcdn.min.css" >
    <link id="sheet" rel="stylesheet" href="./css/Main.css">
    <link id="sheet" rel="stylesheet" href="./css/Home.css">
</head>

<script type="text/javascript" src="./Javascript/Home.js"></script>

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
                            <a class="nav-link active" href="home.php">&nbsp;Home&nbsp;</a>
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
                            <a class="nav-link" href="contact_us.php">&nbsp;Contact Us&nbsp;</a>
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
                <div id="container">
                    <a id="noStyle" href="login_register.php"><img id="Jumbo" src="./images/POP.jpg" alt="Welcome" style="width:100%; height: 100%">
                    <div id= "TextBlob">
                        <p id ="Titles">Welcome To JC Cinemas!</p>
                        <p id="Inner">- Login/SignUp here for the best experience.</p>
                    </div></a>

                    <a id="noStyle" onclick="previous()"><div id="LeftButton">
                        <img id="Arrow" src="./images/Left.png" height="100%" width="100%">
                    </div></a>

                    <a id="noStyle" onclick="next()"><div id="RightButton">
                        <img id="Arrow" src="./images/Right.png" height="100%" width="100%">
                    </div></a>
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