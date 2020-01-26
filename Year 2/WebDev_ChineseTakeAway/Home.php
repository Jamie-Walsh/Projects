<?php
	session_start();
?>

<html>
	<head>
		<title>Assignment-C16358056</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/Home.css">

	</head>
	
	<body>
		<div id="Whole">
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
						<li><a href="Contact.php">Contact Us</a></li>
						<li><a href="Menu.php">Menu</a></li>
						<li><a href="Home.php" class="selected">Home</a></li>
					</ul>
				</div>
				
				<div id="Left">
					<h1>About Us!</h1>
					
					<p>Wok This Way is the newest Chinese Restaurant added to Dublin City's burgeoning restaurant scene. 
					Located on O'Connell Street, Wok This Way boasts a perfect location in the heart of the city. 
					<br><br>
					Our goal is to deliver great Chinese food with an authentic Chinese dining experience. 
					Our food is prepared fresh daily and is cooked to order. All our dishes are MSG Free, ensuring the healthiest cuisine. 
					The setting at Wok This Way is traditionally oriental with a warm, welcoming ambiance.
					<br><br>
					We offer a takeaway service from 4pm to 1am, 7 days a week. This ensures that we are always here when 
					you need us! So sit back, relax and let us do the cooking. Enjoy!</p>
					
					<a href="Menu.php" class="button">Order Now</a>
					&nbsp &nbsp <a href="Contact.php" class="button">Contact Us</a>
				</div>
				
				
				<div id="Right">
					<br><br>
					&nbsp &nbsp &nbsp &nbsp <img src="./img/food1.jpg" style="width:85%; height: 60%;">
					<br><br>
					&nbsp &nbsp &nbsp &nbsp <img src="./img/food2.jpg" style="width:85%; height: 60%;">
				</div>
			</div>
			
			<div class="footer">
				<a href ="Home.php"> <img src="./img/Top.jpg" style="width:5%; height: 60%;"></a><br><a>&nbsp &nbsp &nbsp &nbsp &copy;Wok this Way &nbsp &nbsp &nbsp &nbsp &nbsp Author: Jamie Walsh</a>
			</div>
		</div>
	</body>
</html>