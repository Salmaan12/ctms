<?php
session_start();
if(isset($_GET['logout']) && $_GET['logout'] == 1){
	unset($_SESSION['is_admin']);
	header('Location:  http://localhost/ctms/admin/login.php');
	die();
}
else{
	echo 'ERROR';
}
?>