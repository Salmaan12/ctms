<?php
session_start();
if(isset($_GET['logout']) && $_GET['logout'] == 1){
	unset($_SESSION['is_captain']);
	header('Location:  http://localhost/ctms/captain/login.php');
	die();
}
else{
	echo 'ERROR';
}
?>