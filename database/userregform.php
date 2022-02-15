<?php

include 'connection.php';

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$repass = $_POST['repass'];

		$sql = "select `email` FROM `user` WHERE `email`='" . $email . "'";
		$result = $con->query($sql);

		if ($result->num_rows >= 1) {
			// echo '<script type="text/javascript">alert("' . "Your Email Already Exist!" . '");</script>';
			echo '<script> $(document).ready(function(){ toastr.error("Your Email Already Exist!"); }); </script>';
		} else {
			$sql1 = "insert into `user`(`fname`, `lname`, `email`, `password`, `re_type_pass`) VALUES ('$firstName','$lastName','$email','$pass','$repass')";

			if ($con->query($sql1)) {
				header('Location: http://localhost/ctms/account.php');
				echo '<script> $(document).ready(function(){ toastr.success("User Successfully Created"); }); </script>';
				header('Location: http://localhost/ctms/account.php');
			} else {
				echo error_log($sql1);
			}
		}
	}