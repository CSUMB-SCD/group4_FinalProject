<?php

// this make the string of * depending on the size of the word found
function censorship($swearWord){
    $censor = "";
    for($i = 0; $i < strlen($swearWord); $i++){
        $censor = $censor."*";
    }
    return $censor;
}

function findSwearwords($message){
    // echo $message."<br>";
    $lines = explode("\n", file_get_contents('../extra/word.txt'));
    foreach($lines as $find){
        $censor = censorship($find);

        $index = 0;
        $size = strlen($find);
        $positions = array();
        for($i = 0; $i<strlen($message); $i++){
            $pos = strpos($message, $find, $index);
            if($pos == $index){
                $positions[] = $pos;
            }
            if($pos != 0){
                $word = substr($message, $pos, $size);
                $newWord = str_replace($word, $censor, $message);
                $message = $newWord;
            }
                $index++;
        }
    }
    // echo $message;
    return $message;
}
?>

