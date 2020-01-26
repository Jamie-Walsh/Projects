<?php
 session_start();
 unset($_SESSION["DateSelected"]);
 unset($_SESSION["Selected"]);
 
 $con = mysqli_connect("localhost","root","","jamie walsh-assignment");
 
 $query = "SELECT date.Date FROM date WHERE Title='".$_POST['Movie']."'";
  
 $sql = $con->query($query);
 
 $n = $sql->num_rows;
  
 if($n > 0)
 {
	$_SESSION["Selected"] = $_POST['Movie'];
	header("Location:film_times.php");
	return;
 }
 else
 {	
	header("Location:film_times.php");
	return;
 }