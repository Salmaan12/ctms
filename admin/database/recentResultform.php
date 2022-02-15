<?php

include 'connection.php';

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		$team_A = $_POST['team_A'];
		$team_B = $_POST['team_B'];
		$team_A_score = $_POST['team_A_score'];
		$team_B_score = $_POST['team_B_score'];
        $status = $_POST['status'];
		
		$sql = "insert INTO `recent_results`(`team_A`, `team_B`, `team_A_score`, `team_B_score`, `status`) VALUES ('$team_A','$team_B','$team_A_score','$team_B_score','$status')";

		if ($con->query($sql)) {
			// header('Location: http://localhost/ctms/account.php');
			echo '<script> $(document).ready(function(){ toastr.success("Recent Results Successfully Added"); }); </script>';
		} else {
				echo '<script>console.log('.$points.')</script>';
				echo '<script> $(document).ready(function(){ toastr.error("Error! Recent Results Not Added"); }); </script>';
		}
    }
	