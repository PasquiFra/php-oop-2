<?php 

require_once __DIR__ . '\..\index.php';
require_once __DIR__ . '\..\database\data.php';

class Categories {
    public function __construct(public $name){
    }
}

$dogs = new Categories ('Dogs');
$cats = new Categories ('Cats');
$birds = new Categories ('Birds');
$fishes = new Categories ('Fishes');

$categories= [$dogs, $cats, $birds, $fishes]
?>