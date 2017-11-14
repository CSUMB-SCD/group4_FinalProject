function checkUsername(){
    var validUser = true
     $("#usernameError").html("");
    //alert($("#username").val());
    $.ajax({
        type: "get",
        url: "../php/checkUsername.php",
        dataType: "json",
        data: { "username":$("#username").val()  },
        success: function( data, status ) {
            if( !data ) {//if (data == false)
                //alert("username available!");
                $("#username").css("backgroundColor","");
                $("#usernameError").css("color", "blue").append("Username available!");
            }else{
                //alert("username taken!");
                displayError("#username","Username unavailable!");
                validUser = false;
            }
          },
          complete: function(data,status) { //optional, used for debugging purposes
              //alert(status);
          }
   });//AJAX
   return validUser
}

function checkEmail(){
    var validEmail =true;
    var email = $("#email").val();
    
    $("#emailError").html("");
    if( !/[a-z]+@[a-z]+\.[a-z]{2,4}$/i.test(email) ){
        displayError("#email", "Correct email format: xxxxxx @ xxxxxxx . xxx");
        validEmail = false;
    }else{
        $("#email").css("backgroundColor", "");
    }
    return validEmail;
}

function checkRetype(){
    var validRetype =true;
    var password = $("#password").val();
    var pwAgain = $("#pwAgain").val();
    
    $("#pwAgainError").html("");
    if( password !== pwAgain ){
        displayError("#pwAgain", "Password must match!");
        validRetype = false;
    }else{
        $("#pwAgain").css("backgroundColor","");
        //$("#pwAgainError").css("color", "blue").append("Passwords match!");
    }
    return validRetype;
}

function checkPassword(){
    var validPassword =true;
    var password = $("#password").val();
    
    $("#passwordError").html("");
    $("#password").css("backgroundColor","");
    if( password.length < 6 ){
        displayError("#password", "Password must be longer than 5 characters!");
        validPassword = false;
    }
    if( !/[0-9]/.test(password) ){
        displayError("#password", "<br>Password must include at least one digit!");
        validPassword = false;
    }
    if( !/[A-Z]/.test(password) ){
        displayError("#password", "<br>Password must include at least one uppercase!");
        validPassword = false;
    }
    return validPassword;
}

function validateForm(){
    var isValid = false;
    if( checkPassword() && checkEmail() && checkRetype() && checkUsername() )
        isValid = true;
        
    //http://stackoverflow.com/questions/2469999/how-to-check-if-form-elements-are-not-empty
    //http://stackoverflow.com/questions/15002031/get-id-value-of-all-input-elements
    $(":input").each(function() {
       if($(this).val() === ""){
        //alert(this);
        //alert($(this).attr('id'))
        var formID = $(this).attr('id');
        $( "#"+formID+"Error" ).html("");
        displayError("#"+formID ,"This is a required field.");
        isValid = false;
       }
    });
}

$(document).ready(function(){
    $("#pw").change( function(){
        checkPassword();
    });
    
    $("#email").change( function(){
        checkEmail();
    });
    
    $("#pwAgain").change( function(){
        checkRetype();
    });
    
    // $("#username").change( function(){
    //     checkUsername("#username");
    // });

});//documentReady