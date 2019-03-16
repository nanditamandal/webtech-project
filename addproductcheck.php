<?php

  $db = mysqli_connect("localhost", "root", "", "webtech");
	$msg = "";


  
  if (isset($_POST['upload'])) {
	  $name=$_POST['name'];
	  $price=$_POST['price'];
	  $quantity=$_POST['quantity'];
	  $type=$_POST['type'];
	  	$uploadok=1;
	  $ename="";
	  $eprice="";
	  
		$image = $_FILES['image']['name'];
		$target = "image/".basename($image);
		$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
		if(empty($name)){
            $ename .= "please enter your First NAME"; /////$error=$msg
		 } 
		 if(empty($price)){
            $eprice .= "please enterprice"; /////$error=$msg
		  } 
		if (file_exists($target)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		if ($_FILES["image"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		//if ($uploadOk == 0) {
		//	echo "Sorry, your file was not uploaded.";

		else{
			$sql = "INSERT INTO product (name ,quantity, price, type, picture) VALUES ('$name',' $quantity', '$price','$type','$image')";
  	// execute query
			mysqli_query($db, $sql);

			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				$msg = "Image uploaded successfully";
				header("location: adminhomepage.php");
			}else{
			$msg = "Failed to upload image";
			}
		}
  }

  	
  
 // $result = mysqli_query($db, "SELECT * FROM image");
?>
