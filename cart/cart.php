<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 29/04/2019
 * Time: 14:38
 */

require_once "../class/Cart.php";
include "../head.php";
include "../navbar.php";
//session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cart.js"></script>
</head>
<body>

    <div class="wrapper">
        <h1><?php echo MAIN_TITLE_CART; ?></h1>
    </div>
    <div class="push"></div>
    <div class="container">
        <div id="panier">
        </div>
    </div>
    <div class="form-group" style="text-align:center;">
        <button type="button"  onclick="validateCart('<?php echo $_SESSION['front_id']  ?>', '<?php echo $_GET['idCommand']?>')" class="btn btn-info"><?php echo VALIDATE?></button>
    </div>
</body>
</html>


<?php
include "../footer.php";
?>