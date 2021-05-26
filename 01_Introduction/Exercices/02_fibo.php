<?php

function fibo()
{
    static $a = 0, $b = 1; // pour définir les variables statiques on les sépare avec une virgule.
    
    list($a, $b) = [$b, $a];
    $b = $a + $b; // a : 1, a : 1,  b : 2

    return $b;
}

$rang = 0;
while ($rang < 16) {
    echo "rang: $rang", " ", fibo();
    $rang++;
    echo "\n";
}

/*
rang 1  
    $a = 1 $b = 0
    $b = 1
    return 1

rang 2
    $a = 1 $b = 1
    $b = 2
    return 2
rang 3
    $a = 2 $b = 1
    $b = 3

    return 3

rang 4
    $a = 3 $b = 2
    $b = 5
    return 5

*/
