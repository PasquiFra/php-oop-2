<?php 

require_once __DIR__ . '\..\index.php';
require_once __DIR__ . '\..\database\data.php';
require_once __DIR__ . '\..\categories\Categories.php';
require_once __DIR__ . '\..\categories\Subs.php';

class Products extends Subcat{

    public function __construct(public $prod_name, public $img, public $cat_name, public $subcat_name) {
        $this->cat = new Categories($cat_name);
        $this->subcat = new Subcat($subcat_name);
        parent::__construct($this->cat, $this->subcat);
    }

    public function getShortTitle($title){
        $name_words = explode(' ', $title);
        $name_word = implode(' ', array_slice($name_words, 0, 3));
        return $name_word;
    }
}

$prods = [];

foreach ($products as $product) {
    $prod = new Products($product['name'], $product['img'], $product['cat'], $product['subcat']);
    $prods[] = $prod;
}



?>