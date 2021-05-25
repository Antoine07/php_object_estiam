<?php

$a = 1; /* portée globale */

// portée spécifique un scope qui détermine une enceinte fermée 
// les variables définies à l'intérieur ne sont pas accessibles à l'extérieur dans les deux sens
function foo()
{ 
    echo $a; /* portée locale */
}

foo();