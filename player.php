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
        <h1 data-generated="Contact">Players Details</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="teams.php" class="active"> Player </a> </li>
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
                $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";

                $queryfire1 = mysqli_query($con, $query1);
                $res = mysqli_fetch_array($queryfire1)
            ?>
                <h2 class="team_txt"><?php echo $res['TeamName']; ?></h2>
            </div>
            <?php

                include 'database/connection.php';

                $id = intval($_GET['id']);
                $query = "SELECT * FROM `players` WHERE team_id = $id";

                $queryfire = mysqli_query($con, $query);

                while ($res = mysqli_fetch_array($queryfire)) {

            ?>
            <div class="col-md-3">
                <div class="thumbnail team_card text_align_center">
                    <img src="images/user.png" alt="logo">
                    <div class="caption">
                        <h3><?php echo $res['playerName'] ?></h3>
                        <p><a class="btn btn-block" role="button"><?php echo $res['playerStats'] ?></a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-12">
            </div>
        </div>
</section>


<?php
include 'footer.php';
    }
}
?>