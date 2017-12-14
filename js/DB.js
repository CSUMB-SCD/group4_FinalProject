var ratingSum = document.getElementById('rating').innerHTML;
alert(ratingSum);

$.ajax({
    type: "GET",
    url:"../php/newPredictions.php",
    data: { "rating":ratingSum},
    success: function( data, status ) {
    }
});//AJAX