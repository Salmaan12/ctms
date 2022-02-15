<?php
$server = "localhost";
$username= "root";
$password = "";
$dbname= "ctms";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
  die("Connection Failed :(");
}
else {
  // echo "Successfully connected to db";
}

?>
