# PHP

## Introduction

PHP est un langage de scripts Open Source spécialement conçu pour le développement d'application Web. Il peut être facilement intégré à une page HTML/CSS.

Aujourd'hui nous en sommes en mars 2021 à la version 8.0.3.

PHP n'est pas un langage orienté objet, mais il permet d'orienter son code en objets.

La syntaxe du PHP est inspirée du langage C, il est également peu typé et facile à prendre en main. La version 8 est une version majeure qui se caractérise par l'apport d'une fonctionnalité importante au niveau de la compilation : JIT (Just In Time).

- Inventeur : Rasmus Lerdorf en 1994.

## Paradigmes

- impératif 

- Orienté Objet

- fonctionnel

- procédural

- réflexif 

- interprété

## Syntaxe & caractéristiques

Le code PHP s'insère facilement dans une page HTML. Voici un exemple de code dans un fichier index.php. Notez que, dans le contexte suivant, le code PHP doit être inséré entre des balises ouvrante et fermante spécifiques :

```php
<!DOCTYPE html>
<html>
<head>
<title>Exemple de HTML</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php echo "<p> Hello World !</p>";?>
</body>
</html>
```

Si le PHP n'est pas écrit dans une page HTML la balise fermante n'est pas obligatoire, attention à bien coller la cote ouvrante tout en haut dans le fichier, sinon PHP interprétera les espaces dans des caractères :

```php
<?php
$message = "Hello World";
echo $message;
```

## Variable

Pour définir une variable vous utiliserez la syntaxe suivante, la portée d'une variable dépendra du contexte de sa définition. 

```php
// doit commencer par un $ suivi d'un caractère ou d'un enderscore et de chiffres
$a = 7;
```

Exemple de contexte définissant une portée spécifique :

```php
$a = 1; /* portée globale */

// portée spécifique
function foo()
{ 
    echo $a; /* portée locale */
}

foo();

```

Certaines variables ont une portée globale en PHP, c'est le cas des supers globales (tableaux). Dans ce dernier cas elles traversent tous les scopes du script. Ces variables sont des variables internes à PHP, elles sont toujours disponibles.

```php
$_POST // utiliser pour récupérer les valeurs d'un formulaire
$_GET // utiliser pour récupérer les valeurs passées dans une url
$_SESSION // persistance des données côté serveur
// ...
```

### Constante 

Vous pouvez définir une constante à l'aide de la fonction **define** où vous voulez dans le script ou avec le mot clé const au début de votre script. Avec le mot clé const elle doivent être définie au plus haut niveau du contexte, car elles sont compilées dans ce cas en premier dans le script.

```php
// au début du script
const ANIMALS = ['dog', 'cat', 'bird'];

// n'importe où dans le script
function foo(){
    define('ANIMALS_BIS', ['dog', 'cat', 'bird']);
}
```

## Exercice calcul longueur d'une chaîne de caractères

Créez une fonction permettant compter le nombre d'occurence(s) d'une lettre donnée dans une chaîne de caractères.

```php

function numberLetter( string $letter, string $content){
    // todo ...
}

echo numberLetter('i','mississippi'); // 4

```

## Exercice inverser

Créez une fonction qui inverse une chaîne de caractères.

```php

function invString(string $content){
    // todo ...
}

echo invString('mississippi'); // ippississim

```

Ajoutez un paramètre à la fonction précédente pour inverser qu'une partie de la chaîne de caractères, reprenez le code de la fonction dans un autre fichier.

```php
function invString(int $len, string $content){
    // todo ...
}

echo invString(3 , 'mississippi'); // mississiippi

```

## Passage par référence 

Vous pouvez passer une variable par référence à une fonction pour modifier sa valeur dans le contexte parent.

```php
function increment(&$var) {
  $var++;
}

$a=5; // contexte parent
increment ($a); // affichera 6
```

### Exercice fonction permutation

Créez une fonction **permute** qui permute circulairement dans le script courant les trois valeurs suivantes 

```php
$a = 1;
$b = 2;
$c = 3;

 // permute => modifier le
```

### Correction

