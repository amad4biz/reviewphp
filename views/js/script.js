$(document).ready(function(){
    
    $('#toggleLogin').click(function(){
        
        if($('#loginActive').val()=="1"){
          
          $('#loginActive').val("0");

           $('.hide-name').show();

           $('#modalTitle').html('Signup');

          $('#loginSignupBtn').html('Signup');

          $('#toggleLogin').html('Login');
          

        }else{

           $('#loginActive').val("1");

            $('.hide-name').hide();

           $('#modalTitle').html('Login');

          $('#loginSignupBtn').html('Login');

          $('#toggleLogin').html('Signup');

         
         

        }
     
    });



$('#loginSignupBtn').click(function(){
   

   $.ajax({

       type:"POST",
        url: "./actions.php?action=loginSignup",
       data: "email=" + $("#email").val()  + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(), 
       success : function(result){

             if(result=="1"){
              
                  window.location.assign('http://localhost:81/review/');



             }else{
                 
                  $('#loginSignupError').html(result).show();

             }




           }
      })

  });



 $('#addBus').click(function(){
   
    $.ajax({

          type: "POST",
          url:"./actions.php?action=addPost",
          data: "bname =" + $('#bname').val() + "&baddress=" + $('#baddress').val() + "&bwebsite=" + $('#bwebsite') + "&bphone=" + $('#bphone'), 
          success : function(result){

            if(result){

              alert(result);

            }else{

              alert("there is an error");
            }
          }

    })
     

});



$('#addreview').click(function(){
     
    $.ajax({

          type: "POST",
          url:"./actions.php?action=addRating",
          data: "rating=" + $(this).val() ,
          success: function(result){
            if(result){
               alert(result);
            }
          
        }  
        
    });  
      $(this).attr("checked");

})  // end of rating function*/







});  


