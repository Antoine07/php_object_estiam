<?php 

function split_array(array $numbers, int $pos): array
{
    $len = count($numbers);
    if( $pos > $len && $pos <= 0 ){

        return $numbers;
    }

    $start = [];
    while($pos >= 0){
        $pos--;
        $start[] = array_shift($numbers); // push les éléments en créant les indices
    }
   
    return [$start, $numbers];
}

print_r(split_array(numbers: [4,6,9, 17], pos: 2  ));

/*
    start = [], pos = 2
    tant que pos > 0
        pos = 1
        start = [4]

    tant que pos >= 0
        pos = 0
        start = [4, 6]

    tant que pos >= 0
        pos = -1
        start = [4, 6, 9]

    return [ [4, 6, 9] , [17] ]
*/