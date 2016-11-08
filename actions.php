<?php 


include'functions.php';


   $error="";
// sanitizing email and password input
  if(isset($_POST['email'])) { $postEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); }
  if(isset($_POST['email'])) {$postEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); } 
  if (isset($_POST['email'])) {
  	                             $postEmail = trim($_POST['email']);
                                 $postEmail = htmlspecialchars($_POST['email']);
                              } ;

   

   if(isset($_POST['password'])){
   	                             $postPassword = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
                                 $postPassword = trim($_POST['password']);
                                  $postPassword = htmlspecialchars($_POST['password']);
                                  $postPassword = $db->real_escape_string($postPassword);
                                   $postPassword = md5(md5($postPassword));
                                 } 
 

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
       
          
         $insertUser = "SELECT * FROM users WHERE email = '$postEmail'" ;

        

         $result = $db->query($insertUser) or trigger_error($db->error." [$users]");



         $rowCount = $result->num_rows;

        
        if($rowCount>0) $error = "This email address is already taken";

       	else{

             $insertUser = "INSERT INTO users (`email`, `password`) VALUES('".$postEmail."', '".$postPassword."' )";
           

			        if($db->query($insertUser)){
                        
						  $insertUser = "UPDATE users SET `password` = '".$postPassword."' WHERE `id` = " .$db->insert_id;
			               $db->query($insertUser);
                   
			        	echo 'Signed UP';

			        }else{

			        	echo 'There is an error';

			        }


       	    }

       	}else{
          // signing in

    	   $insertUser = "SELECT `id`, `email`, `password` FROM users WHERE `email` = '".$postEmail."' LIMIT 1" ;

    	   $result = $db->query($insertUser);
    	
    	   $row = $result->fetch_array()  ;

    	  // var_dump($row);


    	       
	    	   if($postPassword == $row['password']){

	  
	    	    echo 1;

                $_SESSION['id'] = $row['id'];
	         


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



if($_GET['action']=='addRating'){

      $businessid = $_POST['businessid'];


      $ratingScore = $_POST['rating_score'];    

	   $ratingDesc = $_POST['rating_desc'];


  if (!empty($ratingScore)){
  
	   $ratingNum = 1;

	  

   $prevRatingQuery = "SELECT * FROM rating WHERE businessid = '".$businessid."', LIMIT 1";

   $prevRatingResult = $db->query($prevRatingQuery);

   if($prevRatingResult->num_rows > 0){
	
      $prevRatingRow = $db->fetch_assoc();

      $ratingNum = $prevRatingRow['rating_score'] + $ratingNum;

      $ratingScore = $prevRatingRow['total_points'] + $ratingScore;

      // updating rating value in the db

      $query  = "UPDATE rating SET `rating_score` = '".$ratingNum."', `total_points` = '".$ratingScore."' WHERE `businessid` = '$businessid' ";  

      $update = $db->query($query);



   }else{ // insering new rating if it does not exist

	   	$newRatingQuery = "INSERT INTO rating (`rating_score`, `total_points`, `rating_desc`, `userid`, `businessid` ) VALUES('".$ratingScore."', '".$rating_desc."', '".$businessid."')";

			   $insert = $db->query($newRatingQuery);
			 echo 1;

		}

  

} 


} // end of rating 




if ($_GET['action']=='addPost'){

  echo '5';

}// end of addPost




?>