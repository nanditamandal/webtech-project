<?php
	session_start();
	
	if(isset($_POST['submit'])){

		$username = $_POST['uname'];
		$password = $_POST['upass'];

		$isValid = "";

		if($username == "" && $password == "" ){
			header("location: adminlogin.php?status=nullvalue");
		}else{

			$user = simplexml_load_file('user.xml');
			
			if($user->username == $username && $user->password == $password){
				$_SESSION['abc'] = "validuser";
				$isValid = "valid";
				
				if($_POST['rm'] =="on"){

					setcookie("remember","valid",time()+36000000, "/" );
				}

				
				//setcookie('abc', 'validuser', time()+3600, '/');
				
			}
		

			if($isValid == "valid"){
				
				header("location: adminhomepage.php");
			}else{
				header("location: adminlogin.php?status=invaliduser");
			}
			
		}

	}else{
		echo "invalid Reguest!";
	}
	
?>