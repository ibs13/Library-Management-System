<?php
	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
?>
<?php include('header.php');?>
<div class="content">
	<h2>Wellcome To Book Shop</h2>
	<h3>About Us</h3>
	<p style="width:500px; margin:0 auto;font-size: 18px; color: #FFFF00; margin-top: 30px; font-weight: 700;">This is an online bookshop . Here you find all kind of books about your taste . So read and increase your knowledge .   </p>
    
	
</div>
<?php include('footer.php')?>	
</body>
</html>