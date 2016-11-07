<?php include('../functions.php');?>
<?php include('header.php');?>
<div class="w3-twothird w3-margin-top">
<div>
	
  <?php  addReviews(); ?>

</div>

<h4 class="w3-center"> Vos Derniers Reviews </h4>
<div class="w3-row-padding">

   <?php displayReviews('public'); ?>
   
  <div class="w3-col s4"><img src="http://placehold.it/250x150"></div>
  <div class="w3-col s4"><img src="http://placehold.it/250x150"></div>
  <div class="w3-col s4"><img src="http://placehold.it/250x150"></div>
</div>
</div>

