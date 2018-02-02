<?php
ob_start();
session_start();
if($_SESSION['name']!='defaul')
{
	header('location: login.php');
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