<?php
	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
	
	require_once("addfunction.php");
	
	$id  = $_GET['id'];
	$cat = $_GET['cat'];
	
	$sql = "SELECT * FROM tbl_book WHERE bookId='".$id."'";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
?>
<?php include('header.php');?>
	<div id="wrapper-add">
			<h2>Modify BOOK</h2>
			<div style="color:red; font-weight: bold;">
				<form action="modify.php?id=<?php echo $id;?>&cat=<?php echo $cat;?>" method="post">
					<table>
						<tr>
							<td>Category&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</td>
							<td><?php echo $row["bookCategory"]; ?></td>
						</tr>
						<tr>
							<td>Book Name&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: </td>
							<td><?php echo $row["bookName"]; ?></td>
						</tr>
						<tr>
							<td>Author Name&nbsp &nbsp &nbsp &nbsp &nbsp: </td>
							<td><?php echo $row["bookAuthor"]; ?></td>
						</tr>
						<tr>
							<td>Quantity&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp : </td>
							<td><input type="number" name="quan" value="<?php echo $row["bookQuantity"]; ?>" style="margin-left:10px"></td>
						</tr>
						<tr>
							<td><input style="margin-left:170px" type="submit" value="Update" name="form_login"></td>
						</tr>
					</table>
				</form>
			</div>
			
			<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$quan= 0;
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$quan = test_input($_POST['quan']);
								
								if(empty($_POST['quan'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}else{
									
									$var = bookmodify($quan,$id,$cat);
										
									if($var){
										echo $var;
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
<?php include('footer.php')?>	
</body>
</html>