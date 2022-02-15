<?php 

session_start();

    if (!isset($_SESSION['is_admin'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: http://localhost/ctms/admin/login.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost/ctms/admin/login.php'>Login here</a>";
        } 
        else {

          include('header-dashboard.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3>

                        <?php
                        include 'database/connection.php';
                        $query = "select COUNT(*) as teamTotal from team";
                        $queryfire = mysqli_query($con, $query);
                        $data13 = mysqli_fetch_assoc($queryfire);
                        echo $data13['teamTotal'];
                    ?>

                    </h3>
                    <p> Register Teams </p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <a href="dashboard.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                        include 'database/connection.php';
                        $query = "select COUNT(*) as tournamentTotal from tournament";
                        $queryfire = mysqli_query($con, $query);
                        $data13 = mysqli_fetch_assoc($queryfire);
                        echo $data13['tournamentTotal'];
                    ?>
                    </h3>
                    <p> Register Tournaments </p>
                </div>
                <div class="icon">
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <a href="dashboard.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3>
                        <?php
                        include 'database/connection.php';
                        $query = "select COUNT(*) as playersTotal from players";
                        $queryfire = mysqli_query($con, $query);
                        // $result = mysqli_query($con, "select COUNT(`team_id`) as teamTotal from tournament_teams where `tournamnet_id` = $id");
                        // $queryfire = mysqli_query($con, $query);
                        $data13 = mysqli_fetch_assoc($queryfire);
                        echo $data13['playersTotal'];
                    ?>
                    </h3>
                    <p> Register Player's </p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <a href="dashboard.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h3>

                        <?php
                        include 'database/connection.php';
                        $query = "select COUNT(*) as userTotal from user";
                        $queryfire = mysqli_query($con, $query);
                        $data13 = mysqli_fetch_assoc($queryfire);
                        echo $data13['userTotal'];
                    ?>

                    </h3>
                    <p> Register User's </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="dashboard.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
          

          include('footer-bashboard.php');
          echo '<script> $(document).ready(function(){ toastr.success("WELCOME TO CTMS MANAGEMENT TEAM"); }); </script>';
          }
      }
?>