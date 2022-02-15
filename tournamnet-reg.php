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
            include 'stripe/config.php';

?>

<section class="inner_bannersec">
    <img src="images/innerbanner.jpg">
    <div class="inner-banner-header wf100">
        <h1 data-generated="Contact">Register For Tournament</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.html"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="tournamnet-reg.php" class="active"> Tournament Registeration </a> </li>
            </ul>
        </div>
    </div>
</section>


<div class="team-reg">
    <div class="container marginleftright">
        <div class="row">
            <div class="col-md-12">
                <?php

                    include 'database/connection.php';

                    $id = intval($_GET['id']);
                    $query1 = "SELECT * FROM `tournament` WHERE id = $id";

                    $queryfire1 = mysqli_query($con, $query1);
                    $res = mysqli_fetch_array($queryfire1)
                ?>
                <p>Tournament Name: <?php echo $res['tournamentName']; ?></p>
                <p>Venue: <?php echo $res['venue']; ?></p>
                <p>Tournament Start Date: <?php echo $res['tournamentStartDate']; ?> Tournament End Date:
                    <?php echo $res['tournamentEndDate']; ?></p>
                <p>Number Of Matches Held This Tournament: <?php echo $res['noOfMatches']; ?></p>
                <p>Number Of Teams: <?php echo $res['noOfTeams']; ?></p>
                <p>Winning Price: <?php echo $res['winningPrice']; ?></p>

                <a href="points-table.php?id=<?php echo $res['id'];?>" class="btn btn-primary" role="button">View
                    Points Table </a>

                <a href="fixtures.php?id=<?php echo $res['id'];?>" class="btn btn-primary" role="button">View
                    Fixtures </a>

                <h3 class="decorated" style="margin: 5% 0%;"><span>Register Your Cricket Team In This Tournament</span>
                </h3>
            </div>
            <div class="col-md-8 col-sm-12">
                <form action="stripe/submit.php" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="team_id">
                            <option disabled selected>Select Team</option>
                            <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select TeamId,TeamName from team");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['TeamId'] . "'>" . $data['TeamId'] . ' -- ' . $data['TeamName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                        </select>
                        <br>
                        <select class="form-control" name="tournamnet_id">
                            <option disabled selected>Select Team</option>
                            <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select * from `tournament` where id = $id");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option selected value='" . $data['id'] . "'>" . $data['tournamentName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                        </select>
                    </div>
                    <?php

                        $id = intval($_GET['id']);
                        $query3 = "select noOfTeams from tournament where `id` = $id";
                        $queryfire3 = mysqli_query($con, $query3);
                        $data14 = mysqli_fetch_assoc($queryfire3);
                        $totalMatches = $data14['noOfTeams'];

                        $query1 = "select COUNT(`team_id`) as teamTotal from tournament_teams where `tournamnet_id` = $id";
                        $queryfire1 = mysqli_query($con, $query1);
                        $data13 = mysqli_fetch_assoc($queryfire1);
                        if($data13['teamTotal'] == $totalMatches) {
                    ?>

                    <p>Tournament Team Enroll Capacity is full</p>

                    <?php } else { ?>

                    <p style="color: red;">** You can Register your Team In That Tournament Through Simple Credit Card
                        Payment</p>
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $publishableKey?>" data-label="Confirm Registration" data-amount="50000"
                        data-name="confirmPayment" data-description="Demo Stripe Test" data-currency="pkr"
                        data-email="ctmsfyp@gmail.com" data-image="stripe/main-logo.png">
                    </script>

                    <?php } ?>
                </form>
            </div>
            <div class="col-md-4">
                <img src="https://i.gifer.com/origin/aa/aaf644505b7662c316c53ef935370bc6.gif" alt="" width="430">
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
        }
    }
    ?>