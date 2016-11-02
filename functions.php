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




/*function displayReviews(){

  global $db;

   echo "hello";

    $reviews = "SELECT rating_number, FORMAT((total_points / rating_score),1) as average_rating FROM rating WHERE businessid = 1 AND status = 1";

    $result = $db->query($reviews);

    if($result->num_rows>0){
       
       while($row= $result->fetch_assoc()){

       	echo $row['rating_score'];
       	echo $row['userid'];
       	echo $row['total_points'];
       }
    	
    }


}



function addReviews (){

   


}*/

?>