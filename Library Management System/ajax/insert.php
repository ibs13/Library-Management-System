<?php

	require_once("config.php");
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$sql = "INSERT INTO user(email,password) VALUES('$email','$password')";
	
	$process = $conn->query($sql);
	
	if($process)
		echo "You Are Successfully Registered.";
	else
		echo "Registration is failed.";
	
?>