<?php
    include "../class/Product.php";

    $product = new Product(null, null,null, null);
    $product->deleteProduct($_GET['id']);

    header("Location: ../admin/product.php");

    ?>