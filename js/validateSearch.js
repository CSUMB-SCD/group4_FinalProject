function checkmovieTitle() {
    var valid = true;
    $("#errormovieTitle").html("");

    if ($("#movieTitle").val().trim().length == 0) {
        $("#errormovieTitle").css("color", "red").html("Plese fill out movie title<br>");
        valid = false;
    }

    return valid;
}
module.exports.checkmovieTitle = checkmovieTitle;

function checkmovieDate() {
    var valid = true;
    $("#errormovieDate").html("");

    if (!Date.parse($("#movieDate").val())) {
        $("#errormovieDate").css("color", "red").html("Plese fill out movie date<br>");
        valid = false;
    }

    return valid;
}
//module.exports.checkmovieDate = checkmovieDate;

function checkproducersName() {
    var valid = true;
    $("#errorproducersName").html("");

    if ($("#producersName").val().trim().length == 0) {
        $("#errorproducersName").css("color", "red").html("Plese fill out producers name<br>");
        valid = false;
    }

    return valid;
}
//module.exports.checkproducersName = checkproducersName;

function checkactorActress() {
    var valid = true;
    $("#erroractorActress").html("");

    if ($("#actorActress").val().trim().length == 0) {
        $("#erroractorActress").css("color", "red").html("Plese fill out actor/actress<br>");
        valid = false;
    }

    return valid;
}
//module.exports.checkactorActress = checkactorActress;

function validateForm() {
    var isValid = 0;
    if (checkproducersName()) {
        isValid += 1;
    }
    if (checkmovieDate()) {
        isValid += 1;
    }
    if (checkmovieTitle()) {
        isValid += 1;
    }
    if (checkactorActress()) {
        isValid += 1;
    }
    
    if(isValid < 4){
        return false;
    }
    return true;
}

$("#submitform").submit(function(ev) {
    ev.preventDefault(); // to stop the form from submitting
    var check = validateForm();
    if (check == true) {
    }
    this.submit();

});


$(document).ready(function() {
    $("#movieTitle").change(function() {
        checkmovieTitle();
    });

    $("#movieDate").change(function() {
        checkmovieDate();
    });

    $("#producersName").change(function() {
        checkproducersName();
    });

    $("#actorActress").change(function() {
        checkactorActress();
    });

});