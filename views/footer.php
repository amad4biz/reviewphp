
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
        
         <div class="loginSignupError w3-panel w3-red" id="loginSignupError"></div>

         <input type="hidden" name="loginActive" id="loginActive" value="1">

        <label class="w3-label">Email</label>
        <input class="w3-input w3-border" type="text" name="email" id="email">

        <label class="w3-label">Password</label>
        <input class="w3-input w3-border" type="password" name="password" id="password">

         <label class="w3-label hide-name">First Name</label>
        <input class="w3-input w3-border hide-name" type="text" name="fname" id="fname">

         <label class="w3-label hide-name">Last Name</label>
        <input class="w3-input w3-border hide-name" type="password" name="lname" id="lname">

         <a id="toggleLogin" href="#">Signup</a>
         
         <button class="w3-btn w3-blue w3-margin-top" type="button"  id="loginSignupBtn"> Login </button>
        </form>


    </div>
  </div>
</div> <!-- modal end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="views/js/script.js"></script>

</body>
</html>
