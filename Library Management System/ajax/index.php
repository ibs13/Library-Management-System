<!DOCTYPE HTML>

<html lang="en-US">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register Form With Ajax</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<style type="text/css">
		
			input{
				width: 100%;
			}
		
		</style>
		
	</head>

	<body>
	
		<div class="col-md-4"></div>
		
		<div class="col-md-4">
		
			<h3>Create Your Account</h3>
			
			<form id = "form" class="form-group" action="insert.php" method="POST">
				
				<label for="email">Email : </label>
				<input class="form-control input-lg" type="email" name="email" id="email"  placeholder="Enter Your Email" />
				
				<label for="password">Password : </label>
				<input class="form-control input-lg" type="password" name="password" id="password"  placeholder="Enter Your Password" />
				
				<button id="submit" class="btn btn-default btn-lg" type="submit">Submit</button>
				
				<div class="status"></div>
				
			</form>
		
		</div>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		<script src="main.js"></script> 
		<script>
			
			$(document).ready(function(){
				
				$('#submit').click(function(event){
					
					event.preventDefault();
					
					var data = $("#form").serializeArray();
					
					$.post(
						$('#form').attr('action'),
						data,
						function(x){
							$('.status').html(x);
							$('.status').fadeOut(3000);
						}
					)
					
				});
				
			});
	
		</script>
		
	</body>

</html>