<?php

function numberLetter( string $letter, string $content){
    $count  = 0;
    // $i = $i + 1  de manière équivalente $i++
    for($i=0; $i < strlen($content) ; $i = $i + 1 ){
        // echo $content[$i] . "\n"; // . concaténation en PHP
        if($letter == $content[$i]) {
            $count++;
        }
    }
    // pensez à retourner une valeur
    return $count;
}

echo numberLetter('i','mississippi') . "\n"; // 4