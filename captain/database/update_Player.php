<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {

    $id = $_POST["playerId"];
    $name = $_POST["playerName"];
     $contact = $_POST["playerContactNo"];
     $pStats = $_POST["playerStats"];

     $query1 = "update players set playerName='$name',playerStats='$pStats',playerContactNo='$contact' WHERE playerId='$id'";

     if ($con->query($query1)) {
          header('Location: http://localhost/ctms/captain/my_team.php');
          echo '<script> $(document).ready(function(){ toastr.success("Player Record Updated Succesfully"); }); </script>';
     } else {
          echo error_log($query1);
     }

}

?>