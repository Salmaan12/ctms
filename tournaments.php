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
        <h1 data-generated="Contact">Team</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="teams.php" class="active"> Team </a> </li>
            </ul>
        </div>
    </div>
</section>



<section class="teams">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h2 class="team_txt">Teams</h2>
            </div>
            <?php

                include 'database/connection.php';

                $query = "select * from tournament";

                $queryfire = mysqli_query($con, $query);

                while ($res = mysqli_fetch_array($queryfire)) {

            ?>
            <div class="col-md-3">
                <div class="thumbnail team_card text_align_center">
                    <img src="images/tournamentPoster.jpeg" alt="logo" width="60%">
                    <div class="caption">
                        <h3><?php echo $res['tournamentName'] ?></h3>
                        <p>
                            Location: <?php echo $res['venue'] ?>
                        </p>
                        <p><a href="tournamentDetails.php?id=<?php echo $res['id'];?>" class="btn btn-block"
                                role="button">Tournament Details</a></p>
                        <p><a href="player.php?id=<?php echo $res['id'];?>" class="btn btn-block"
                                role="button">Tournament Details</a></p>
                        <?php 
                                    $id = $res['id'];
                                    $totalMatches = $res['noOfTeams'];
                                    // echo $id;
                                    // echo $totalMatches;
                                    $query1 = "select COUNT(`team_id`) as teamTotal from tournament_teams where `tournamnet_id` = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    // $result = mysqli_query($con, "select COUNT(`team_id`) as teamTotal from tournament_teams where `tournamnet_id` = $id");
                                    // $queryfire = mysqli_query($con, $query);
                                    $data13 = mysqli_fetch_assoc($queryfire1);

                                    if($data13['teamTotal'] == $totalMatches) {
                                    ?>

                        <p style="cursor: not-allowed !important;">
                            <a href="tournamnet-reg.php?id=<?php echo $res['id'];?>" class="btn btn-tournament disabled"
                                role="button">Register Here
                            </a>
                        </p>

                        <?php } else { ?>

                        <p>
                            <a href="tournamnet-reg.php?id=<?php echo $res['id'];?>" class="btn btn-tournament"
                                role="button">Register Here </a>
                        </p>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-12">
            </div>
        </div>
</section>


<!-- Begin: FOOTER -->
<footer class="fotsec">
    <div class="container-fluid  marginleftright wow fadeInUp">
        <div class="row">

            <div class="col-md-3">
                <div class="ftabout">
                    <h2>ABOUT US</h2>
                    <div class="btline"></div>
                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor incididunt
                        ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftabout">
                    <h2>USEFUL LINKS</h2>
                    <div class="btline"></div>
                </div>
                <div class="ftlinks">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="teams.html">Teams</a></li>
                        <li><a href="points-table.html">Point Table</a></li>
                        <li><a href="fixtures.html">Fixtures</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftabout">
                    <h2>IMPORTANT LINKS</h2>
                    <div class="btline"></div>
                </div>
                <div class="ftlinks">
                    <ul>
                        <li><a href="account.html">Login</a></li>
                        <li><a href="team-reg.html">Register A Team</a></li>
                        <li><a href="news.html">News</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 nopadding">
                <div class="ftabout">
                    <h2>NEWSLETTER</h2>
                    <div class="btline"></div>
                </div>
                <div class="newsup">
                    <input type="text" name="" placeholder="Email">
                </div>
                <div class="subnow">
                    <a href="#">SUBSCRIBE</a>
                </div>
            </div>

        </div>
    </div>

    <div class="lastft">
        <p>Copyrights © 2021 CRICKET TOURNAMENT MANAGEMENT SYSTEM - All Rights Reserved</p>
    </div>

</footer>
<!-- END Footer -->
<!-- END Footer Section -->
<!-- Placed at the end of the document so the pages load fater -->
<script src="js/all.js"></script>
<script src="js/custom.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="js/butter.js"></script>
<script>
butter.init({
    cancelOnTouch: true
});
</script>
<script>
AOS.init({
    duration: 2000,
});
</script>
</div>
</body>

</html>
<?php
    }
}
?>