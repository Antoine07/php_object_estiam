<?php

function search_word(string $word, string $content)
{

    for ($i = 0; $i < strlen($content); $i++) {
        
        for($j = 0; $j < strlen($word) && $i < (strlen($content) - strlen($word) ); $j++){
            if($word[$j] != $content[$i + $j]) break;
        }

        if($j === strlen($word)) return $i;
    }

    return false;
}


echo search_word('bonjour', 'voila je vous dis bonjour ou aurevoir');