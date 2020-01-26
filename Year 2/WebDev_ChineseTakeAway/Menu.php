<?php
	session_start();
?>

<html>
	<head>
		<title>Assignment-C16358056</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/Menu.css">
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
						<li><a href="Menu.php" class="selected">Menu</a></li>
						<li><a href="Home.php">Home</a></li>
					</ul>
				</div>
		
				<div id="Pic1">
					<img src="./img/Lbamboo.jpg" style="width:100%; height: 100%;"></a>
				</div>
				
				<div id="Pic2">
					<img src="./img/Rbamboo.jpg" style="width:100%; height: 100%;"></a>
				</div>
				
				<?php
					echo '<div id= "Center">';
						echo "<h1>Menu!</h1>";
						echo "<br><br>";
						$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
						// Check connection
						if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT * FROM menu WHERE Food_ID=1");

						echo "<h2><span>Speciality</span></h2>";
						while($row = mysqli_fetch_array($result))
						{
							$_SESSION['ID']= $row['Food_ID'];
							if($row['Quantity']>0)
							{
							echo "<h3><a href =\"Minus.php\"> <img src=\"./img/minus.jpg\" style=\"width:7%; height: 55%;\"></a> &nbsp &nbsp" . $row['Name'] . "&nbsp &nbsp <a href =\"Plus.php\"> <img src=\"./img/plus.jpg\" style=\"width:7%; height: 55%;\"></a></h3>";
							}
							else
							{
								echo "<h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $row['Name'] . "&nbsp &nbsp <a href =\"Plus.php\"> <img src=\"./img/plus.jpg\" style=\"width:7%; height: 55%;\"></a></h3>";
							}
							echo '<div id= "Description">';
							echo "&nbsp &nbsp" . $row['Description'];
							echo "</div>";
							echo "<br>";
							echo "€" . $row['Price'];
							echo "<br><br>";
							echo "</tr>";
						}
						mysqli_close($con);
						
						echo "&nbsp &nbsp <a href=\"Checkout.php\" class=\"button\">Go to Checkout</a>";
					echo "</div>";
				?>
			</div>
			
			<div class="footer">
				<a href ="Menu.php"> <img src="./img/Top.jpg" style="width:5%; height: 60%;"></a><br><a>&nbsp &nbsp &nbsp &nbsp &copy;Wok this Way &nbsp &nbsp &nbsp &nbsp &nbsp Author: Jamie Walsh</a>
			</div>
		</div>
	</body>
</html>