// JavaScript File -- careful !!!!  examine url for '?''


function displayError(elementId, errorMessage){
    $(elementId+"Error").css("color","red").append(errorMessage);   //NOTE: +"Error" modifies the element ID!
    $(elementId).css("backgroundColor","#FFDEDE").focus(); 
}

 function lettersOnly(cs){
    var valid =true;
    var str = $(cs).val();
  
    $(cs+"Error").html("");
    if( /[0-9]+/g.test(str) ){
        displayError(cs, "Letters Only.");
        valid = false;
    }else
        $(cs).css("backgroundColor", "");
    return valid;
} 

function notBlank(field){
    var valid =true;
    var str = $(field).val();
    
     $(field+"Error").html("");
    if( str === "" ){
        displayError(field, "Must enter a name.");
        valid = false;
    }else
        $(field).css("backgroundColor", "");
    return valid;
}

function validateUpdate(){
    var isValid = false;
        if(  lettersOnly("#city") &&  lettersOnly("#state") &&  notBlank("#conName") ){
        isValid = true;
        
        //javascript - Bootstrap modal show event - Stack Overflow
        //http://jsfiddle.net/BeL2V/1233/
        // set focus when modal is opened
        $('#modal-content').on('shown.bs.modal', function () {
        $("#txtname").focus();
       });

        // show the modal onload
        $('#modal-content').modal({
       show: true
        });

    }
    return isValid;
}


function validateInsert(){
    var isValid =true;
      //alert(isValid);
    $(":input[type=text]").each(function() {
       if($(this).val() == ""){
        //alert(this.val());
        //alert($(this).attr('id'))
        var formID = $(this).attr('id');
        $( "#"+formID+"Error" ).html("");
        displayError("#"+formID ,"This is a required field.");
        isValid= false;
       
       }
    });
    
    //alert(isValid);
    return isValid;
}

  $(document).ready(function(){
    $("#city").change( function(){
        lettersOnly("#city");
    });
    
    $("#state").change( function(){
        lettersOnly("#state");
    });
    
});//documentReady

function resetFields(){
     $(":input").each(function() {
       
        var formID = $(this).attr('id');
        $( "#"+formID+"Error" ).html("");
         $( "#"+formID ).css("backgroundColor","");
        isValid= false;
    });
    $("#addDisplay").html("");
    return isValid
}