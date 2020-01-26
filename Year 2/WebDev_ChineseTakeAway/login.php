<?php
	session_start();
?>

<html>
	<head>
		<title>Assignment-C16358056</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/Login.css">

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
							<li><a href="login.php" class="selected">My Account</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="login.php" class="selected">Login</a></li>
						<?php
						}
						?>
						
						<li><a href="Contact.php">Contact Us</a></li>
						<li><a href="Menu.php">Menu</a></li>
						<li><a href="Home.php">Home</a></li>
					</ul>
					
				</div>
				
				<?php
				if(!isset($_SESSION["account"]))
				{
				?>
					<div id="Left">
					
					
						<h1>Log in!</h1>
						<?php
							if(isset($_SESSION["error"]))
							{
								echo ("<p style='color:red'>".$_SESSION["error"]."</p>");
								unset($_SESSION["error"]);
							}
						?>
						<p>Enter your details to access your account.<p>
						
						<form id = "loginform" action="LoginCheck.php" method = "post">
							<input id= "TextBox" type="text" name="username" placeholder=" Username" required>
							<br><br>
							<input id= "TextBox" type="password" name="password" placeholder=" Password" required>
							<br><br>
							<input id="button" type="submit" value="Login">
						</form>
						<br>
						<img src="./img/food4.jpg" style="width:100%; height: 55%;">

					</div>
					
					<div id="SignUp">
						<h1>Sign Up!</h1>
						<p>New to us? Create an account here!</p>
						<?php
							if(isset($_SESSION["regError"]))
							{
								echo ("<p style='color:red'>".$_SESSION["regError"]."</p>");
								unset($_SESSION["regError"]);
							}
						?>
						
						<form action="register.php" method = "post">
							<input id= "TextBox" type="text" name="first" placeholder=" First Name" required>
							<br>
							<br>
							<input id= "TextBox" type="text" name="sur" placeholder=" Last Name" required>
							<br>
							<br>
							<input id= "TextBox" type="text" name="address" placeholder=" Address" required>
							<br>
							<br>
							<input id= "TextBox" type="email" name="email" placeholder=" Email" required>
							<br>
							<br>
							<input id= "TextBox" type="text" name="number" placeholder=" Phone Number" required>
							<br>
							<br>
							<input id= "TextBox" type="text" name="username" placeholder=" Username" required>
							<br>
							<br>
							<input id= "TextBox" type="password" name="password" placeholder=" Password" required>
							<br><br>
							<input id="button" type="submit" value="Sign Up">
						</form>
					</div>
				
				<?php
				}
				else
				{
					echo '<div id= "Center">';
					echo "<h1>Welcome " . $_SESSION["account"] . "!</h1>";
					echo '</div>';
					
					echo '<div id= "Details">';
						$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
						// Check connection
						if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT * FROM users Where Username='".$_SESSION['account']."'");


						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<br>";
							echo "<span>Username: </span>"."<td>" . $row['Username'] . " </td>";
							echo "<br><br>";
							echo "<span>Name: </span>"."<td>" . $row['First_name'] . " </td>";
							echo "<td> " . $row['Surname'] . "</td>";
							echo "<br><br>";
							echo "<span>Email Address: </span>"."<td>" . $row['Email'] . "</td>";
							echo "<br><br>";
							echo "<span>Phone Number: </span>"."<td> 0" . $row['Phone_Number'] . "</td>";
							echo "<br><br>";
							echo "<span>Delivery Address: </span>". $row['Address'];

							echo "</tr>";
						}
						mysqli_close($con);
						
						echo "<br><br><br>";
						echo "<a href=\"Menu.php\" class=\"button\">Order Now</a>";
						echo "&nbsp &nbsp <a href=\"Checkout.php\" class=\"button\">View Basket</a>";
						echo "&nbsp &nbsp <a href=\"logout.php\" class=\"button\">Log out</a>";
						echo "<br><br><br><br>";
					?>
						<form method="post">
							<button class="bigButton" name= "Delete" onclick= "Function()">Delete Account?</button>
						</form>
						
						<script>
							function Function() 
							{
								var txt;
								
								if(confirm("Your account will be permanently Deleted. Are you sure you want to wish to continue?"))
								{
									txt="delete";
									<?php
									if (isset($_POST['Delete'])) 
									{
										echo "<span>**You have canceled the delete operation.**</span>";
										header("Location: Delete.php");
										exit;
									}
									?>
								}
								else 
								{
									txt="cancel";
									<?php
										echo "<span>**You have cancelled the delete operation.**</span>";
									?>
								}
							}
						</script>

				<?php
					echo "</div>";
					
					echo "<div id=\"Pic\">";
					echo "<br>";
					echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src=\"./img/cool.jpg\" style=\"width:80%; height: 80%;\">";
					echo "</div>";
				}
				?>
			
			</div>
			
			<div class="footer">
				<a href ="login.php"> <img src="./img/Top.jpg" style="width:5%; height: 60%;"></a><br><a>&nbsp &nbsp &nbsp &nbsp &copy;Wok this Way &nbsp &nbsp &nbsp &nbsp &nbsp Author: Jamie Walsh</a>
			</div>
		</div>
	</body>
</html>