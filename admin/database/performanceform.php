<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		$noOfMatches = $_POST['noOfMatches'];
		$runs = $_POST['runs'];
		$wickets = $_POST['wickets'];
		$noOfSixes = $_POST['noOfSixes'];
		$noOfFours = $_POST['noOfFours'];
        $player_ID = $_POST['player_ID'];

		$sql = "insert INTO `performance`(`noOfMatches`, `runs`, `wickets`, `noOfSixes`, `noOfFours`, `player_ID`) VALUES ('$noOfMatches','$runs','$wickets','$noOfSixes','$noOfFours','$player_ID')";

		if ($con->query($sql)) {
			// header('Location: http://localhost/ctms/account.php');
			echo '<script> $(document).ready(function(){ toastr.success("performance Successfully Added"); }); </script>';
		} else {
				echo '<script> $(document).ready(function(){ toastr.error("Error! performance Not Added"); }); </script>';
		}
    }
	