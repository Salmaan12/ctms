<?php

session_start();
session_destroy();
header('Location: http://localhost/ctms/captain/login.php');

?>