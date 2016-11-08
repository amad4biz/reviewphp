
<style> .loginSignupError.w3-panel.w3-red{ display: none;}</style>

<div class="w3-container w3-padding">
<div class="w3-twothird w3-padding">
  
   <div class="w3-card-4" style="width:100%">
    <header class="w3-container w3-light-grey">
      <h3>Kholima</h3>
    </header>
    <div class="w3-container">
     
      <hr>
     <!--<img src="" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
      <p>Kholima est le site de destination pour trouver les meilleurs business de l'afrique avec review.</p><br>
    </div>

     <h2 class="w3-center">Les Derniers Revues</h2>
    
   <!-- <div class="w3-padding reviews"><?php //displayReviews('public') ?> </div>-->
   
  </div>

  <div class="w3-row-padding">

  <?php displayReviews('public'); ?>


        <div class="w3-col md4 s4"><img src=" http://placehold.it/250x150">
          <h5>Business Name</h5>
          <p>Rate: <span class="w3-badge w3-blue">6</span></p>
        </div>
        <div class="w3-col md4 s4"><img src=" http://placehold.it/250x150">
        <h5>Business Name</h5>
         <p>Rate: <span class="w3-badge w3-blue">3.5</span></p>
         </div>
       
        <div class="w3-col s4"><img src=" http://placehold.it/250x150">
         <h5>Business Name</h5>
         <p>Rate:<span class="w3-badge w3-blue" id="addreview">4</span> <span><?php addReviews()?></span></p></div>
         
       
  </div>


</div>



<div class="w3-third w3-padding">
 <div class="w3-card-4" style="width:90%">
    <header class="w3-container w3-light-grey">
      <h3>Thierno D</h3>
    </header>
    <div class="w3-container">
     
      <hr>
      <img src="http://placehold.it/50x50"" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <p>CEO A Eqsotech Group et Developeur a NYS.</p><br>
    </div>
    
 </div>

  <div class="w3-card-4 w3-margin-top" style="width:90%"> <?php  addBusiness(); ?></div>
</div>
</div>
</div>



