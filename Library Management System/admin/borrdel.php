<?php 

	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
	
	require "../config/config.php";
	
	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("Location:controluser.php");
	}
	else{
		 $id = $_GET['id'];
	}
	
	
	$sql = "DELETE FROM tbl_borrower WHERE borrowerId='".$id."'";
	
	if ($conn->query($sql) === TRUE) {
		
		header("location:controluser.php");	
	} else {
		echo $var  = "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>