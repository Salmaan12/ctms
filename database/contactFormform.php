<?php

include 'connection.php';

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$message = $_POST['message'];

		$sql = "insert INTO `contactus`(`name`, `email`, `number`, `message`) VALUES ('$name','$email','$number','$message')";
		
        $subject = "CTMS USER ARE CONTACT YOU";
        $sendEmailTo = "ctmsfyp@gmail.com";

        $msg = "User $name ... Email is $email ... Number is $number and there message is $message";

        if(mail($sendEmailTo, $subject, $msg)) {
			echo '<script> $(document).ready(function(){ toastr.success("Email successfully sent to ' + $sendEmailTo+'"); }); </script>';
		} else {
			echo '<script> $(document).ready(function(){ toastr.error("Email not send"); }); </script>';
		}

        if ($con->query($sql)) {
			echo '<script> $(document).ready(function(){ toastr.success("Your Message has Been Sent To CTMS Management Committee"); }); </script>';
		} else {
				echo '<script> $(document).ready(function(){ toastr.error("Response Not Added"); }); </script>';
		}

	}