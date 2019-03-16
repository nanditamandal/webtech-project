<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['abc'])){
?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  
  <form method="POST" action="addproductcheck.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div id="img_div">
		
  	  <input type="file" name="image">
  	</div>
	<div>
	
  	  name: <input type="text" name="name">
  	</div>
	<div>
	
  	  quantity: <input type="text" name="quantity">
  	</div>
	<div>
	
  	  type:<input type="text" name="type">
  	</div>
	<div>
	
  	 price: <input type="text" name="price">
  	</div>
  	
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
<?php
}
?>
