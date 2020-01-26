<?php	
	session_start();
	$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_query($con,"UPDATE menu SET Quantity = Quantity - 1 WHERE Food_ID='". $_SESSION['ID'] ."'");
	
	unset($_SESSION['ID']);
	header("Location:Menu.php");
	return;
?>