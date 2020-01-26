<?php
	session_start();
	
	echo "<h1>Change Your Address</h1>";
	
	echo "<form id = \"loginform\" action=\"LoginCheck.php\" method = \"post\">";
	echo "<input id= \"TextBox\" type=\"text\" name=\"address\" placeholder=\" New Address\" required>";
	echo "<br><br>";
	echo "<input id=\"button\" type=\"submit\" value=\"Save\">";
	echo "</form>";
	
	$con=mysqli_connect("localhost","root","","jamie walsh-assignment");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if(!empty($_POST['Save']))
	{
		$_SESSION["account"] = $_SESSION["account"];
		$_SESSION["success"] = "Logged in"; 
		mysqli_query($con,"UPDATE users SET Address = '".$_POST['address']. "' WHERE Username= '".$_SESSION["account"]."'");
		header("Location:login.php");
		return;
	}
?>