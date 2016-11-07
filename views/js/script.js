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



 $('#addPost').click(function(ev){
            ev.preventDefault();
   
    $.ajax({

          type: "POST",
          url:"./actions.php?action=addPost",
          data: "bname =" + $('#bname').val() + "&baddress=" + $('#baddress').val() + "&bwebsite=" + $('#bwebsite') + "&bphone=" + $('#bphone'), 
          success : function(result){

            if(result){

              alert("created");
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
          data: "rating=" + $('#rating').val() ,
          success: function(result){

            alert("hello");



          }  
        

    });  
     



})  // end of rating function*/

   

})