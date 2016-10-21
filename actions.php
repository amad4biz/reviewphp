<?php 


include('functions.php');

   $error="";

    $postEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $postEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $postPassword = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);


// validation of user id and password

if($_GET['action']=="loginSignup"){

    
   if(!$_POST['email']){

   	$error = "email is required";

   }else if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)===false){

       $error = "Please enter a valid email address";
   }
   else if(! $postPassword ){

   	$error = "Password is required";


    
   }else if(strlen($postPassword ) < 8 ){

      $error = "Password must be at least 8 characters long";

   }

 
	  if($error != ""){

	    	echo $error;
	      
	    	exit();
	    }

   
    // END OF VALIDATION

// Signup 

    if($_POST['loginActive']=='0'){
       
      
        
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