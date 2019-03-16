<?php

	if(isset($_COOKIE['rm']))
	{
		header('location: adminhomepage.php');
	}else{

		if(isset($_GET['status'])){
			$status = $_GET['status'];

			if($status == "invaliduser"){
				echo "Invalid username/password";
			}else if($status == "nullvalue"){
				echo "username/password can't be empty";
			} 
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>


	<fieldset>
	<legend>LOGIN</legend>
		<form method="post" action="logCheck.php">
			User Name: <input type="text" name="username"/><br/>
			Password  : <input type="password" name="password"/><br/>
			<input type="checkbox" name="rm"><br/>
			<input type="submit" name="submit" value="Submit"/>
		</form>
	</fieldset>
</body>
</html>

	<?php
		include "footer.php";
	?>

<?php
	}
?>