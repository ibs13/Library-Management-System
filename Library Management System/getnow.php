<?php

	require "config/config.php";
	
	session_start();
	if(!isset($_SESSION['username']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:login.php");
	}
	
	$id = $_GET['id'];
	$quan = $_GET['qun']-1;
	$user = $_SESSION['username'];
	$rec_date = date('d-m-Y');
	$ret_date = date('d-m-Y', strtotime("+7 days"));
	$pen = 0;
	
	$sql = "INSERT INTO tbl_borrower (borrowerUsername, borrowerBookId, recDate, retDate, penalty)
	VALUES ('".$user."', '".$id."', '".$rec_date."', '".$ret_date."', '".$pen."')";

	if ($conn->query($sql) === TRUE) {
		$sql = "UPDATE tbl_book SET bookQuantity='".$quan."' WHERE bookId='".$id."'";
			if ($conn->query($sql) === TRUE) {
				$var = "<p style='color:red;text-align:center'>You are successfully registered...<p>";
				
				header("location:profile.php");	
			} else {
				$var  = "Error: " . $sql . "<br>" . $conn->error;
				
				echo $var;
			}

	} else {
		$var  = "Error: " . $sql . "<br>" . $conn->error;
		
		echo $var;
	}

	$conn->close();
	
?>