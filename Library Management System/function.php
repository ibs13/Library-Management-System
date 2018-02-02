<?php

	require "config/config.php";
	
	function registerUser($username,$email,$password){
		
	global $conn;
	
	$sql = "SELECT userId FROM tbl_user WHERE userEmail = '".$email."'";
	$result = mysqli_query($conn,$sql);
	$num1  = mysqli_num_rows($result);
	
	$sql = "SELECT userId FROM tbl_user WHERE userName = '".$username."'";
	$result = mysqli_query($conn,$sql);
	$num2  = mysqli_num_rows($result);
	
	if($num1==0 && $num2==0){
	
	$sql = "INSERT INTO tbl_user (userName, userEmail, userPassword)
	VALUES ('".$username."', '".$email."', '".$password."')";

	if ($conn->query($sql) === TRUE) {
		$var = "You are successfully registered...";
		
		return $var;
	} else {
		$var  = "Error: " . $sql . "<br>" . $conn->error;
		
		return $var;
	}

	$conn->close();

	}else{
		$var = "Email or Usewrname is already used...";
		
		return $var;
	}
	
	}
	
	function loginUser($email,$password){
		
	global $conn;
	
	$sql = "SELECT userId,userName FROM tbl_user WHERE userEmail = '".$email."' AND userPassword = '".$password."'";
	$result = mysqli_query($conn,$sql);
	$userData = mysqli_fetch_array($result,MYSQLI_BOTH);
	$num1  = mysqli_num_rows($result);
	
	if($num1==1){
		
		session_start();
					
		$_SESSION['login'] = true;
		$_SESSION['uid'] = $userData['userId'];
		$_SESSION['username'] = $userData['userName'];
		$_SESSION['message'] = "Login Successfully.....";
		
		return true;
		
	}else{
		return false;	
	}
	
}
?>