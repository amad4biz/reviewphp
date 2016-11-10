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
       data: "email=" + $("#email").val()  + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val() + "&fname=" + $("#fname").val() + "&lname=" + $("#lname").val(), 
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
          data: "bname =" + $('#bname').val() + "&baddress=" + $('#baddress').val() + "&burl =" + $('#burl').val() + "&bphone =" + $('#bphone').val(), 
          success : function(result){

            if(result){

              alert(result);

            }else{

              alert("there is an error");
            }
          }

    })
     

});



$('.rateYO').click(function(){
     
    $.ajax({

          type: "POST",
          url:"./actions.php?action=addRating",
          data: "rating=" + $(this).val(),
          success: function(result){
             alert("Hello");
          
        }  
        
    });  
    

})  // end of rating function*/


});  


$(document).ready(function(){
    $("#rateYo").rateYo({

      rating: <?php echo $fetchRatingIdAndValue['ratingpoints'];?>
    }).on('rateyo.set',function(e, data){

        $.ajax({
            type : "post",
            url : "PostRatingValue.php",
            data : {
                "rating" : data.rating,
                "peopleid" : celeb_id,
                "userid" : user_id
            },
            dataType : "json",
            success : function(response){
                if(response.toString() == "true"){

                    $.growl.notice({ title: "Growl", message: "Rating<b> "+ data.rating +" </b>assigned successfully" });
                }
                else{
                    $.growl.error({ message: "<b>Unable to assign rating.</b>" });
                }
            },
            error : function(response){
                $.growl.error({ message: "<b>Something went terribly wrong! :'(.</b>" });
            }
        });
    });
});
