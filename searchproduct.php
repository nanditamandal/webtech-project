<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['abc'])){
?>



<html>

    <head>

        <title> PHP FIND DATA </title>

        
		<script>
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
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

    <form action="searchproduct.php" method="post">

       
        First Name:<input type="text" id='search' name="type" value="" onkeyup="loadData()">


        

        <input type="submit" id="submit" name="search" value="Find">
		<div id="result">
			
		</div>
		
		<script type="text/javascript">
				
		
		function loadData(){

			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'search.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "key="+document.getElementById('search').value;
			xmlHttp.send(abc);

			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					
					var data = "<div style='background-color:#eee;border: 1px solid #000; width:200px'>"+this.responseText+"</div>";
				//	var data = this.responseText;
					//document.getElementById('result').innerHTML = data;
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
    $type= $_POST['type'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","webtech");
    
    // mysql search query
    $query = "SELECT * FROM product WHERE type='$type'";
    
    $result = mysqli_query($connect, $query);
	echo "<div align='center'><table border='1' >
				<tr align='center'>
					<th>Name</th>
					<th>quantity</th>
					<th>price</th>
					<th>type</th>
					<th>picture</th>
					<th>Action</th>
				</tr>
				</div>";
    
    
      while ($row = mysqli_fetch_array($result))
      {
		echo  "<div>
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
		echo "invalid";
	}
?>