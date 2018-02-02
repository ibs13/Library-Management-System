<?php
	session_start();
	
	
	require "config/config.php";
	
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
		<th width="20%">Author Name</th>
		<th width="15%">Status</th>
		<th width="10%">Picture</th>
		<th width="15%">Action</th>
	</tr>
	<?php
	
	
	$sql = "SELECT COUNT(*) FROM tbl_borrower WHERE borrowerUsername='".$_SESSION['username']."'";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	
	echo $num = $row['COUNT(*)'];
	
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
		<td><?php if($row["bookQuantity"]>0){ ?>Available
		<?php }else{ ?>Not Available<?php } ?></td>
		<td><img height="60px" width="40px" src="<?php echo $row["bookPicture"]; ?>" alt="<?php echo $row['bookName']; ?>" /></td>
		<td><?php if($row["bookQuantity"]>0 && $num<=5){ ?><a href="getnow.php?id=<?php echo $row["bookId"];?>&qun=<?php echo $row["bookQuantity"];?>">Get Now</a>
		<?php }else{ ?><a style="pointer-events: none;cursor: default" href="getnow.php?id=<?php echo $row["bookId"] ;?>&qun=<?php echo $row["bookQuantity"];?>">Get Now</a><?php } ?></td>
		</tr>
		<?php
	}
	
	?>
	
	
	
	<?php 
	if($num>5){ ?>
		<p style='color:#f1c40f;text-align:center;margin-bottom:20px;font-weight:bold'>You don't get more than 5 books.....</p> 
	<?php }
	?>
	
	
</table>

<?php include('footer.php')?>	
</body>
</html>