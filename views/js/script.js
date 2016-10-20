$(document).ready(function(){
    
    $('#toggleLogin').click(function(){
        
        if($('#loginActive').val()=="1"){
          
          $('#loginActive').val("0");

           $('#modalTitle').html('Signup');

          $('#loginSignupBtn').html('Signup');

          $('#toggleLogin').html('Login')

        }else{

           $('#loginActive').val("1");

           $('#modalTitle').html('Login');

          $('#loginSignupBtn').html('Login');

          $('#toggleLogin').html('Signup')

        }
     
    });



$().click(function(){


   $.ajax({

       type:"POST",
       url : "actions.php=action?loginSignup",
       data: "email=" + $("#username").val()  + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(), 
       success : function(result){

             alert('Hi')

       }


   })


});







})