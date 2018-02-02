<?php
	session_start();
	if(!isset($_SESSION['adminUsername']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminlogin.php");
	}
	
	require_once("addfunction.php");
?>
<?php include('header.php');?>
	<div id="wrapper-add">
			<h2>ADD BOOK</h2>
			<div style="color:red; font-weight: bold;">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Category&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</td>
							<td><input type="text" name="cat" placeholder="Enter category name" required style="margin-left:10px"></td>
						</tr>
						<tr>
							<td>Book Name&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: </td>
							<td><input type="text" name="book" placeholder="Enter book name" required style="margin-left:10px"></td>
						</tr>
						<tr>
							<td>Author Name&nbsp &nbsp &nbsp &nbsp &nbsp: </td>
							<td><input type="text" name="author" placeholder="Enter author name" required style="margin-left:10px"></td>
						</tr>
						<tr>
							<td>Picture&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: </td>
							<td><input type="file" name="pic" style="margin-left:10px"></td>
						</tr>
						<tr>
							<td>Quantity&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp : </td>
							<td><input type="number" name="quan" required style="margin-left:10px"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Save" name="form_login"></td>
						</tr>
					</table>
				</form>
			</div>
			
			<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$cat=$book=$author=$quan= "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$cat = test_input($_POST['cat']);
								$book = test_input($_POST['book']);
								$author = test_input($_POST['author']);
								$quan = test_input($_POST['quan']);
								
								$permited = array('jpg','jpeg','png','gif');
								
								$file_name = "";
								
								$file_name = $_FILES['pic']['name'];
								$file_size = $_FILES['pic']['size'];
								$file_temp = $_FILES['pic']['tmp_name'];
								
								$div = explode('.',$file_name);
								$file_ext = strtolower(end($div));
								$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
								$uploaded_image = "upload/".$unique_image;
								
								if(empty($_POST['cat']) or empty($_POST['book']) or empty($_POST['author']) or empty($_POST['quan'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								elseif( empty($file_name)){
									$uploaded_image = "upload/"."preview.png";
									
									move_uploaded_file($file_temp,$uploaded_image);
									
									$var = bookAdd($cat,$book,$author,$quan,$uploaded_image);
										
									if($var){
										echo $var;
									}
								}
								elseif($file_size>1024*1024){
									echo  "<p style='color:red'>* Image size must be less than 1 MB...</p>";
								}
								elseif(in_array($file_ext,$permited) === false){
									echo  "<p style='color:red'>* You can upload only:-".implode(', ',$permited)."...</p>";
								}
								else{
									
									move_uploaded_file($file_temp,$uploaded_image);
									
									$var = bookAdd($cat,$book,$author,$quan,$uploaded_image);
										
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