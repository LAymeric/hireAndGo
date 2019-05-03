<?php
    $navbarItem = "booking";
    include "../head.php";
    include "../navbar.php";

?>

<script src="https://js.stripe.com/v3/"></script>
<script src="./../js/stripe.js"></script>
<div class="margin-container">
    <form action="./validation.php?commandId=<?php echo $_GET["commandId"]?>" method="post" id="payment-form">
      <div class="form-group" style="text-align:center;">
        <label for="card-element" class="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
      </div>
        <div class="form-group" style="text-align:center;">
                <button type="submit" class="btn btn-info"><?php echo VALIDATE;?></span></button>
        </div>
    </form>
</div>
<?php
    include "../footer.php";
?>