```php

$a = 1;
$b = 2;
$c = 3;

function permute(&$a, &$b, &$c){
    // list fonction php qui assigne terme à terme des valeurs dans un tableau
    // list($x, $y, $z) = [11,12,13]; 

    list($a, $b, $c) = [$c, $a, $b];
}

permute($a, $b, $c);

echo "a : $a, b: $b, c : $c \n" ; 
```

### Portée statique

Une variable statique a une portée locale uniquement, cependant elle ne perd pas sa valeur lorsque le script appelle la fonction :

```php

function increment_static()
{
    static $a = 0; // c'est dans la fonction uniquement qu'elle garde la mémoire de la valeur.
    $a++;
    echo $a;
}

increment_static(); // 1
increment_static(); // 2
increment_static(); // 3
increment_static(); // 4

// sans static $a = 0 la fonction affiche 1 tout le temps elle ne garde pas la mémoire du symbole $a entre les différents appels
// increment_static(); // 1
// increment_static(); // 1
// increment_static(); // 1
// increment_static(); // 1
```

### Exercice suite de fibonacci

Utilisez le concept de variable statique et implémentez une fonction fibo récursive permettant de calculer les valeurs de la suite de Fibonacci jusqu'au rang N.

```text
rang 0 -> 0
rang 1 -> 1
rang 2 -> 1
rang 3 -> 2
rang 4 -> 3
rang 5 -> 5
rang 6 -> 8
rang 7 -> 13
...
```

### Correction

```php

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

/* Preuve du programme ou faire tourner un programme pour bien le comprendre
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

```

## Les types 

- boolean

```php
$test1 = true ;
$test2 = false ;
```

- entier peuvent être précisés en base 10, 16, 8 ou 2

```php
$a = 1234; // un nombre décimal
$a = 0123; // un nombre octal (équivalent à 83 en décimal)
$a = 0x1A; // un nombre hexadecimal (équivalent à 26 en décimal)
$a = 0b11111111; // un nombre binaire (équivalent à 255 en decimal)
$a = 1_234_567; // un nombre décimal (à partir de PHP 7.4.0)
```

- Nombre à virgules flottantes 

float et double

- Chaînes de caractères : **string**

Cote simple ou double. Pour les cotes doubles PHP interprètera les caractères d'échappement et les variables dans la chaîne de caractères.

```php
$a = 'Alan';
$b = 'Turing';
echo "$a, $b"; 
```

- Tableau 

Un tableau est une carte de données associant clés/valeurs :

```txt
array(
    key  => value,
    key2 => value2,
    key3 => value3,
    ...
)
```

Pour la syntaxe en PHP on utilisera les crochets comme suit :

- Tableau indexé numériquement

```php
$a = [1, 2];
```

- Tableau indexé par des clés nommées

```php
$a = ['a' => 1, 'b' => 2];
```

- Itérable est un pseudo-type

Il accepte n'importe quel tableau ou objet implémentant l'interface Traversable.

```php

function foo(iterable $iterable) {
    foreach ($iterable as $value) {
        // ...
    } 
}
```

- Les objets

```php
class A {}
$a = new A;
```

- Les ressources sont des variables spéciales contenant une référence vers une ressource externe.

```php
// affiche : stream (ndt : flux)
$fp = fopen("foo", "w");
echo get_resource_type($fp) . "\n"; 

// affiche : curl
$c = curl_init ();
echo get_resource_type($c) . "\n"; // fonctionne sur les versions antérieures à PHP 8.0.0, car à partir de PHP 8.0.0, curl_init returne un objet CurlHandle
```

- Le type NULL

```php
$var = NULL;
```

- Type callable

Les fonctions de rappel peuvent être identifiées par le type callable.

```php
function sayHello(callable $call, $message) {
  echo $call($message); // fonction de rappel
}

sayHello( function($m){return $m; }, "Hello World !" );

```

## Manipulation et attribution de type

PHP ne permet pas d'imposer la définition des types de manière explicite lors de la déclaration d'une variable. Le type d'une variable est déterminé par le contexte d'utilisation.

```php

$str = "Hello Wordl ! " ; // type string
$number = 12; // type number
$foo = 5 * "10 Little Piggies"; // $foo est un entier (50)
```

