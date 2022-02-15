<?php

include 'connection.php';

$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} 
else {
		$heading = $_POST['heading'];
		$description = $_POST['description'];
		$target_dir = "images/";
		$target_file = $target_dir  . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			// echo "The file " . basename($_FILES["image"]["name"], ".jpg") . " has been uploaded.";
		} else {
			echo '<script> $(document).ready(function(){ toastr.error("Image attachment is failed! but Team has been Created Successfully"); }); </script>';
		}

		$image = $target_file; // used to store the filename in a variable

		$sql = "insert INTO `news`(`image`, `heading`, `description`) VALUES ('$image','$heading','$description')";

		if ($con->query($sql)) {
			// header('Location: http://localhost/ctms/account.php');
			echo '<script> $(document).ready(function(){ toastr.success("news Successfully Added"); }); </script>';
		} else {
				echo '<script> $(document).ready(function(){ toastr.error("Error! news Not Added"); }); </script>';
		}
    }
	