<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "form";
	
	$conn = new mysqli($host,$user,$pass,$db);
	
	if(!$conn)
		echo "Failed";

?>