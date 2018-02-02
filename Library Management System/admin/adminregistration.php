<?php
	session_start();
	if(isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminpanel.php");
	}

	require_once("adminfunction.php");

	//$user = new LoginRegistration();

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Library Manager</title>
	<link rel="stylesheet" type="text/css" href="../style.css" media="all" />
	
</head>
<body>

	
	<div id="mid">
	<div id="wrapper-login">
	<h1>Admin Registration Form</h1>
	<div style="color:red; font-weight: bold;">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<table>
			<tr>
				<td>Username&nbsp: </td>
				<td><input type="text" name="username" placeholder="Enter Your Username" required></td>
			</tr>
			<tr>
				<td>Email&nbsp &nbsp &nbsp &nbsp &nbsp:</td>
				<td><input type="email" name="email" placeholder="Enter Your Email" required style="margin-left:10px"></td>
			</tr>
			<tr>
				<td>Password&nbsp: </td>
				<td><input type="password" name="password" placeholder="Set a Password" required style="margin-left:10px"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Register" name="form_login"></td>
			</tr>
		</table>
	</form>
</div>

	<div class="msg">
	
		
		<?php
						
			//define variables and set empty value
			
			$username=$email=$password = "";
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
				
				$username = test_input($_POST['username']);
				$email = test_input($_POST['email']);
				$password = test_input($_POST['password']);
				
				if(empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])){
					echo  "<p style='color:red'>* All field must be filled up...</p>";
				}
				else{
					
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
						  echo "<p style='color:red'>Invalid email format</p>";
					}else{
					
						//$password = md5($password);
					
						$register = registerUser($username,$email,$password);
						
						
						
						if($register){
							echo "<p style='color:red;text-align:center;font-weight:bold'>".$register."<p>";
						}
					
					}
				}
					
			}
			
			
				function test_input($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					
					return $data;
				}
		?>
	
	</div>


</div>
	
	
</body>
</html>