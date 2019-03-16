<?php

session_start();

	if(isset($_SESSION['abc'])){
?>

<html>
<head>
<link rel="stylesheet type="text/css" href="mystylehome.css">
</head>
<body style="background-color:gray" background="pick.jpg">
<?php
	

	

	
  
	

	 echo"<h3 style='color:blue'><center>WELCOME ADMIN</center></h3><br/><br/>";
	
	 echo"<div class='bg-img'>
	 <div class='container'>
	 <div class='topnav'>
	 <a href='addproduct.php'>product add</a>
	 <a href='allproduct.php'>all product</a>
	 <a href='searchproduct.php'>search product</a>
	 
	 
	 <a href='logout.php'>log out</a>
	 
	 <a href='salesmanreg.php'>salesman signup</a>
	 <a href='showsalesman.php'>salesman detail</a>
	 <a href='salesmansearch.php'>salesman search</a>
	 </div>
	 </div>
	 </div>";
	


?>
</body>
</html>
<?php
	}
	else{
		echo"invalid user";
	}
?>