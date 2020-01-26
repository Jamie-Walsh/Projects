<?php
	session_start();

	$con = mysqli_connect("localhost","root","","jamie walsh-assignment");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 
	$query= "SELECT date.Date FROM date WHERE Title='".$_SESSION["Selected"]."'AND date.Date='".$_SESSION["DateSelected"]."' 
			AND (date.Time1='".$_POST['Time']."' OR date.Time2='".$_POST['Time']."' OR date.Time3='".$_POST['Time']."' OR date.Time4='".$_POST['Time']."')";
	  
	$sql = $con->query($query);
	 
	$n = $sql->num_rows;
	  
	if($n > 0)
	{
		
		$sql2 = "INSERT INTO bookings (Customer_Name, Movie, Show_Time, Show_Date, Number_of_Tickets, Total_Cost) 
				VALUES 
			   ('$_SESSION[account]','$_SESSION[Selected]','$_POST[Time]','$_SESSION[DateSelected]',$_POST[Tickets], ($_POST[Tickets]*7))";

			   

		if ($con->query($sql2) === TRUE) 
		{
			unset($_SESSION["Selected"]);
			header("Location:Booking.php");
			return;
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $con->error;
		}

		mysqli_close($con);
	}
	else
	{
		header("Location:filmDetails.php");
		return;
	}
?>