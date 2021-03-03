<?php 
session_start();

if (isset($_SESSION['shoppingCard'])) {
    $shoppingCard = $_SESSION['shoppingCard'];

    $total_count = $shoppingCard['summary']['total_count'];
    $total_price = $shoppingCard['summary']['total_price'];
    $shopping_products = $shoppingCard['products'];


} else {
    
    $total_count = 0;
    $total_price = 0.0;

}


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
    <a class="navbar-brand" href="index.php">Market  Place</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Ürünler</a>
            </li>
        </ul>
        <ul class="navbar-nav">    
            <li class="nav-item navbar-right">
                <a class="nav-link " href="shopping-card.php">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </span>
                <span class="badge card-count" ><?php echo $total_count; ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>
</nav>