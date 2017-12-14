$.ajax({
    type: "GET",
    url:"../php/newPredictions.php",
    data: { "rating":ratingSum},
    success: function( data, status ) {
    }
});//AJAX

var ratingSum = document.getElementById('overall').innerHTML;
//alert(ratingSum);