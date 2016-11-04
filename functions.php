<?php 

// starting session for all pages

session_start();

// include('config.php');

//Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'review';

//Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_errno):
    die('Connect error:'.$db->connect_error);
endif;




if(isset($_GET['function']) && ($_GET['function']=='logout')){
    
   

	session_unset();


	}


function displayReviews($type){


 global $db;

  
    $reviews = "SELECT rating_desc, rating_score, FORMAT((total_points / rating_score),1) as average_rating FROM rating WHERE businessid = 2 AND userid = 51";

    $result = $db->query($reviews);


    if($result->num_rows>0){
       
       while($row= $result->fetch_assoc()){

    //	echo $row['rating_score'];
       	echo $row['average_rating'];
       	echo $row['rating_desc'];
       }
    	
    }


}



function addReviews (){

	if(isset($_SESSION['id']) && ($_SESSION['id']> 0) ){
	
     echo '<div class="">
			 <form class="w3-container">
			        
			         <div class="loginSignupError w3-panel w3-red" id="loginSignupError"></div>

			         <input type="hidden" name="bname" id="bname" value="1">

			        <label class="w3-label">Business Name</label>
			        <input class="w3-input w3-border" type="text" name="bname" id="bname">

			        <label class="w3-label">Business Address</label>
			        <textarea class="w3-input w3-border" type="" name="badress" id="badress" ></textarea> 
			         <label class="w3-label">Website</label>
			        <input class="w3-input w3-border" type="text" name="bname" id="bname">
			         <label class="w3-label">phone</label>
			        <input class="w3-input w3-border" type="text" name="bname" id="bname">

			        
			         <button class="w3-btn w3-blue w3-margin-top" type="button"  id="addPost"> Add Business </button>
			  </form>"
		  </div>';

	}

   


}

?>