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
   
 global $db, $firstname;

$busid = (isset($_POST['busid']) ) ? $_POST['busid'][0] : '';

var_dump($busid);
  
    $reviews = "SELECT rating_desc, busid, rating_score, total_points, FORMAT((total_points / rating_score),1) as average_rating FROM 
               rating WHERE  busid = '".$busid."' ";

    $result = $db->query($reviews)  or trigger_error($db->error." [$result]");;

     $rowCount = $result->num_rows;

    if($rowCount>0){
       
       while($row= $result->fetch_assoc()){

    	echo '<p> Total: <span class="w3-badge w3-blue">'.$row['total_points']. '</span> Average:<span class="w3-badge w3-blue">'.$row['average_rating']. '</span></p>';
    
       	echo '<p>' .$row['rating_desc']. '</p>' ;

       	echo '<p> Reviewed by :' .$firstname. '</p>';
       
       	echo '<hr/>';
       }
    	
    }



}



function addBusiness (){

	if(isset($_SESSION['id']) && ($_SESSION['id']> 0) ){
	
     echo '<div class="">
			 <div class="w3-container">
			        
			        <div class="loginSignupError w3-panel w3-red" id="loginSignupError"></div>

				         <input type="hidden" name="bname" id="bname" value="1">

				        <label class="w3-label">Business Name</label>
				        <input class="w3-input w3-border" type="" name="bname" id="bname">

				        <label class="w3-label">Business Address</label>
				        <textarea class="w3-input w3-border" type="text" name="baddress" id="baddress" ></textarea> 

				         <label class="w3-label">Website</label>
				        <textarea class="w3-input w3-border" type="text" name="burl" id="bwebsite"></textarea>

				         <label class="w3-label">phone</label>
				        <input class="w3-input w3-border" type="text" name="bphone" id="bphone">

			        
			         <button class="w3-btn w3-blue w3-margin-top" type="button"  id="addBus"> Add Business </button>
			  </div>
		  </div>';

	}

} // end of addReviews

function addReviews(){

           echo '<span>
                   
                  <div class="ui star rating" name="rating" id="rating" value="0"  data-rating="3"></div>
                 
				  <div id="rateYo"> </div></span>';
	


	}

 



?>