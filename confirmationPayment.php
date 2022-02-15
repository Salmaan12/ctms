<?php
    session_start();

    if (!isset($_SESSION['is_admin'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: http://localhost/ctms/home.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='https://localhost/ctms/account.php'>Login here</a>";
        } 
        else {

 include 'header.php';
 include 'nav.php';

?>

<section class="inner_bannersec">
    <img src="images/innerbanner.jpg">
    <div class="inner-banner-header wf100">
        <h1 data-generated="Contact">Payment & Team Confirmation</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="confirmationPayment.php" class="active"> Payment & Team Confirmation </a>
                </li>
            </ul>
        </div>
    </div>
</section>



<section class="teams">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <?php

                include 'database/connection.php';

                $id = intval($_GET['id']);
                $query1 = "SELECT * FROM `tournament_teams` WHERE id = $id";

                $queryfire1 = mysqli_query($con, $query1);
                $res = mysqli_fetch_array($queryfire1);

                $teamId = $res['team_id'];
                $tournamnetId = $res['tournamnet_id'];

                $query2 = "SELECT TeamName FROM `team` WHERE TeamId = $teamId";

                $queryfire2 = mysqli_query($con, $query2);
                $res = mysqli_fetch_array($queryfire2);

                $query3 = "SELECT tournamentName FROM `tournament` WHERE id = $tournamnetId";

                $queryfire3 = mysqli_query($con, $query3);
                $res1 = mysqli_fetch_array($queryfire3)
                
                ?>

                <p>Congratulation ! Your Team <b><?php echo $res['TeamName']; ?></b> is successfully register this
                    tournament
                    <b><?php echo $res1['tournamentName']; ?></b> .. wait 24 hour after that your team matches schedule
                    updated
                </p>
            </div>
        </div>
</section>
</div>
<?php
    include 'footer.php';
    }
}
?>