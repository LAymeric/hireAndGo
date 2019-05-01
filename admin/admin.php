<?php
    $navbarItem = 'admin';
    include "../head.php";
    include "../navbar.php";
?>

<div class="wrapper" id="wrapper-admin">
    <h1><?php echo ADMIN; ?></h1>
    <h2><?php echo MAIN_SUBTITLE_ADMIN; ?></h2>
</div>


<div class="container">
    <div class="dashboard-container">
        <div class="row">
            <div class="tile col"onclick="window.location.href='./member.php'">
                <i class="fas fa-users fa-2x"></i><?php echo MEMBER ?>
            </div>
            <div class="tile col" onclick="window.location.href='./subscription.php'">
                <i class="far fa-star fa-2x"></i><?php echo SUBSCRIPTION?>
            </div>
        </div>
        <div class="row">
            <div class="tile col" onclick="window.location.href='./product.php'">
                <i class="fab fa-opencart fa-2x"></i><?php echo PRODUCT ?>
            </div>
        </div>
        <div>
        </div>
<?php
    include "../footer.php";
?>
