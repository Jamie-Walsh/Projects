<?php 
 session_start();
 unset($_SESSION["DateSelected"]);
 
 $con = mysqli_connect("localhost","root","","jamie walsh-assignment");
 
 $query = "SELECT * FROM date WHERE Title= '".$_SESSION["Selected"]."' AND Date='".$_POST['Date']."'";
  
 $sql = $con->query($query);
 
 $n = $sql->num_rows;
  
 if($n > 0)
 {
	$_SESSION["DateSelected"] = $_POST['Date'];
	header("Location:filmDetails.php");
	return;
 }
 else
 {
	header("Location:film_times.php");
	return;
 }
 ?>