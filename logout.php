<?php
	
	session_start();
	session_destroy();
	
	setcookie("remember","valid",time()-1, "/" );
	
	header("location: adminlogin.php");
?>