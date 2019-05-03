<?php
    $navbarItem = "booking";
    include "../head.php";
    include "../navbar.php";

?>

<script src="https://js.stripe.com/v3/"></script>
<script src="./../js/stripe.js"></script>
<div class="margin-container">
    <form action="./validation.php" method="post" id="payment-form">
      <div class="form-row">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>
</div>
<?php
    include "../footer.php";
?>
