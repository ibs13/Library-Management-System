<?php

	require "../config/config.php";
	
	$id  = $_GET['id'];
	$cat = $_GET['cat'];
	
	$sql = "DELETE FROM tbl_book WHERE bookId='".$id."'";
	
	if ($conn->query($sql) === TRUE) {
		$var = "<p style='color:red;text-align:center'>You are successfully registered...<p>";
		
		header("location:booklist.php?cat=$cat");	
	} else {
		echo $var  = "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>