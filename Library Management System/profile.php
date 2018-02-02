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
<h2>Hello <?php echo $user; ?></h2>

<table class="tbl2">
	<tr>
		<th width="10%">Serial No.</th>
		<th width="30%">Book Name</th>
		<th width="15%">Author Name</th>
		<th width="15%">Received Date</th>
		<th width="15%">Return Date</th>
		<th width="15%">Penalty</th>
	</tr>
	<?php
	
	$i=0;
	$sql = "SELECT * FROM tbl_borrower WHERE borrowerUsername='".$user."'";
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
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>

<?php include('footer.php')?>	
</body>
</html>