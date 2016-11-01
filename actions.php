<?php 


include'functions.php';


   $error="";
// sanitizing email and password input
    $postEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $postEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $postPassword = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);



// validation of user id and password

if($_GET['action']=="loginSignup"){

    // validation for missing and email is valid
   if(!$_POST['email']){

   	$error = "email is required";

   }else if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)===false){

       $error = "Please enter a valid email address";
   }
   else if(! $postPassword ){            // checking if password was entered

   	$error = "Password is required";


    
   }else if(strlen($postPassword ) < 8 ){          // checking if password is at least 8 char

      $error = "Password must be at least 8 characters long";

   }

 
	  if($error != ""){

	    	echo $error;
	      
	    	exit();
	    }

   
    // END OF VALIDATION

// Signup 

    if($_POST['loginActive']=='0'){
       
          
         $users = "SELECT * FROM users WHERE email = '$postEmail'" ;

        

         $result = $db->query($users) or trigger_error($db->error." [$users]");



         $rowCount = $result->num_rows;

        
        if($rowCount>0) $error = "This email address is already taken";

       	else{

             $insertUser = "INSERT INTO users (`email`, `password`) VALUES('".$postEmail."', '".$postPassword."' )";

			        if($db->query($insertUser)===TRUE){

			        	echo 'Signed UP';
			        }else{

			        	echo 'There is an error';

			        }


       	    }


       


    }else{
          // signing in

    	   $users = "SELECT * FROM users WHERE email = '$postEmail'" ;

    	   $result = $db->query($users);
    	
    	   $row = $result->fetch_assoc();   

    	     var_dump($row);

    	     if($row['password']==$row['id'].$postPassword){

    	     	echo 1;
    	     }else{

    	     	$error ="password/username is incorrect";
    	     }    


    }// end of loginActive==0


           // display error
			        
			 if($error != ""){

					    	echo $error;
					      
					    	exit();
					    }


}   // end of signup and login block





?>