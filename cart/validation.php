<?php
    $navbarItem = "booking";
    include "../head.php";
    include "../navbar.php";
    $_SESSION["front_panier"]=null;
?>
    <div class="wrapper" id="wrapper-booking">
      <h1><?php echo VALIDATION;?></h1>
      <h2><?php echo BRAVO;?></h2>
    </div>
<script src="./../js/cart.js"></script>
<script>
$(document).ready(function(){
    paidCourse('<?php echo $_GET["commandId"];?>')
})
</script>
<?php
    include "../footer.php";
?>
