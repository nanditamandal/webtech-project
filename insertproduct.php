<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "webtech");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  $name=$_POST['name'];
	  $price=$_POST['price'];
	  $quantity=$_POST['quantity'];
	  $type=$_POST['type'];
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "image/".basename($image);

  	$sql = "INSERT INTO product (name ,quantity, price, type, picture) VALUES ('$name',' $quantity', '$price','$type','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
 // $result = mysqli_query($db, "SELECT * FROM image");
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
  
  <form method="POST" action="insertproduct.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
		
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
