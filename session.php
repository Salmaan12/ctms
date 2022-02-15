



<?php
session_start();

if (!isset($_SESSION['is_admin'])) {
    echo "Please Login again";
    echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
} else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Your session has expired! <a href='https://localhost/ctms/account.php'>Login here</a>";
    } else {

        
    }
}
