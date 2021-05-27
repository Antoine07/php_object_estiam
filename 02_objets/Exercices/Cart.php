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

    public function add(Product $product):void{
        $this->products[] = $product;
    }

    public function total():float{
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPrice();
        }

        return $sum;
    }
}

$cart = new Cart;

$cart->add($apple);
$cart->add($orange);
$cart->add($raspberry);

echo $cart->total();
echo PHP_EOL;
