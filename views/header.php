

<!DOCTYPE html>
<html>
<head><title>W3.CSS Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/components/rating.min.css">
<link rel="stylesheet" href="css/styles.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/components/rating.min.js"></script>
</head>
<body >
<nav class="w3-navbar w3-blue w3-padding">
<ul class="w3-navbar w3-blue w3-padding">
  <li><a href="#">Accueil</a></li>
  
	  <?php if(isset($_SESSION['id'])) { ?>
	  
	     <li><a href="?page=review">Ecris Review</a></li> 

	  <?php } ?>

  <li><a href="?page=event">Evenement</a></li>
  <li><a href="?page=about">About</a></li>
 
  <li class="w3-navitem">
    <input type="text" class="w3-input w3-border-0 w3-padding-0" placeholder="Cherche..">
  </li>

   <li class="w3-navitem">
    <input type="text" class="w3-input w3-border-0 w3-padding-0" placeholder="Ville">
  </li>

		<?php if(isset($_SESSION['id'])) { ?>
		    
		     <?php print_r($_SESSION); ?>

		     <a class="w3-btn w3-white w3-right"  href="?function=logout" > Logoff</a>

		<?php } else { ?>

		<button class="w3-btn w3-white w3-right" onclick="document.getElementById('id01').style.display='block'"
		> Login/Signup</button>

		<input type="hidden" id="loginActive" value="1" name="loginActive">
		<?php } ?>
</ul>
</nav>

