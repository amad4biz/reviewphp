<?php 


include('functions.php');

// validation of user id and password

if($_GET['action']=="loginSignup"){

    
   if(!$_POST['email']){

   	$error = "email is required";

   }else if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)===false){

       $error = "Please enter a valid email address";
   }
   else if(!$_POST['password']){

   	$error = "Password is required";


    
   }else if(strlen($_POST['password']) < 8 ){

      $error = "Password must be at least 8 characters long";

   }

 
	  if($error != ""){

	    	echo $error;
	      
	    	exit();
	    }

   
    // END OF VALIDATION

// Signup 

    if($_POST['loginActive']=='0'){
       
       $postEmail = $_POST['email'];
       $postPassword = $_POST['password'];
        
        $users = "SELECT * FROM users WHERE username = ". $postEmail ;

        $usersResult = $db->query($users);

         

        $rowCount = $usersResult->num_rows;

        if($rowCount!=0) $error = "This email address is already taken";


    }else{


       $postEmail = $_POST['email'];
       $postPassword = $_POST['password'];

        $insertUser = "INSERT into users (`username`, `password`) VALUES('".$postEmail."', '".$postPassword."' )";

        if($db->query($insertUser)===TRUE){

        	echo '1';
        }else{

        	echo '2';

        	 // display error
        
		  /*  if($error != ""){

		    	echo $error;
		      
		    	exit();
		    }*/
 
        }


       


    }// end of loginActive==0


  
   

}





?>