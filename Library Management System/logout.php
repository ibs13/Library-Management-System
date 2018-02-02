<?php
	session_start();
	session_destroy();
	echo "YOU ARE LOGGED OUT";


	header("Location:index.php");
?>