<?php 

require_once __DIR__ . '\..\index.php';
require_once __DIR__ . '\..\database\data.php';
require_once __DIR__ . '\..\categories\Categories.php';
require_once __DIR__ . '\..\categories\Subs.php';

class Products extends Subcat{

    public function __construct(public $prod_name, public $img, public $cat_name, public $subcat_name, public $price, public $discount) {
        $this->cat = new Categories($cat_name);
        $this->subcat = new Subcat($subcat_name);
        parent::__construct($this->cat, $this->subcat);
    }

    public function getShortTitle($title){
        $name_words = explode(' ', $title);
        $name_word = implode(' ', array_slice($name_words, 0, 3));
        return $name_word;
    }

    public function setDiscount($price, $discount){
        if($discount){
            $factor = $price * $discount / 100;
            $discounted_price = $price - $factor;
            
            

            return $discounted_price;
        } else {
            if ($price > 100) {
                $factor = $price * 0.1;
                $discounted_price = $price - $factor;
            } 
            elseif ($price > 20) {
                $factor = $price * 0.2;
                $discounted_price = $price - $factor;
            } else {
                $discounted_price = $price;
            }
            return $discounted_price;
        }
    }

    public function setPrice($price, $discount) {
        if ($discount) return $this->setDiscount($price, $discount );
        else return $price;
    }

}

$prods = [];

foreach ($products as $product) {
    $prod = new Products($product['name'], $product['img'], $product['cat'], $product['subcat'], $product['price'], $product['discount']);
    $prods[] = $prod;
}



?>