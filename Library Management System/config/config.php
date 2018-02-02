<?php
	
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "library";
	
	// Create connection
	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_error()) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
?>