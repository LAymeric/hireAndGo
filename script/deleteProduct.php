<?php
    include "../class/Service.php";
    include "../functions.php";

    $product = new Service(null, null,null, null);
    $product->deleteProduct($_GET['id']);

    header("Location: ../admin/product.php");

    ?>