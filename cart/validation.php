<?php
    $navbarItem = "booking";
    include "../head.php";
    include "../navbar.php";

?>
    <div class="wrapper" id="wrapper-booking">
      <h1><?php echo VALIDATION;?></h1>
      <h2><?php echo BRAVO;?></h2>
    </div>
<script>
$(document).ready(function(){
    paidCourse('<?php echo $_GET["idCommand"]?>')
})
</script>
<?php
    include "../footer.php";
?>
