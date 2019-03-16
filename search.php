<?php

$key=$_POST['key'];



$databaseHost = 'localhost';
$databaseName = 'webtech';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$result=mysqli_query($mysqli, "select type from product where type like '".$key."%'");

//$row = mysqli_fetch_array($result);
//echo $row['sname'];



$data ="";
	while($row = mysqli_fetch_array($result)){
		//$data .="<div onclick='abc(this.innerHTML)' style='background-color: #eee;width:200px;border: 1px solid #000;margin:2px'>".$row['type']."</div>";
		//$data .="<div onclick='abc(this.innerHTML)'>".$row['type']."</div>";
		//$data =$row['type'];
		echo $row['type'];
	}
	echo $data;



?>