

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet type="text/css" href="mystylehome.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="jquery-3.3.1.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
	$("#button").click(function(){
        $("#show").show();
    });
});

</script>
 
<style> 
#show {
    display: none;
}
 #panel, #flip {
	weight:20%;
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}

#panel {
	 height: 20px;
     width:100%;
    padding: 50px;
    display: none;
}
</style>
</head>
<body>
<div>
	<h3 style="color:blue;text-align:center;">Toto company e commerce site and Home delivery</h3>
</div>
 
<div id="flip">action</div>
<div id="panel"><fieldset>
	
	<a href="adminlogin.php"><input type="submit" value="admin login"></a>
	<a href="salesmanlogin.php"><input type="submit" value="Salesman"></a>
	<a href="customer.php"><input type="submit" value="customer"></a>
	<input type="button"value="contact" id="button">
	

</fieldset>
</div>
<div id="show" style="color:blue;text-align:center;">
<p >email:abc@gmail.com</p></br>
<p >email:abc@gmail.com</p></br>


</div>




</body>
</html>
<?php
include "footer.php";
?>
