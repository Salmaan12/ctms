<?php
include 'config.php';
include '../database/connection.php';

// for dumb data in tournament team

$team_id = $_POST['team_id'];
$tournament_id = $_POST['tournamnet_id'];
$status="pending";   // after payment confirmation from admin then status change to active

// $sql2 = "select `*` FROM `tournament_teams` WHERE `tournamnet_id`='" . $tournament_id . "' AND `team_id` ='" . $team_id . "'";
// $result = $con->query($sql2);

// if ($result->num_rows >= 1) {
//     echo '<script>alert("Sorry .. Your team already exists in this tournament");</script>';
//     die();
// }

// else {
    $sql = "insert into `tournament_teams`(`tournamnet_id`, `team_id`, `status`) VALUES ('$tournament_id','$team_id','$status')";
if ($con->query($sql) == TRUE) {
    echo '<script>console.log("Tournament Registration completed");</script>';
    $last_id = $con->insert_id;
        // for confirm payment
    \Stripe\Stripe::setVerifySslCerts(false);

    $token=$_POST['stripeToken'];

    $data=\Stripe\Charge::create(array(
        "amount"=>50000,
        "currency"=>"pkr",
        "description"=>"Demo Stripe Test",
        "source"=>$token,
    ));
    $paymentId = $data['id'];
    $paymentAmount = $data['amount'];
    $paymentStatus = $data['status'];

    $sql1 = "insert into `payment_confirmation`(`payment_id`, `payment_amount`, `tournament_team_id`, `payment_status`) VALUES ('$paymentId','$paymentAmount','$last_id','$paymentStatus')";
    if ($con->query($sql1) == TRUE) {
        // echo "<pre>";
        // print_r($data);
        echo '<script>console.log("Payment has been successfully completed");</script>';
        header('Location: http://localhost/ctms/confirmationPayment.php?id='.$last_id);
    } 
}
else {
    echo error_log($sql);
}
// }





?>