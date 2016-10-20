
<ul class="w3-navbar w3-blue w3-padding">
  <li><a href="#">Accueil</a></li>
  <li><a href="?page=review">Ecris Review</a></li>
  <li><a href="?page=message">Message</a></li>
  <li><a href="?page=about">About</a></li>
 
  <li class="w3-navitem">
    <input type="text" class="w3-input w3-border-0 w3-padding-0" placeholder="Cherche..">
  </li>

   <li class="w3-navitem">
    <input type="text" class="w3-input w3-border-0 w3-padding-0" placeholder="Ville">
  </li>

  <button class="w3-btn w3-white w3-right" onclick="document.getElementById('id01').style.display='block'"
class="w3-btn">Login/Signup</button>

<input type="hidden" id="loginActive" value="1" name="loginActive">

</ul>

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
    
    <div class="w3-padding reviews"><?php displayReviews() ?> </div>
   
  </div>
</div>



<div class="w3-third">
 <div class="w3-card-4" style="width:90%">
    <header class="w3-container w3-light-grey">
      <h3>John Doe</h3>
    </header>
    <div class="w3-container">
     
      <hr>
      <img src="" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
    </div>
    <button class="w3-btn-block w3-blue">+ Connect</button>
  </div>
</div>
</div>
</div>

<!-- modal start -->
<div id="id01" class="w3-modal ">
  <div class="w3-modal-content">
    <div class="w3-container w3-padding ">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-closebtn">&times;</span>
     

        <div class="w3-container w3-blue">
          <h2 id="modalTitle">Login</h2>
        </div>

        <form class="w3-container">

        <label class="w3-label">First Name</label>
        <input class="w3-input w3-border" type="text">

        <label class="w3-label">Last Name</label>
        <input class="w3-input w3-border" type="text">

        <label class="w3-label">Email</label>
        <input class="w3-input w3-border" type="text" name="email">

        <label class="w3-label">Password</label>
        <input class="w3-input w3-border" type="text" name="password">

         <a id="toggleLogin" href="#">Signup</a>
         <button class="w3-btn w3-blue w3-margin-top" type="button" id="loginSignupBtn"> Login </button>
        </form>


    </div>
  </div>
</div> <!-- modal end -->
