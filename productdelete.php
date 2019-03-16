<?php
	require "db.php";
	$id=$_GET['id'];
			$conn = DBconnection();
			$sql ="DELETE FROM product WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			
			if($result){
			header("location: allproduct.php");
		}else{
			header("location: allproduct.php?error=true");
		}
			mysqli_close($conn);
			//header('location:admin.php');
	
?>