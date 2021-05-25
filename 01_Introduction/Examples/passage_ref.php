<?php
function increment(&$var) {
    $var++;
  }
  
  $a=5; // contexte parent
  increment ($a); // affichera 6