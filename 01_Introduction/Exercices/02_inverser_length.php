<?php

function invString( int $len, string $content){
    $str  = '';
    
    for($i=0; $i < $len ; $i = $i + 1 ){
        $str = $content[$i] . $str ;
    }

    for($i = $len; $i < strlen($content); $i++){
        $str = $str . $content[$i]  ;
    }

    return $str;
}

echo invString(4, 'mississippi') . "\n"; 

// "m" . "" 
// "i" . "m"
// "s" . "im"
// "s" . "sim" => "ssim"
