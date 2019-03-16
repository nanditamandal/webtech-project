<?php
require "db.php";

session_start();

	if(isset($_SESSION['abc'])){
		
	
			$id=$_GET['id'];
			$conn = DBconnection();
			$sql ="DELETE FROM salesman WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			
			if($result){
			header("location: showsalesman.php");
		}else{
			header("location: showsalesman.php?error=true");
		}
			mysqli_close($conn);
			//header('location:admin.php');
	}
	else{
		echo "u r not valid user";
	}
	
?>