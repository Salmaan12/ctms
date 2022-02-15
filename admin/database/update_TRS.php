<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {

     $id = $_POST["trId"];
     $status = $_POST["status"];

     $query1 = "update tournament_teams set status = '$status' WHERE id='$id'";

     if ($con->query($query1)) {
          header('Location: http://localhost/ctms/admin/confirmRegistration.php');
          echo '<script> $(document).ready(function(){ toastr.success("Player Record Updated Succesfully"); }); </script>';
     } else {
          echo error_log($query1);
     }

}

?>