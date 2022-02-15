<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);

$gId = intval($_GET['tournament_id']);

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
    $sql2 = "select * from tournament_teams where tournamnet_id = $gId"; 
    $queryfire1 = mysqli_query($con, $sql2);
    $json = [];
    while($res = mysqli_fetch_array($queryfire1)){
            $json[$res['id']] = $res['team_id'];
    }


    echo json_encode($json);

        }
?>