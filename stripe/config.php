<?php
    include 'stripe-php-master/init.php';

    $publishableKey = "pk_test_51KDUbeBRon3fJDiDFLIcTspUZMMSxq4rGhMYd7jubaMJvN5NFNuLllL9yYUH9RLJeuhV12ZaoILMvVwPSFWlmBjH00e2RNxkFf";
    $secretKey = "sk_test_51KDUbeBRon3fJDiDgtTNKhqH4bzQP6MIvoZVxyk3OFeUrNoMrWxktxX336wvyeRoeEcqxmU20A2paHBUFkQCvpsK00h2UJkGqR";

    \Stripe\Stripe::setApiKey($secretKey);

?>