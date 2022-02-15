<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
            $teamA = $_POST['TeamA'];
            $teamB = $_POST['TeamB'];
            $date = $_POST['Date'];
            $time = $_POST['Time'];
            $ground = $_POST['ground_id'];
            $tournament = $_POST['tournament_id'];
            
            $sql1 = "insert INTO `fixtures`(`teamid1`, `teamid2`, `date`, `time`, `venueId`, `tournamentid`) VALUES ('$teamA','$teamB','$date','$time','$ground','$tournament')";

            if ($con->query($sql1)) {
                    // header('Location: http://localhost/ctms/account.php');
                echo '<script> $(document).ready(function(){ toastr.success("Fixture Has Successfully Created"); }); </script>';
            } 
            else {
                echo error_log($sql1);
            }
        }
?>