PHP supporte également l'indexation des chaînes de caractères à l'aide de la position. C'est la même syntaxe pour accéder aux éléments d'un tableau.

```php
$message = "Car";
$message[0] = "B";
echo $message; // Bar
```

**Les types de variables sont définies à l'assignation et un type peut changer dans un script PHP. Attention à ne pas confondre le passage de paramètre à une fonction qui lui est déterministe.**

### Modification des types

On peut modifier le type d'une variable en utilisant la syntaxe suivante :

```php
$foo = 10;               // $foo est un entier
$bar = (boolean) $foo;   // $bar est un booléen
```

Voici la liste des préfixes autorisés :

- (int), (integer) : modification en int
- (bool), (boolean) : modification en bool
- (float), (double), (real) : modification en float
- (string) : modification en string
- (array) : modification en array
- (object) : modification en object
- (unset) : modification en NULL

## Fonctions nommées & anonymes

Une fonction n'a pas besoin d'être définie avant d'être utilisée. Sauf si vous l'appelez de manière conditionnelle. 

Vous pouvez définir une fonction dans une fonction.

```php

sayHello();

// les fonctions en PHP sont compilées en premier
function sayHello(){
    return "Hello World !" ;
}
```

### Typage des arguments et du retour d'une fonction

Retour de typage et typage conditionnel à partir de la version 8 de PHP.

Nous pouvons également typer les arguments ainsi que les valeurs de retour. Vous pouvez également déclarer un ensemble de types en les séparant par une barre verticale, le caractère "pipe" : | .

```php

function add(int $a ,int $b):int{
    return $a + $b ;
}

add( 1,2);

function merge( int | array $a, int $b) : int | array {
    if( !is_array($a) )
        return [$a, $b];
    return $b;
}
```

### Arguments nommés

Depuis la version 8 de PHP vous pouvez nommer vos arguments lors de l'appel de la fonction, ceci permet de ne pas se soucier de leurs positions.

```php

function foo(int $a , array $numbers, int $c):void{
    foreach($numbers as $number) echo $a + $number + $c;
}

foo( numbers:[1, 2, 3], a: 2, c: 8);
```

### Exercice split_array 

Créez une fonction qui prend en argument un tableau de nombres et une valeur entière donnant la position pour spliter le tableau en deux. Si la valeur de la position est supérieure à la longueur du tableau, retournez le.

