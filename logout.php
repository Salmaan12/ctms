<?php

session_start();
session_destroy();
header('Location: http://localhost/ctms/index.php');

?>
