<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['abc'])){
?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP FIND DATA </title>

        
		<script>
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		<script>
		
	</script>

    </head>

    <body>

    <form action="salesmansearch.php" method="post">

       
        First Name:<input type="text" id='search' name="userid" value="" onkeyup="loadData()">


        

        <input type="submit" id="submit" name="search" value="Find">
		<div id="result">
			
		</div>
		
		<script type="text/javascript">
				$(document).ready(function(){
		$("#submit").click(function(){
        $("#submit").css("color", "red");
    });
});
	
		
		function loadData(){

			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'salsearch.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "key="+document.getElementById('search').value;
			xmlHttp.send(abc);

			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					
					var data = "<div style='background-color:#eee;border: 1px solid #000; width:200px'>"+this.responseText+"</div>";
					document.getElementById('result').innerHTML = data;
				}
			}

		}

		function abc(data){

			document.getElementById('search').value=data;
			document.getElementById('result').innerHTML="";
		}

	</script>
		</form>

           

    </body>

</html>

<?php


if(isset($_POST['search']))
{
    // id to search
    $userid= $_POST['userid'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", " ","webtech");
    
    // mysql search query
    $query = "SELECT * FROM salesman WHERE userid='$userid'";
    
    $result = mysqli_query($connect, $query);
	echo "<div align='center'><table border='1' >
				<tr align='center'>
					<th>first Name</th>
					<th>last Name</th>
					<th>userid</th>
					<th>email</th>
					<th>password</th>
					<th>Action</th>
				</tr>
				</div>";
    
    
      while ($row = mysqli_fetch_array($result))
      {
		echo  "<div>
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
		
        
       
		//echo "<img src='image/".$row['picture']."' >";
      }  
    mysqli_close($connect);
    
 
   
    
    
   
    
    
}

// in the first time inputs are empty
		else{
			$name = "";
            $userid = "";
            $gender = "";
		}

	
?>

<?php
	}
	else{
		echo"invalid user";
	}
?>