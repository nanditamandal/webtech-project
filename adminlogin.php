<?php
	error_reporting(0);
	if(isset($_COOKIE['rm']))
	{
		header('location:adminhomepage.php');
	}else{

		if(isset($_GET['status'])){
			$status = $_GET['status'];

			if($status == "invaliduser"){
				echo "Invalid username/password";
			}else if($status == "nullvalue"){
				echo "username/password can't be empty";
			} 
		}
?>




<html>
    <head>
        <title>
            Sign up page
        </title>
        <script>
            
          
                
            
            var pass="";
            var cpass="";
            checkfname=false;
            checkuname=false;
            checkmail=false;
            checkpass=false;
            checkcpass=false;
            //checkph=false;
			
			///user id
            function valiation(e){
                var uname=e.value;
                var msg=document.getElementById("check");
                
                if(uname.length>=3){
                    msg.innerHTML="";
                    checkuname=true;
                    
                }
				else if(isNaN(uname)){
				 msg.innerHTML =" ** only digit 0-9 are allowed";
				 msg.style.color="red";
				
				}
				else if(uname.length<=0){
                    msg.innerHTML="pls input";
                    msg.style.color="red";
                }
                else if(uname.length<3){
                    msg.innerHTML="character kom";
                    msg.style.color="red";
                }
				
            }
			
            ///password
            function validatepass(e){
                var x= e.value;
                var msg=document.getElementById("checkpass");
                if(x.length<3 || x.length>=20){
                    msg.innerHTML="length between 3 to 20";
                    msg.style.color="red";
                   
                }
                else{
                    msg.innerHTML="";
                   
                    checkpass= true;
                }
            }
			
            
            function checkall(){
                
                //var type=document.getElementById("Type");
                
               // var posttype=type.options[type.selectedIndex].value;
                
                if(  checkuname==true && checkpass==true ){
                    alert("Signin sucessful.");
                    return true;
                }
                else{
                    alert("Please input all * information");
                    return false;
                }
            }
            
            
        </script>
    </head>
    <body>
        
        <?php
          //  include("Navbar.html");
        
            echo "<fieldset>
			<form method='post' action='logCheck.php'  onsubmit='return checkall()'  style='text-align:center'>
                 
                    <h1 style='text-align:cenetr'>Free sign in here</h1>
                    <b>User Id     : </b> <input type='text' onkeyup='valiation(this)' name='uname' id='usname' placeholder='At lest 3 character'><level id='check' style='color:red'>*</level><br></br>
					<b>Password      : </b>  <input type='password' onkeyup='validatepass(this)' name='upass' id='pass' placeholder='at lest 3 character'><level id='checkpass' style='color:red'>*</level><br></br>
										<input type='checkbox' name='rm'><br/>
                   
                    
                    
                    
                    
                    <input type='submit' value='Sign up' name='submit'  style='color:green'><input type='reset' value='Reset' style='color:green'>
					
                
             
        </form>
		</fieldset>";
		
        ?>
        
        
        
        
    </body>
</html>
<?php


include "footer.php";
	}
?>