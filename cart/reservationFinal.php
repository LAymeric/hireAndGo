<?php
    $navbarItem = "booking";
    include "../head.php";
    include "../navbar.php";

?>
    <script type="text/javascript" src="../js/cart.js"></script>
    <div class="wrapper" id="wrapper-booking">
      <h1><?php echo MAIN_TITLE_BOOKING_END;?></h1>
      <h2><?php echo MAIN_SUBTITLE_BOOKING;?></h2>
    </div>
    <div class="push"></div>
    <div class="form-group" style="text-align:center;">
        <button type="button" class="btn btn-primary" onClick="downloadDevis('<?php echo $_GET["idCommand"]?>')"><?php echo DOWNLOAD_DEVIS?></button>
    </div>
     <div class="form-group" style="text-align:center;">
        <button type="button" class="btn btn-primary"><?php echo VALIDATE_COURSE?></button>
    </div>
<?php
    include "../footer.php";
?>
