<!-- toaster lib import -->

<link href="./../../css/toastr.min.css" rel="stylesheet" />
<script src="./../../js/jquery.min.js"></script>
<script src="./../../js/toastr.min.js"></script>

<?php

// local

$server = 'localhost';
$user = 'root';
$database = 'ctms';
$password = '';


// Server

// $server = 'localhost';
// $user = 'tech4pakistan_w676';
// $database = 'tech4pakistan_ctms';
// $password = 'piDsc3h#Ec2';


$con = new mysqli($server, $user, $password, $database);


if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
} else {
	echo '<script type="text/javascript">console.log("' . "Connection has been stablished - CTMS" . '");</script>';
}