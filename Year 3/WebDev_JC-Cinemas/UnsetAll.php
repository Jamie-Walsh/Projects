<?php
	session_start();
	unset($_SESSION["Selected"]);
	unset($_SESSION["DateSelected"]);
	unset($_SESSION["currentFile"]);
	session_destroy();
	
	header("Location:film_times.php");
?>