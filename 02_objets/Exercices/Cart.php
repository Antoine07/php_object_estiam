<?php 


class Product{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price){
        $this->setName($name);
        $this->setPrice($price);
    }

    public function setPrice(float $price){
        if( $price < 0 ){
            return; 
        }

        $this->price = $price;
    }

    public function setName(string $name){
        if( strlen($name) == 0 ){
            return ; 
        }

        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }

     public function getName(){
        return $this->name;
    }

}

$apple = new Product('apple', 0.5);
$orange = new Product('orange', 0.15);
$banana = new Product('banana', 0.85);
$raspberry = new Product('raspberry', 0.35);

$products = []; // array_push ou la technique suivante pour ajouter un élément dans un tableau
$products[] = $apple; // push rapide
$products[] = $orange;
$products[] = $banana;
$products[] = $raspberry;

$total = 0;
foreach($products as $product){
    // print_r($product);
    // echo PHP_EOL;
    $total += $product->getPrice();
}

echo $total;
echo PHP_EOL; // constante PHP saut de ligne dans la console "\n"

// 2 Cart

class Cart{

    private array $products = [];
    private float $tva = 0.2;

    public function add(Product $product, int $quantity ):void{
        $this->products[] = [ $product, $quantity ]; // [[$apple, 8], [$oragne, 10], [$raspberry, 10]]
    }

    public function total():float{
        $sum = 0;
        // key => value on peut leur donner les noms que l'on veut !
        foreach($this->products as $command){
            // list($product, $quantity) = [$apple, 8];
            // list($product, $quantity) = [$oragne, 10];
            // list($product, $quantity) =  [$raspberry, 10]; // $product = $raspberry; $quantity = 10
            list($product, $quantity) = $command;

            $sum +=  $product->getPrice() * $quantity * (1 + $this->tva);
            // $p * ( 1 + $tva) = $p + $p * $tva 
        }

        return $sum;
    }
}

$cart = new Cart;

$cart->add($apple, 8);
$cart->add($orange, 10);
$cart->add($raspberry, 10);

echo $cart->total();
echo PHP_EOL;