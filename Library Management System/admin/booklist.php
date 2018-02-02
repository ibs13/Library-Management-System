<?php
	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
	
	require "../config/config.php";
	
	if(!isset($_GET['cat']) || $_GET['cat']==NULL){
		header("Location:viewbook.php");
	}
	else{
		 $cat = $_GET['cat'];
	}
	
?>
<?php include('config.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data View</title>
</head>
<body>
<?php include('header.php');?>
<h2><?php echo $cat; ?></h2>

<table class="tbl2">
	<tr>
		<th width="10%">Serial No.</th>
		<th width="30%">Book Name</th>
		<th width="15%">Author Name</th>
		<th width="10%">Quantity</th>
		<th width="20%">Picture</th>
		<th width="15%">Action</th>
	</tr>
	<?php
	$i=0;
	$sql = "SELECT * FROM tbl_book WHERE bookCategory='".$cat."'";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)) 
	{
		$i++;
		?>
		
		<tr>
		<td><?php echo $i."."; ?></td>
		<td><?php echo $row["bookName"]; ?></td>
		<td><?php echo $row["bookAuthor"]; ?></td>
		<td><?php echo $row["bookQuantity"]; ?></td>
		<td><img height="60px" width="40px" src="<?php echo $row["bookPicture"]; ?>" alt="<?php echo $row['bookName']; ?>" /></td>
		<td><a href="modify.php?id=<?php echo $row["bookId"];?>&cat=<?php echo $row["bookCategory"];?>">Modify</a> / <a href="delete.php?id=<?php echo $row["bookId"]; ?>&cat=<?php echo $row["bookCategory"];?>">Delete</a></td>
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>

<?php include('footer.php')?>	
</body>
</html>