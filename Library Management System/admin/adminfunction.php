<?php

	require "../config/config.php";
	
	function registerUser($username,$email,$password){
		
	global $conn;
	
	$sql = "SELECT adminId FROM tbl_admin WHERE adminEmail = '".$email."'";
	$result = mysqli_query($conn,$sql);
	$num1  = mysqli_num_rows($result);
	
	$sql = "SELECT adminId FROM tbl_admin WHERE adminUsername = '".$username."'";
	$result = mysqli_query($conn,$sql);
	$num2  = mysqli_num_rows($result);
	
	if($num1==0 && $num2==0){
	
	$sql = "INSERT INTO tbl_admin (adminUsername, adminEmail, adminPassword)
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
	
	$sql = "SELECT adminId,adminUsername FROM tbl_admin WHERE adminEmail = '".$email."' AND adminPassword = '".$password."'";
	$result = mysqli_query($conn,$sql);
	$userData = mysqli_fetch_array($result,MYSQLI_BOTH);
	$num1  = mysqli_num_rows($result);
	
	if($num1==1){
		
		session_start();
					
		$_SESSION['login'] = true;
		$_SESSION['aid'] = $userData['adminId'];
		$_SESSION['adminUsername'] = $userData['adminUsername'];
		$_SESSION['message'] = "Login Successfully.....";
		
		return true;
		
	}else{
		return false;	
	}
	
}
?>