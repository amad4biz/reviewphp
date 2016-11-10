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


 
 if(isset($_POST['fname'])){ $firstname = filter_var( $_POST['fname'], FILTER_SANITIZE_STRING); }

 if(isset($_POST['lname'])){ $lastname = filter_var( $_POST['lname'], FILTER_SANITIZE_STRING); }


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

        

         $result = $db->query($insertUser) or trigger_error($db->error." [$insertUser]");



         $rowCount = $result->num_rows;

        
        if($rowCount>0) $error = "This email address is already taken";

       	else{

             $insertUser = "INSERT INTO user (`email`, `firstname`, `lastname`,`password`) VALUES('".$postEmail."', '".$firstname."' , '".$lastname."' , '".$postPassword."' )";
           

			        if($db->query($insertUser)){
                        
						  $insertUser = "UPDATE user SET `password` = '".$postPassword."' WHERE `id` = " .$db->insert_id;
			               $db->query($insertUser);
                   
			        	echo 'Signed UP';

			        }else{

			        	echo 'There is an error';

			        }


       	    }

       	}else{
          // signing in

    	   $insertUser = "SELECT `userid`, `email`,  firstname, `password` FROM user WHERE `email` = '".$postEmail."' LIMIT 1" ;

    	   $result = $db->query($insertUser) or trigger_error($db->error." [$insertUser]");;
    	
    	   $row = $result->fetch_array()  ;

    	 //var_dump($row['userid']);

            if(!isset($row['firstname'])){ $firstname = $row['firstname'] ;};
         
            //var_dump($row['firstname']); 

         
    	       
	    	   if($postPassword == $row['password']){

	  
	    	    echo 1;

                $_SESSION['id'] = $row['userid'];
	         


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


   if(isset($_POST['bname'])) {  $postBname = filter_var( $_POST['bname'], FILTER_SANITIZE_STRING); }
   if(isset($_POST['baddress'])) { $postBaddress = htmlspecialchars($_POST['baddress']); }
    if(isset($_POST['burl'])) { $postBurl = htmlspecialchars($_POST['burl']); }
   if(isset($_POST['phone'])) { $postPhone = htmlspecialchars($_POST['phone']); }
   if(isset($_POST['category'])) { $postCategory = htmlspecialchars($_POST['category']); }

  
  
if ($_GET['action']=='addPost'){

  


	$insertBus = "INSERT INTO business (`bname`, `baddress`, `burl`, `phone`, `category`) VALUES('".$postBname. "' , '".$postBaddress."' , '".$postBurl."' , '".$postPhone."' , '".$postCategory."' )";

	var_dump($insertBus);



	$result = $db->query($insertBus);

	if($result){

         echo '5';

	     }



 

}// end of addPost




?>