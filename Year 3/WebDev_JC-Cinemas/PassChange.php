<?php
	session_start();
?>
<html>

	<head>
		<title>JC Cinema</title>
		<link rel="stylesheet" href="./css/Main.css">
		<link rel="stylesheet" href="./css/Login.css">
		<link rel="stylesheet" href="./css/ChangePassword.css">
		
	</head>

	<body>

		<div id="Whole">
			<div id="Empty">
			</div>
			<div id="Main">
				<div id="Top">
					<div class="container">
						<img src="./images/Banner.jpg" style="width:100%; height: 160px;">
					</div>
				</div>

				<ul id="Banner">
					<a id="JC">J.C Cinemas</a>
					<?php
					if(isset($_SESSION["account"]))
					{
						echo "<li id= \"last\"><a class = \"active\" href=\"login_register.php\">My Account</a></li>";
					}
					else
					{
						echo "<li id= \"last\"><a class = \"active\" href=\"login_register.php\">Login/Register</a></li>";
					}
					?>
					<li><a href="contact_us.php">Contact Us</a></li>
					<li><a href="coming_soon.php">Coming Soon</a></li>
					<li><a href="film_times.php">Film Times</a></li>
					<li id= "first"><a href="home.php">Home</a></li>
				</ul>

				
				<a href="login_register.php"><img id="Escape" src="./images/X.png" name="Back"></a>
				
				<div id="Center">
					<h1 id="Heading">&nbsp&nbspChange Password</h1>
					
					<form action="PassWord.php" method = "post">
						<input id= "TextBox" type="password" name="oldPassword" placeholder="Old Password" required>
						<br><br>
						<input id= "TextBox" type="password" name="newPassword" placeholder="New Password" required>
						<br><br>
						<input id= "TextBox" type="password" name="confirmPassword" placeholder="Confirm New Password" required>
						<br><br>
						<input class="button" type="submit" value="Update Password">
					</form>
					
				</div>
			</div>
			<br>
			<div id="footer">
				<p align = "left" id = "JCinema">J.C Cinemas</p> <p align = "right" id = "name">Author: Jamie Walsh & Catherine Garner</p>
			</div>
		</div>
		
	</body>
</html>