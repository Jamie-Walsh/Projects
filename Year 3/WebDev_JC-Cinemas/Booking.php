<?php
	session_start();
    include_once 'dbconnect.php';
?>
<html>

	<head>
		<title>JC Cinema</title>
		<link rel="stylesheet" href="./css/Main.css">
		<link rel="stylesheet" href="./css/Login.css">
		<link rel="stylesheet" href="./css/Booking.css">
		
	</head>

	<body>

		<div id="Whole">
			<br><br>
			<div id="main1">
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
					<?php			
					if(isset($_SESSION["Selected"]) AND isset($_SESSION["DateSelected"]))
					{		
						echo "<li><a href=\"filmDetails.php\">Film Times</a></li>";
					}
					else
					{
						echo "<li><a href=\"film_times.php\">Film Times</a></li>";
					}
					?>
					<li id= "first"><a href="home.php">Home</a></li>
				</ul>

				
				<a href="login_register.php"><img id="Escape" src="./images/X.png" name="Back"></a>
				
				<div id="Body">
					<h1 id="Heading">&nbspMy Bookings!</h1>
					
					<?php

						// Check connection
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						$query = "SELECT * FROM bookings WHERE Customer_Name = \"". $_SESSION["account"] ."\"";
						  
						$result = $con->query($query);
						
						$n = $result->num_rows;
						
						if($n > 0)
						{
							echo "<table id=\"Booking_Table\">
								<tr>
									<th>Ref Num</th>
									<th>Username</th>
									<th>Movie</th>
									<th>Time</th>
									<th>Date</th>
									<th>Tickets</th>
									<th>Total Cost</th>
								</tr>";

								while($row = mysqli_fetch_array($result))
								{
									echo "<tr>";
										echo "<td>" . $row['Booking_Ref'] . "</td>";
										echo "<td>" . $row['Customer_Name'] . "</td>";
										echo "<td>" . $row['Movie'] . "</td>";
										echo "<td>" . $row['Show_Time'] . "</td>";
										echo "<td>" . $row['Show_Date'] . "</td>";
										echo "<td>" . $row['Number_of_Tickets'] . "</td>";
										echo "<td>€" . $row['Total_Cost'] . "</td>";
									echo "</tr>";
								}
							echo "</table>";
							
							mysqli_close($con);
						}
						else
						{
							echo '<br><h2>You have no bookings.</h2>';
							echo '<img src="./images/Empty.jpg" style="width:50%; height:60%;">';
						}
					?>
					
					<br><br>
					<a href="film_times.php" class="button">Browse Movies</a>
					
				</div>
            </div>
			
			<br>
			<div id="footer">
				<p align = "left" id = "JCinema">J.C Cinemas</p> <p align = "right" id = "name">Author: Jamie Walsh & Catherine Garner</p>
			</div>
		</div>
		
		
		
	</body>
</html>