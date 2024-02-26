<?php 

require_once __DIR__ . '\..\index.php';
require_once __DIR__ . '\..\database\data.php';

class Subcat extends Categories {

    public function __construct(public $sub_name){
    }
}

$food = new Subcat ('Food');
$plays = new Subcat ('Plays');
$accessories = new Subcat ('Accessories');

$sub_categories = [
    $food, $plays, $accessories
];
?>