<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to my favourite player list</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">
<div class="header">

			</div>
<div class="menu">
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="viewbook.php">View Book</a></li>
	<li><a href="search.php">Serach Book</a></li>
	<li><a href="profile.php">Profile</a></li>
	<?php
		if(isset($_SESSION['username'])){
	?>
		<li><a href="logout.php">Logout</a></li>
	<?php }else{ ?>
		<li><a href="login.php">Login</a></li>
	<?php } ?>
	
</ul>
</div>