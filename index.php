<?php

class Product {

    private $title;
    private $price;
    private $category;
    private $type;

    public function __construct($title, $price, $category, $type) {
   
        $this->setTitle($title);
        $this->setPrice($price);
        $this->setCategory($category);
        $this->setType($type);
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }


    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }


    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}

class Category {
    private $name;
    private $products = [];

    public function __construct($name) {
        $this->setName($name);
    }

 
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function addProduct($product) {
        $this->products[] = $product;
    }
}


trait Discountable {
    public function calculateDiscountedPrice($discountPercentage) {
        return $this->getPrice() * (1 - $discountPercentage / 100);
    }
}


class OutOfStockException extends Exception {
    public function errorMessage() {
        return "Questo prodotto è al momento non disponibile.";
    }
}


$categoryDogs = new Category("Cani");
$categoryCats = new Category("Gatti");

$product1 = new Product( "Cibo per Cani", 20, $categoryDogs, "cibo");
$product2 = new Product( "Giocattolo per Gatti", 15, $categoryCats, "gioco");

$categoryDogs->addProduct($product1);
$categoryCats->addProduct($product2);


class DiscountedProduct extends Product {
    use Discountable;
}

$discountedProduct = new DiscountedProduct("Cuccia per Cani", 50, $categoryDogs, "cuccia");
$discountedPrice = $discountedProduct->calculateDiscountedPrice(10); 


try {
    throw new OutOfStockException();
} catch (OutOfStockException $e) {
    echo "Errore: " . $e->errorMessage();
}