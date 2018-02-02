<?php
	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
	
	require "../config/config.php";
	
?>
<?php include('config.php'); ?>
<!doctype html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data View</title>
</head>
<body>
<?php include('header.php');?>

<h1 style="margin-bottom:20px;margin-top:20px;text-align:center;color:red">Borrower List</h1>

<table class="tbl2">
	<tr>
		<th width="10%">Serial No.</th>
		<th width="20%">Book Name</th>
		<th width="15%">Author Name</th>
		<th width="15%">Received Date</th>
		<th width="15%">Return Date</th>
		<th width="10%">Penalty</th>
		<th width="15%">Action</th>
	</tr>
	<?php
	
	$i=0;
	$sql = "SELECT * FROM tbl_borrower";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)) 
	{
		$i++;
		
		$today = date('d-m-Y');
		
		if($today>$row["retDate"]){
			$start = strtotime($row["retDate"]);
			$end = strtotime($today);

			$days_between = ceil(abs($end - $start) / 86400);
			$pen = 10 * $days_between;
		}else{
			$pen = 0;
		}
		
		$query = "SELECT * FROM tbl_book WHERE bookId='".$row['borrowerBookId']."'";
		$res = mysqli_query($conn,$query);
		$_row=mysqli_fetch_array($res);
		
		?>
		
		<tr>
		<td><?php echo $i."."; ?></td>
		<td><?php echo $_row["bookName"]; ?></td>
		<td><?php echo $_row["bookAuthor"]; ?></td>
		<td><?php echo $row["recDate"]; ?></td>
		<td><?php echo $row["retDate"]; ?></td>
		<td><?php echo $pen;?></td>
		<td><a href="borrdel.php?id=<?php echo $row["borrowerId"];?>">received</a></td>
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>

<?php include('footer.php')?>	
</body>
</html>