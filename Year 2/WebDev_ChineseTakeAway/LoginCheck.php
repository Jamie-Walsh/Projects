<?php 
 session_start();
 unset($_SESSION["account"]);
 unset($_SESSION["error"]);
 unset($_SESSION["success"]);
 
 $con = mysqli_connect("localhost","root","","jamie walsh-assignment");
 
 $query = "SELECT * FROM users WHERE Username='".$_POST['username']."' AND Password='".$_POST['password']."'";
  
 $sql = $con->query($query);
 
 $n = $sql->num_rows;
  
 if($n > 0)
 {
	$_SESSION["account"] = $_POST['username'];
	$_SESSION["success"] = "Logged in"; 
	header("Location:login_register.php");
	return;
 }
 else
 {	
	$_SESSION["error"] = "**Error: Incorrect Username or Password**";
	header("Location:login_register.php");
	return;
 }


 