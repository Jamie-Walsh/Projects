<?php
 session_start();
 unset($_SESSION["account"]);
 unset($_SESSION["regError"]);
 unset($_SESSION["success"]);
 
$con=mysqli_connect("localhost","root","","jamie walsh-assignment");


$sql="INSERT INTO users (First_Name, Surname, Address, Email, Phone_Number, Username, Password) 
VALUES
('$_POST[first]','$_POST[sur]','$_POST[address]','$_POST[email]','$_POST[number]','$_POST[username]','$_POST[password]')";

if(!mysqli_query($con,$sql))
{
	$_SESSION["regError"] = "**Error: Username Taken**";
	header("Location:login.php");
	return;
}
else
{
	$_SESSION["account"] = $_POST['username'];
	$_SESSION["success"] = "Logged in";
	header("Location:login.php");
	return;
}
mysqli_close($con);

?>