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
			$SQL = "SELECT * FROM user where email = '$email' and password = '$password'";
			$result = $con->query($SQL);
			$result = $result->fetch_array();
            echo $result;
			

			// echo $result[2];

			if (!empty($result)) {

				$_SESSION['username'] = $result[2] ." ". $result[3];
				$_SESSION['is_admin'] = 1;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
				header('Location: http://localhost/ctms/admin/dashboard.php');
			} else {
				header('Location: http://localhost/ctms/admin/login.php?error=emailandpasswordnotvalid');
                // echo $result;
				echo '<script> $(document).ready(function(){ toastr.error("username or password incorrect"); }); </script>';
			}
		}

		if (isset($_GET{
			'error'})) {
			echo $_GET{
				'error'};
		}
	}