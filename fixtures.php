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
        <h1 data-generated="Contact">Fixtures</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="fixtures.php" class="active"> Fixtures </a> </li>
            </ul>
        </div>
    </div>
</section>

<section style="margin: 5% 0%;">
    <div class="container marginleftright wow fadeInUp">
        <div class="row">

            <div class="col-md-12">
                <h3 class="decorated" style="margin: 5% 0%;"><span>Tournament Fixtures</span></h3>

                <?php

                            include 'database/connection.php';
                            
                            $id = intval($_GET['id']);

                            $query = "SELECT * FROM `fixtures` WHERE `tournamentid` = $id";

                            $queryfire = mysqli_query($con, $query);

                            while ($res = mysqli_fetch_array($queryfire)) {

                        ?>

                <div class="col-md-4">
                    <div class="red_box">
                        <h3>Next Match</h3>
                    </div>
                    <div class="next_match_box">

                        <div class="row">
                            <div class="col-md-5 text_align_center">
                                <?php
                                        $id = $res['teamid1'];
                                        $query1 = "SELECT TeamLogo FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                    ?>
                                <img src="<?php echo $res1['TeamLogo'] ?>" class="img-responsive">
                                <h3>
                                    <?php
                                        $id = $res['teamid1'];
                                        $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['TeamName'];
                                    ?>
                                </h3>
                            </div>
                            <div class="col-md-2 text_align_center">
                                <strong class="vs">VS</strong>
                            </div>
                            <div class="col-md-5 text_align_center">
                                <?php
                                        $id = $res['teamid2'];
                                        $query1 = "SELECT TeamLogo FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                    ?>
                                <img src="<?php echo $res1['TeamLogo'] ?>" class="img-responsive">
                                <h3>
                                    <?php
                                        $id = $res['teamid2'];
                                        $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['TeamName'];
                                    ?>
                                </h3>
                            </div>
                        </div>

                        <div class="match_detail text_align_center">
                            <ul class="nmw-txt">
                                <li><strong>
                                        <?php
                                    $id = $res['tournamentid'];
                                    $query1 = "SELECT tournamentName FROM `tournament` WHERE id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['tournamentName'];
                                    ?>
                                    </strong></li>
                                <li><?php echo $res['date'] ?></li>
                                <li><?php echo $res['time'] ?></li>
                                <li><span>
                                        <?php
                                    $id = $res['venueId'];
                                    $query1 = "SELECT groundName FROM `ground` WHERE ground_id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['groundName'];
                                    ?>
                                    </span></li>
                            </ul>

                            <button><a href="#">View Match</a></button>
                        </div>

                    </div>
                </div>

                <?php } ?>

            </div>

        </div>
    </div>
</section>

<?php
include 'footer.php';
    }
}
?>