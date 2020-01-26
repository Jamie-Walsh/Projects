<?php
	session_start();
	session_destroy();
	
	$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	unset($_SESSION["account"]);
	header("Location:login_register.php");
	return;
?>