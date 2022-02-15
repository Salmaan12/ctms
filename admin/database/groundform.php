<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
            $groundName = $_POST['groundName'];
            $groundLocation = $_POST['groundLocation'];
            $sponserId = $_POST['sponser_id'];   
            $sql1 = "insert INTO `ground`(`groundName`, `groundLocation`, `sponser_id`) VALUES ('$groundName','$groundLocation','$sponserId')";

            if ($con->query($sql1)) {
                    // header('Location: http://localhost/ctms/account.php');
                echo '<script> $(document).ready(function(){ toastr.success("Ground Has Added Successfully Created"); }); </script>';
            } 
            else {
                echo error_log($sql1);
            }
        }