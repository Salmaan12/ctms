<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		session_start();
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$SQL = "SELECT * FROM captain where email = '$email' and password = '$password'";
			$result = $con->query($SQL);
			$result = $result->fetch_array();
            echo $result;
			

			// echo $result[2];

			if (!empty($result)) {

				$_SESSION['username'] = $result[2];
				$_SESSION['teamId'] = $result[6];
				$_SESSION['is_captain'] = 1;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
				header('Location: http://localhost/ctms/captain/dashboard.php');
			} else {
				echo '<script> $(document).ready(function(){ toastr.error("username or password incorrect"); }); </script>';
				header('Location: http://localhost/ctms/captain/login.php?error=emailandpasswordnotvalid');
                // echo $result;
			}
		}

		if (isset($_GET{
			'error'})) {
			echo $_GET{
				'error'};
		}
	}