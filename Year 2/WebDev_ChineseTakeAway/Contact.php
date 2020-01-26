<?php
	session_start();
?>

<html>
	<head>
		<title>Assignment-C16358056</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/Contact.css">

	</head>
	
	<body>
		<div id="Long">
			<div id="Main">
				<div id="Top">
					<div class="container">
						  <img src="./img/banner.jpg" style="width:100%; height: 200px;">
						  <div id="bottom-right">Wok This Way</div>
					</div>
					
					<ul id="Banner">
						<li><a href="Checkout.php">Checkout</a></li>
						
						<?php
						if(isset($_SESSION["account"]))
						{
						?>
							<li><a href="login.php">My Account</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="login.php">Login</a></li>
						<?php
						}
						?>
						
						<li><a href="Contact.php" class="selected">Contact Us</a></li>
						<li><a href="Menu.php">Menu</a></li>
						<li><a href="Home.php">Home</a></li>
					</ul>
					
				</div>
				
				<div id="Pic1">
					<img src="./img/food3.jpg" style="width:100%; height: 100%;"></a>
				</div>
				
				<div id="Pic2">
					<img src="./img/food3.jpg" style="width:100%; height: 100%;"></a>
				</div>
				
				<div id="Text">
					<h1>Contact Us!</h1>

					Here at Wok This Way, we believe that communication with customers
					is key to success, so you can reach us from all of the best social media
					web sites, as well as by phone, email or by dropping in if you're around.
					So get in touch! we'd love to help. 
					<br><br><br>
					<h3>Phone Number:<span class='BoldOff'> 01 345 1980</span></h3> 
					
					<h3>Email:<span class='BoldOff'> WokItLikeITalkIt@gmail.com</span></h3>
					
					<h3>Social Media:
					<a href ="https://www.facebook.com/">
					<img src="./img/fbook.jpg" style="width:10%; height: 10%;"></a>
					
					<a href ="https://www.instagram.com/">
					<img src="./img/insta.jpg" style="width:10%; height: 10%;"></a>
					
					<a href ="https://www.twitter.com/">
					<img src="./img/twitter.jpg" style="width:10%; height: 10%;">
					</h3></a>
					<br><br>
					<h3>Location:<span class='BoldOff'> We are located in the centre of 
					O'Connell Street just beside the Savoy Cinema.</span></h3>
					<img src="./img/map.jpg" border="3" style="width:550px; height: 350px;">
				</div>
			</div>
			
			<div class="footer">
				<a href ="Contact.php"> <img src="./img/Top.jpg" style="width:5%; height: 60%;"></a><br><a>&nbsp &nbsp &nbsp &nbsp &copy;Wok this Way &nbsp &nbsp &nbsp &nbsp &nbsp Author: Jamie Walsh</a>
			</div>
		</div>
	</body>
</html>