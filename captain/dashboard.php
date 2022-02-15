<?php 

session_start();

    if (!isset($_SESSION['is_captain'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: http://localhost/ctms/captain/login.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost/ctms/captain/login.php'>Login here</a>";
        } 
        else {

          include('header-dashboard.php');


          $server = "localhost";
          $username = "root";
          $database = "ctms";
          $password = "";

          // Create connection
          $connection = new mysqli($server,$username,$password,$database);

          // Check connection
          if ($connection->connect_error) {
            echo "error ". $connection->connect_error;
          }

          include('footer-bashboard.php');
          echo '<script> $(document).ready(function(){ toastr.success("WELCOME TO CTMS MANAGEMENT TEAM"); }); </script>';
          }
      }
?>