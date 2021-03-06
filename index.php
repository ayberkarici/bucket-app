


<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Urun listesi</title>
</head>
<body >

<?php require_once('lib/db.php') ?>

<?php 
/* Verileri Çekme Bölümü */ 
$products = $db->query("SELECT * FROM products", PDO::FETCH_OBJ)->fetchAll();

//print_r($products)


?>

<?php include("lib/navbar.php") ?>
<!--------------------------Header----------------------------------->

<!--------------------------Main Content----------------------------->
<div class="container">
    <h2 class="text-center">Ürün Listesi</h2>
    <hr>
    <div class="row">
        <?php foreach($products as $product): ?>
        <div class="card" style="width: 16rem;margin:1rem .5rem;">
            <img src="assets/images/<?php echo $product->img_url ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product->product_name ?></h5>
                <p class="card-text"><?php echo $product->detail ?></p>
                <p class="card-text text-right"><strong><?php echo $product->price ?> TL</strong></p>
                <button product-id="<?php echo $product->id ?>" class="btn btn-primary btn-block addToCard">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </span>
                <span class="">Satın al</span>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!--------------------------Main Content----------------------------->


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>