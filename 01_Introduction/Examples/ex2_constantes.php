<?php 

// au début du script portée globale => traverse les scoptes 
const ANIMALS = ['dog', 'cat', 'bird'];

// n'importe où dans le script
function foo(){
    define('ANIMALS_BIS', ['dog', 'cat', 'bird']);
    print_r(ANIMALS);
}

foo();