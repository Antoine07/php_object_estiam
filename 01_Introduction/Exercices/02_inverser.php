<?php

function invString( string $content){
    $str  = '';
    
    for($i=0; $i < strlen($content) ; $i = $i + 1 ){
        $str = $content[$i] . $str ;
    }

    return $str;
}

echo invString('mississippi') . "\n"; 

// "m" . ""
// "i" . "m"
// "s" . "im"
// "s" . "sim"
// "i" . "ssim"
// "s" . "issim"
// "s" . "sissim"
// "i" . "ssissim"
// "p". "ississim"
// "p" . "pississim"
// "i" . "ppississim"
// "ippississim"