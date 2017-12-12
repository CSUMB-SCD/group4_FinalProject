
function displayError(elementId, errorMessage){
    $(elementId+"Error").css("color","red").append(errorMessage);   //NOTE: +"Error" modifies the element ID!
    $(elementId).css("backgroundColor","#FFDEDE").focus(); 
}

function checkUserName(){
    var validUser = true;
    $("#usernameError").html("");
    $.ajax({
        type: "GET",
        url:"../php/checkUserName.php",
        dataType: "json",
        data: { "username":$("#username").val()  },
        success: function( data, status ) {
            if( !data ) {//if (data == false)
                $("#username").css("backgroundColor","");
                $("#usernameError").css("color", "blue").append("<br>  Username available!");
            }else{
                displayError("#username","  Username unavailable!");
                validUser = false;
            }
        },
        complete: function(data,status) { //optional, used for debugging purposes
        }
    });//AJAX
    return validUser;
}

function checkEmail(){
    var validEmail =true;
    var email = $("#email").val();
    $("#emailError").html("");
    if( !/[a-z]+@[a-z]+\.[a-z]{2,4}$/i.test(email) ){
        displayError("#email", "<br>  Correct email format: xxxx @ xxxx . xxx");
        validEmail = false;
    }else{
        $("#email").css("backgroundColor", "");
    }
    return validEmail;
}

function checkRetype(){
    var validRetype = true;
    var password = $("#pw").val();
    var pwAgain = $("#pwAgain").val();
    
    $("#pwAgainError").html("");
    if( password !== pwAgain ){
        displayError("#pwAgain", "<br>  Passwords must match!");
        validRetype = false;
    }else{
        $("#pwAgain").css("backgroundColor","");
        //$("#pwAgainError").css("color", "blue").append("  Passwords match!");
    }
//alert("retype "+ validRetype);
    return validRetype;
}

function checkPassword(){
    var validPassword = true;
    var password = $("#pw").val();
    
    $("#pwError").html("");
    $("#pw").css("backgroundColor","");
    if( password.length < 6 ){
        displayError("#pw", "<br>  Password must be longer than 5 characters!");
        validPassword = false;
    }
    if( !/[0-9]/.test(password) ){
        displayError("#pw", "<br>  Password must include at least one digit!");
        validPassword = false;
    }
    if( !/[A-Z]/.test(password) ){
        displayError("#pw", "<br>  Password must include at least one uppercase!");
        validPassword = false;
    }
    return validPassword;
}

function validateForm(){
    var isValid = false;
   if( checkPassword() && checkEmail() && checkRetype() ){
            isValid = true;
       }
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
    
});