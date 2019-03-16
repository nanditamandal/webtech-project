<?php

include_once("db.php");
session_start();
if(isset($_SESSION['abc'])){
	
$id = $_GET['id'];
$conn = DBconnection();
 
$result = mysqli_query($conn, "SELECT * FROM salesman WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $firstname = $res['firstname'];
	$lastname = $res['lastname'];
	$userid= $res['userid'];
	$email = $res['email'];
	$password = $res['password'];
   
}
 
if(isset($_POST['update']))
{    
  
    $id = $_POST['id'];
    $firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$userid=$_POST['userid'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	
	$conn = DBconnection();
            
     
    $result = mysqli_query($conn, "UPDATE `salesman` SET `firstname`='$firstname',`lastname`='$lastname',`userid`='$userid',`email`='$email',`password`='$password' WHERE id= $id");
	if($result)
	{
		  header("Location: showsalesman.php");
	}
	else{
		header("Location: showsalesman.php?error=true");
		
		
	}
		mysqli_close($conn);
  	}
        
        
        //header("Location: showsalesman.php");


?>

<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php" >
        <table border="0">
            <tr> 
                <td>first Name</td>
                <td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td>
            </tr>
			<tr> 
                <td>last name</td>
                <td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
            </tr>
			<tr> 
                <td>userid</td>
                <td><input type="text" name="userid" value="<?php echo $userid;?>"></td>
            </tr>
			<tr> 
                <td>email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
			<tr>
				<td>password</td>
				<td><input type="text" name="password" value="<?php echo $password;?>"></td>
			</tr>
            
            <tr>
               <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
	}
	else{
		echo"invalid";
	}


?>