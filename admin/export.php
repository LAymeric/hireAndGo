<?php
    $navbarItem = 'admin';
    include "../head.php";
    include "../navbar.php";
?>

<script type="text/javascript" src="../js/export.js"></script>
<div class="wrapper" id="wrapper-admin">
    <h1><?php echo ADMIN; ?></h1>
    <h2><?php echo EXPORT; ?></h2>
</div>
<div class="form-group" style="text-align:center;">
<?php echo EXPORT_EXPLANATION; ?>
</div>
<div class="form-group" style="text-align:center;">
        <button type="button" class="btn btn-primary" onClick="downloadXls()"><?php echo DOWNLOAD_EXPORT?></button>
    </div>
<?php
    include "../footer.php";
?>
