<?php
include 'config.php';
?>

<form action="submit.php" method="post">

    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishableKey?>"
        data-amount="50000" data-name="CTMS Stripe Test" data-description="Demo Stripe Test" data-currency="pkr"
        data-email="ctmsfyp@gmail.com" data-image="main-logo.png">
    </script>

</form>