<?php
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

	if(isset($_SESSION['abc'])){

	
	
		//$conn = DBconnection();
		$sql = "select * from salesman";
		$result = mysqli_query($conn, $sql);

		echo "<div align='center'><table border='1' >
				<tr align='center'>
					<th>first Name</th>
					<th>last name</th>
					<th>userid</th>
					<th>email</th>
					<th>password</th>
					<th>action</th>
				</tr>
				</div>";

		while($row= mysqli_fetch_assoc($result)){
			echo "<div>
				<tr>
					<td>".$row['firstname']."</td>
					<th>".$row['lastname']."</th>
					<th>".$row['userid']."</th>
					<th>".$row['email']."</th>
					<th>".$row['password']."</th>
					
					
					<td>
						<a href='delete.php?id=".$row['id']."'>
							<input type='button' id='delete' name='delete' value='delete'/>
						</a >
						<a href='edit.php?id=".$row['id']."'>
							<input type='button'id='edit' name='edit' value='edit'/>
						</a >
						
						
					</td>
				</tr>
				</div>";

		}
				
		echo "</table>";

	}else{
		header("location: login.php");
	}

?>
</body>
</html>
<?php
	}

?>