<?php

	require "../config/config.php";
	
	function bookAdd($cat,$book,$author,$quan,$picture){
		
	global $conn;
	
	
	$sql = "INSERT INTO tbl_book (bookName, bookCategory, bookAuthor, bookQuantity, bookPicture)
	VALUES ('".$book."', '".$cat."', '".$author."', '".$quan."', '".$picture."')";

	if ($conn->query($sql) === TRUE) {
		$var = "<p style='color:red;text-align:center'>You are successfully registered...<p>";
		
		return $var;
	} else {
		$var  = "Error: " . $sql . "<br>" . $conn->error;
		
		return $var;
	}

	$conn->close();
	
	}
	
	function bookmodify($quan,$id,$cat){
		
	global $conn;
	
	echo $cat;
	
	$sql = "UPDATE tbl_book SET bookQuantity='".$quan."' WHERE bookId='".$id."'";
	if ($conn->query($sql) === TRUE) {
		$var = "<p style='color:red;text-align:center'>You are successfully registered...<p>";
		
		header("location:booklist.php?cat=$cat");	
	} else {
		$var  = "Error: " . $sql . "<br>" . $conn->error;
		
		return $var;
	}

	$conn->close();
	

}
?>