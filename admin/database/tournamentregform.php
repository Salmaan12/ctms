<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		$tournamentName = $_POST['tournamentName'];
		$tournamentStartDate = $_POST['tournamentStartDate'];
		$tournamentEndDate = $_POST['tournamentEndDate'];
		$noOfMatches = $_POST['noOfMatches'];
		$noOfTeams = $_POST['noOfTeams'];
        $venue = $_POST['venue'];
        $winningPrice = $_POST['winningPrice'];

		$sql = "insert INTO `tournament`(`tournamentName`, `tournamentStartDate`, `tournamentEndDate`, `noOfMatches`, `noOfTeams`, `venue`, `winningPrice`) VALUES ('$tournamentName','$tournamentStartDate','$tournamentEndDate','$noOfMatches','$noOfTeams','$venue','$winningPrice')";

		if ($con->query($sql)) {
			// header('Location: http://localhost/ctms/account.php');
			echo '<script> $(document).ready(function(){ toastr.success("Tournament Successfully Created"); }); </script>';
		} else {
				echo '<script> $(document).ready(function(){ toastr.error("Error! Tournament Not Created"); }); </script>';
		}
    }
	