<?php 

require __DIR__ . '\categories\Categories.php';
require __DIR__ . '\categories\Subs.php';
require __DIR__ . '\products\Products.php';
require_once __DIR__ . '\database\data.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style\style.css">

</head>
<body>
    
    <header>
        <div id="top-header">
            <picture>
                <h1>OOP SHOP</h1>
            </picture>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="search"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
        </div>
        <nav  id="bottom-header" class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <?php foreach ($categories as $cat): ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $cat->name ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($sub_categories as $sub_c): ?>
                                <li><a class="dropdown-item" href="#"><?= $sub_c->sub_name?></a></li>
                                <?php endforeach; ?> 
                            </ul>
                        </li>
                    <?php endforeach; ?> 
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($prods as $prod): ?>
                <div class="col p-2">
                    <div class="card">
                        <img class="card-img-top" src="<?= $prod->img ?>" alt="<?= $prod->prod_name ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?= $prod->getShortTitle($prod->prod_name) ?></h4>
                            <p>Descrizione: "<?=$prod->prod_name?>"</p>
                            <div>Prezzo: 
                                <?php if ($prod->discount):?>
                                <span class="text-decoration-line-through">
                                    <?= $prod->price ?>
                                    €
                                </span> 
                                <?php endif ;?>                              
                                <span class="<?= $prod->discount ? 'text-danger' : '' ?> mx-1">
                                    <strong><?= number_format($prod->setDiscount($prod->price, $prod->discount), 2) ?>€</strong>
                                </span>                            
                            </div>
                            <div>
                                <span class="label <?= $prod->cat_name ? 'main-cat' : '' ?>">
                                    <?=$prod->cat_name?>
                                </span>
                                <span class="label <?= $prod->subcat_name ? 'sub-cat' : '' ?>">
                                    <?=$prod->subcat_name?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>