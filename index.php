<?php
    session_start();

    if (!isset($_SESSION['is_admin'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: http://localhost/ctms/account.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='https://localhost/ctms/account.php'>Login here</a>";
        } 
        else {
            // include 'header.php';
            include 'home.php';
			// echo '<script type="text/javascript">alert("' . "WELCOME TO CTMS" . '");</script>';
            echo '<script> $(document).ready(function(){ toastr.success("WELCOME TO CTMS"); }); </script>';
    }
}
?>