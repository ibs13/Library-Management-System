<?php
	session_start();
	
	require "config/config.php";
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Category List</title>
</head>
<body>
<?php include('header.php');?>
<h2>View Book List</h2>

<div class="bc">
	<?php
	$i=0;
	$sql = "SELECT bookCategory FROM tbl_book";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		if($i==0){
			$arr[$i] = $row['bookCategory'];
			$i++;
			
		 ?>
		 
		 <a href="booklist.php?cat=<?php echo $arr[$i-1]; ?>"><?php echo $arr[$i-1]; ?></a>
			
		<?php
		
		}else{
			$flag = 0;
			for($j=0;$j<$i;$j++){
				if($arr[$j]==$row['bookCategory']){
					$flag = 1;
					break;
				}
			}
			
			if($flag==0){
				$arr[$i] = $row['bookCategory'];
				$i++;
				
			?>
		 
			<a href="booklist.php?cat=<?php echo $arr[$i-1]; ?>"><?php echo $arr[$i-1]; ?></a>
			
		<?php
		
			}
		}
	}
	
	?>
	
	
</div>

<?php include('footer.php')?>	
</body>
</html>