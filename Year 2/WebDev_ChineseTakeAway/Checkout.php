<?php
	session_start();
?>

<html>
	<head>
		<title>Assignment-C16358056</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/Checkout.css">
	</head>
	
	<body>
		<div id="Whole">
			<div id="Main">
				<div id="Top">
					<div class="container">
						  <img src="./img/banner.jpg" style="width:100%; height: 20%;">
						  <div id="bottom-right">Wok This Way</div>
					</div>
					
					<ul id="Banner">
						<li><a href="Checkout.php" class="selected">Checkout</a></li>
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
						<li><a href="Home.php">Home</a></li>
					</ul>
				</div>
				
				<div id= Center>
					<h1>Checkout!</h1>
				</div>
				
				<div id= Left>
					<?php
						$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
						// Check connection
						if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT Name, Price, Quantity FROM menu WHERE Quantity>0");
						
						$n = $result->num_rows;
						
						echo "<h2>Your Order: </h2>";
						
						if($n>0)
						{
							echo "<table id= \"table\">
								<tr>
									<th><span>Quantity</span></th>
									<th><span>&nbsp &nbsp Name</span></th>
									<th><span>&nbsp Price &nbsp</span></th>
								</tr>";
							
							while($row = mysqli_fetch_array($result))
							{
								echo "<tr>";
								echo "<th>x" . $row['Quantity']. "</th>";
								echo "<th>&nbsp &nbsp " . $row['Name']. "&nbsp &nbsp</th>";
								echo "<th>&nbsp &nbsp €" . $row['Price']*$row['Quantity'] . "&nbsp &nbsp";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br><br> <a href=\"Menu.php\" class=\"button1\">Keep Shopping</a>";
					?>
					<br><br>
					<form method="post">
						<?php
							if(isset($_SESSION['account']))
							{
								echo "<button class=\"button1\" name= \"Order\" onclick= \"myFunction()\">Place Order &nbsp</button>";
							}
							else
							{
								echo "<a href=\"login.php\" class=\"button1\">Log in</a>";
								echo "<span>&nbsp&nbsp**Log in to Place an Order**</span>";
							}
						?>
					</form>
					
					<script>
						function myFunction() 
						{
							alert("Order Confirmed! Your food will be delivered within 30 minutes. Thank you for choosing Wok This Way, enjoy your meal!");
							
							<?php								
								if (isset($_POST['Order'])) 
								{
									mysqli_query($con,"UPDATE menu SET Quantity=0 Where Food_ID= '1'");
									header("Location: Checkout.php");
									return;
								}
							?>
						}
					</script>
					
					<?php          
						}
						else
						{
							echo "<span>**Your Basket is Empty**</span>";
							echo "<br><br> <a href=\"Menu.php\" class=\"button\">View Menu</a>";
						}
					?>
				</div>
				
				<div id= "Right">
					<br>
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="./img/Delivery.jpg" style="width:85%; height: 80%;">
				</div>
				
			</div>
			
			<div class="footer">
				<a href ="Checkout.php"> <img src="./img/Top.jpg" style="width:5%; height: 60%;"></a><br><a>&nbsp &nbsp &nbsp &nbsp &copy;Wok this Way &nbsp &nbsp &nbsp &nbsp &nbsp Author: Jamie Walsh</a>
			</div>
		</div>
	</body>
</html>