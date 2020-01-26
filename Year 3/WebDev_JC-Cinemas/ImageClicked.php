<?php
 session_start();
 unset($_SESSION["Selected"]);
 unset($_SESSION["DateSelected"]);
 
 $con = mysqli_connect("localhost","root","","jamie walsh-assignment");
 $src = $_POST['image'];
 
 $query = "SELECT * FROM date JOIN movies USING(MOVIE_ID) WHERE Poster='$src'";
  
 $sql = $con->query($query);
 
 $n = $sql->num_rows;
  
 if($n > 0)
 {
	while($row = mysqli_fetch_array($sql))
	{
		$_SESSION["Selected"] = $row['Title'];
	}
	
	header("Location:film_times.php");
	return;
 }
 else
 {	
	header("Location:film_times.php");
	return;
 }
 ?>