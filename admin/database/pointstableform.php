<?php

include 'connection.php';

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		$loosingPoints = $_POST['loosingPoints'];
		$winningPoints = $_POST['winningPoints'];
		$Team_ID = $_POST['Team_ID'];
		$noOfMatches = $_POST['noOfMatches'];
        $tied = $_POST['tied'];
        $Tournament_ID = $_POST['Tournament_ID'];
		// $run_rate = "";
		$points = $winningPoints * 2;
		

		$sql = "insert INTO `points_table`(`loosingPoints`, `winningPoints`, `team_ID`, `noOfMatches`, `tied`, `points`, `tournament_ID`) VALUES ('$loosingPoints','$winningPoints','$Team_ID','$noOfMatches','$tied','$points','$Tournament_ID')";

		if ($con->query($sql)) {
			// header('Location: http://localhost/ctms/account.php');
			echo '<script> $(document).ready(function(){ toastr.success("points_table Successfully Added"); }); </script>';
		} else {
				echo '<script>console.log('.$points.')</script>';
				echo '<script> $(document).ready(function(){ toastr.error("Error! points_table Not Added"); }); </script>';
		}
    }
	