<?php require_once "../class/Product.php";
require_once "../class/Panier.php";
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/panier.js"></script>

<div>
    <?php

    if (!isset($_SESSION['Panier']))
    {
        $panier = new Panier();
        $_SESSION['Panier'] = serialize($panier);
    }

    $product = new Product(NULL,NULL,NULL,NULL);
    $product->printProducts();

    ?>
    <a href="pagePanier.php">PANIER</a>
</div>
