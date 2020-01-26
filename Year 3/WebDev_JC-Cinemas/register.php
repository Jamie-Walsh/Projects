<?php
 session_start();
 include_once 'dbconnect.php';
 unset($_SESSION["account"]);
 unset($_SESSION["regError"]);
 unset($_SESSION["success"]);

$day = $_POST["day_text"];
$month = $_POST["m_text"];
$year = $_POST["y_text"];

$date = "$day-$month-$year";

$sql="INSERT INTO users (First_Name, Surname, Date, Address, Email, Username, Password)
VALUES
('$_POST[name_text]','$_POST[sur_text]','$date','$_POST[addr_text]','$_POST[email_text]','$_POST[user_text]','$_POST[pass_text]')";

if(!mysqli_query($con,$sql))
{
	$_SESSION["regError"] = "**Error: Username Taken**";
	header("Location:login_register.php");
	return;
}
else
{
	$_SESSION["account"] = $_POST['user_text'];
	$_SESSION["success"] = "Logged in";
	header("Location:login_register.php");
	return;
}
mysqli_close($con);

?>