Vous pouvez utiliser la fonction array_shift de PHP pour dépiler (comme une pile d'assiètes que vous dépilez) le tableau.

```php
$tab = [5,7,8];
array_shift($tab);// 5
array_shift($tab);// 7
array_shift($tab);// 8
array_shift($tab);// undefined
```

On a une fonction qui fait la même chose mais en dépilant dans l'autre sens : array_pop

```php
$tab = [5,7,8];
array_pop($tab);// 8
array_pop($tab);// 7
array_pop($tab);// 5
array_pop($tab);// undefined
```

Voici la fonction que vous devez implémenter :

```php
// on utilise ici des variables nommées attention cela ne marche qu'à partir de la version 8 de PHP.
split_array(numbers: [4,6,9, 17], pos : 2);
// [ [4,6,9] , [17] ]
```

### Correction

```php

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

var_dump(split_array(numbers: [4,6,9, 17], pos: 2  ));

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
```

### Exercice mapped 

Créez une fonction mapped avec trois arguments glue, array et symbol. Voyez l'exemple ci-dessous. Elle permettra de rassembler les clés et les valeurs dans une chaîne de caractères.

```php
mapped(numbers: ['x' => 1,'y' => 2,'z' => 3,'t' => 7], glue : ', ', symbol : "=");
// x = 1, y = 2, z = 3, t = 7
```

### Correction

```php

function mapped( array $numbers, string $glue = ',' , string $symbol = '='){

    $str = '';
    $count = count($numbers) ;

    foreach($numbers as $k => $v){
        $count--;
        if($count == 0){
            $str = $str . "$k $symbol $v" ;
        }else{
            $str = $str . "$k $symbol $v $glue" ; // x = 1, y = 2, z = 3
        }
    }

    return $str;
}



function mapped_v2( array $numbers, string $glue = ', ' , string $symbol = '='){

    $str = '';
    $count = count($numbers) ;

    foreach($numbers as $k => $v){
        // --$count fait la décrémentation avant comparaison
        // $count-- fait la décrémentation et après comparaison
        $str .= "$k $symbol $v" . ( (--$count == 0) ?  '' : $glue );
    }

    return $str;
}

print_r( mapped(['x' => 1,'y' => 2,'z' => 3,'t' => 7]) );

echo PHP_EOL ;

print_r( mapped_v2(['x' => 1,'y' => 2,'z' => 3,'t' => 7]) );

echo PHP_EOL ;

function increment(){

    $count = 10;

    // pour un retourne vous pouvez également imposer la pp de l'incrémentation avant le retour 
    // comme pour la comparaison 
    // return $count++; retournera 10 
    // return ++$count; retounera 11
    return ++$count;
}

echo increment();
echo PHP_EOL ;
```

### Exercice zip 

Créez une fonction permettant de regrouper terme à terme les éléments de deux tableaux de dimension 1 de même longueur. Elle retournera un tableau de dimension 2 regroupant les éléments.

```php
var_dump(zipper(tab1 : [1,2,3], tab2: [4,5,6]));
// [[1,4], [2,5], [3, 6]]
```

### Correction

```php
function zipper(array $tab1, array $tab2): array
{
    if (count($tab1) != count($tab1)) {
        return [];
    }

    $res = [];

    for($i = 0; $i < count($tab1) ; $i++){
        $res[] = [$tab1[$i], $tab2[$i]];
    }

    return $res;
}

print_r(zipper(tab1: [1, 2, 3], tab2: [4, 5, 6]));
```

Maintenant faite la même fonction qui prend deux chaînes de caractères de même dimension et qui zip les lettres entre elles.

```php
zipper_str('bonjours', 'aurevoir'); // [['b', 'a'], ['o', 'u'], ...] 

```

### Correction

```php

function zipper_str(string $str1, string $str2, bool $out = false): array | string
{
    if (strlen($str1) != strlen($str2)) {
        return [];
    }

    if($out == true){
        $res = '';
        for($i = 0; $i < strlen($str1) ; $i++){
            $res .= $str1[$i] . $str2[$i];
        }

        return $res;
    }

    $res = [];

    for($i = 0; $i < strlen($str1) ; $i++){
        $res[] = [$str1[$i], $str2[$i]];
    }

    return $res;
}


print_r( zipper_str('bonjours', 'aurevoir', true) ) ;

echo PHP_EOL;
```

## Exercice Fizzbuzz

En utilisant l'expression match de PHP implémentez l'algorithme de FizzBuzz, aidez-vous de la remarque ci-après :

Pour les nombres de 1 à 100 compris.
- Pour les multiples de 3, affichez Fizz au lieu du nombre.
- Pour les multiples de 5, affichez Buzz au lieu du nombre.
- Pour les nombres multiples de 3 et 5, affichez uniquement FizzBuzz.
- Dans les autres cas le nombre lui-même.

Remarque : voici un exemple de l'utilisation match en PHP, il permet de tester par rapport à une résultat un premier prédicat qui correspond et dans ce cas retourner un résultat :

```php
$age = 23;

$result = match (true) {
    $age >= 65 => 'senior',
    $age >= 25 => 'adult',
    $age >= 18 => 'young adult',
    default => 'kid',
};

```

## Exercice speed power

En considérant la remarque mathématique ci-après pour le calcul de puissance, créez une fonction récursive **speed_power**. Elle prendra deux paramètres, le nombre et l'exposant. Aidez-vous de la remarque ci-après.


Remarque : l'idée est de trouver des conditions pour calculer plus rapidement. Voici schématiquement comment cet algorithme fonctionne, on partira de la remarque mathématique suivante :

1. Remarque mathématique 

```text
z = 3^10 = (3^5)^2
```

2. Comment fonctionnerait cet algorithme avec une récursion :

```text
3^11

11 =>  z = speed_power(3, 5)   => z = speed_power(3, 2)  =>  z = speed_power(3, 1) => 3
            z * z * 3                 z * z * 3                    z * z
          9*9*3 * 9*9*3 * 3           z  = 9*9*3                   z = 9
``` 



