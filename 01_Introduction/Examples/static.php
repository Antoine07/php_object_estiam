<?php
function increment_static()
{
    static $a = 0;
    $a++;
    echo $a;
}

increment_static();
echo PHP_EOL; // \n retour à la ligne dans la console
increment_static();
echo PHP_EOL;
increment_static();
echo PHP_EOL;


/*
suite de Fibonacci 
u v  u + v
1 1   2     3 5 8 13 21 

suite de Fibonacci se définie comme la somme des deux valeurs numériques précédentes
*/