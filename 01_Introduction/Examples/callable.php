<?php


function sayHello(callable $formate, string $message)
{

    return $formate($message); // quelque chose qui peut être appelée === fonction
}

function strangeStr (string $content) {
    $str = '';
    for ($i = 0; $i < strlen($content); $i++) {
        if (trim($content[$i]) == ' ') {
            continue;
        }
        $str .= $content[$i] . ' ';
    }

    return $str;
};

echo sayHello( 'strangeStr' , 'Bonjour tout le monde');
echo PHP_EOL;
