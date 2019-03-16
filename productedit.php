<?php
// including the database connection file
  include_once("db.php");
$id = $_GET['id'];
$conn = DBconnection();
 
$result = mysqli_query($conn, "SELECT * FROM product WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
	$price = $res['price'];
	$quantity = $res['quantity'];
	$type = $res['type'];
   
}
 
if(isset($_POST['update']))
{    
  
    $id = $_POST['id'];
    $name=$_POST['name'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$type=$_POST['type'];
	
	$image = $_FILES['image']['name'];
	$target = "image/".basename($image);
	$conn = DBconnection();
            
     
        $result = mysqli_query($conn, "UPDATE product SET name='$name',price='$price',quantity='$quantity',type='$type' ,picture='$image' WHERE id= $id");
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		}else{
  		$msg = "Failed to upload image";
  	}
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: view_users.php");
}

?>
<?php


?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
			<tr> 
                <td>price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
			<tr> 
                <td>type</td>
                <td><input type="text" name="type" value="<?php echo $type;?>"></td>
            </tr>
			<tr> 
                <td>quantity</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
			<tr>
				<td>picture</td>
				<td><input type="file" name="image"></td>
			</tr>
            
            <tr>
               <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>