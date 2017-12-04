<?php
    $key =  getenv('myAPIkey');
    // $url = "https://api.themoviedb.org/3/search/person?api_key=" . $key;
    echo json_encode($key);
?>