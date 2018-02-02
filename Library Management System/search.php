<?php
	session_start();
	if(!isset($_SESSION['username']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:login.php");
	}else{
		$user = $_SESSION['username'];
	}
	
	require "config/config.php";
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data View</title>
</head>
<body>
<?php include('header.php');?>
	<h2>HELLO <?php echo  strtoupper($user); ?></h2>

	<form action="srcfun.php" method="GET" class="srch">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
	

<?php include('footer.php')?>	
</body>
</html>