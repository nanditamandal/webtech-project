<?php
	 require "db.php";
	error_reporting(0);
	
	//session_start();


 
 

	if(isset($_POST['submit'])){
	 
        $firstname	= $_POST['fname'];
        $lastname	= $_POST['lname'];
		$password=$_POST['upass'];
		$userid=$_POST['uname'];
		$email  =$_POST['email'];
		
		$email_1  =$_POST['email'];
		
		//$gender =$_POST['gender'];
	
	//////if($password==$password2){
		//create
		 
 
		$errorfirstname=""; 
		$errorlastname=""; 
		$errorpass="";
		$erroruserid="";
		$erroremail="";
		$errorgender="";
		
		
		
 		$i=0;
		$email_flag= 0;
		$position=0;
		$position2=0;
		 if(empty($firstname)){
            $errorfirstname .= "please enter your First NAME"; /////$error=$msg
		  } 
	          
			  
		   
			  if(empty($userid)){
            $erroruserid .= "please enter your uid"; /////$error=$msg
			  }  
			   	  
			   
			  
			  
			  
			  
			for($i=0;$i<strlen($email_1);$i++){
			if($email_1[$i]=="@"){
				$position = $i;
			}
			else if($email_1[$i]=="."){
				$position2=$i;
			}
			if(($email_1[$i]>="0" && $email_1[$i]<="9")||($email_1[$i]>="A" && $email_1[$i]<="Z")|| $email_1[$i]="@" || $email_1[$i]=="." || $email_1[$i]=="_" || ($email_1[$i]>="a" && $email_1[$i]<="z"))
			{
				continue;
			}
			else{
				$email_flag = 2;
			}
		}
		 
		
		
		 if( $email[0]=="@" || $email[0]=="." || ($email[0]>="0" && $email[0]<="9")){
			$email_flag=1;
		 }
		 if($email_flag>=1 ||($position+1>=$position2) || $position==0 || $position2==0)
		 {
			$erroremail .= "<li>Your email isn't in proper format </li>";
		 }  
		 if(empty($email)){
			$erroremail .= "<li> email empty </li>"; /////$error=$msg

			}
		 
		 
  
 
 
		  
		 
		
		
          if(strlen($firstname)<=3){
            $errorfirstname .= "please enter your First NAME"; /////$error=$msg
		  } 	  
			//// else if(empty($firstname)){
            /////$errorfirstname .= "please enter your First NAME"; /////$error=$msg
			 ///// } 
	          
			 			  
			   
		  if(empty($lastname)){
            $errorlastname .= "please enter your Last NAME"; /////$error=$msg
			  } 
			  
			///  else if(empty($password)){
				////              $errorpass .= "<li> please enter your password  </li>"; /////$error=$msg

			 //// }
			 if(empty($password)){
				              $errorpass .= "<li> please enter your password  </li>"; /////$error=$msg

			  }
			   
			  
			  else if(strlen($password)<=5) 
			  {
				  $errorpass .="<li>pass more than 5 char</li>"; /////$error=$msg
			  }
			 
			 if(strlen($userid)<=3){
            $erroruserid .= "user formt"; /////$error=$msg
			  }
			  
	
			   
			  
			else{
		
				$conn = DBconnection();

				$sql="INSERT INTO salesman(firstname,lastname,userid,email,password ) VALUES('$firstname','$lastname','$userid','$email','$password')";
 		
				
				
				
				if(mysqli_query($conn, $sql))
			{
				header("location: salesmanreg.php?state=true&success=Registration Successful.");
			}
			else{
				header("location: salesmanreg.php?state=true&success=Registration failed.");
			}
			mysqli_close($conn);
			}
			
			


	}else{
		echo "invalid";
	}
		
	
	 

		

 
?>	  