<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['abc'])){
?>

<html>
<head>
<style>
#delete {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}

#edit {
    background-color: blue;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>


</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "","webtech");
	//require "db.php";
	//session_start();

	//if(isset($_COOKIE['abc'])){

	//	echo "<a href='logout.php'> logout</a> <br/><br/>";
	
		//$conn = DBconnection();
		$sql = "select * from product";
		$result = mysqli_query($conn, $sql);

		echo "<div align='center'><table border='1' >
				<tr align='center'>
					<th>Name</th>
					<th>quantity</th>
					<th>price</th>
					<th>type</th>
					<th>picture</th>
					<th>action</th>
				</tr>
				</div>";

		while($row= mysqli_fetch_assoc($result)){
			 echo "<div>
				<tr>
					<td>".$row['name']."</td>
					<th>".$row['quantity']."</th>
					<th>".$row['price']."</th>
					<th>".$row['type']."</th>
					<th>.<img src='image/".$row['picture']."' >.</th>
					
					<td>
						<a href='productdelete.php?id=".$row['id']."'>
							<input type='button' id='delete' name='delete' value='delete'/>
						</a >
						<a href='productedit.php?id=".$row['id']."'>
							<input type='button'id='edit' name='edit' value='edit'/>
						</a >
						
						
					</td>
				</tr>
				</div>";

		}
				
		echo "</table>";

	//}else{
	//	header("location: login.php");
	//}

?>
</body>
</html>
<?php
	}
?>