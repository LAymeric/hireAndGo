<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 29/04/2019
 * Time: 14:26
 */

require_once "../class/Cart.php";
include "../head.php";
include "../navbar.php";
require_once __DIR__."./../class/Product.php";
require_once __DIR__."./../functions.php";

?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/cart.js"></script>

<div>


    <div class="wrapper">
        <h1><?php echo MAIN_TITLE_SERVICE; ?></h1>
        <h2><?php echo MAIN_SUBTITLE_SERVICE; ?></h2>
    </div>

    <div class="push"></div>
    <div class="form-group" style="text-align:center;">
        <div class="popup">
            <span class="popuptext" id="successPopup"><i class="far fa-check-circle"></i><?php echo SUCCESS_ADD_SERVICE;?></span>
        </div>
        <div class="popupError">
            <span class="popuptext" id="errorPopup"><i class="far fa-times-circle"></i><?php echo ERROR_ADD_SERVICE;?></span>
        </div>
    </div>
    <?php
    if (!isset($_SESSION['front_panier']))
    {
        $panier = new Cart();
        $_SESSION['front_panier'] = serialize($panier);
    }

    $product = new Product(NULL,NULL,NULL,NULL);
    $product->printProducts();

    ?>

    <div class="push"></div>
    <div class="form-group" style="text-align:center;">
        <button type="submit" class="btn btn-info" onclick="document.location.href='cart.php?idCommand=<?php echo $_GET["idCommand"]?>'"><i class="fas fa-shopping-cart"></i><?php echo SEE_CART;?></span></button>
    </div>
</div>


<?php
include "../footer.php";
?>
