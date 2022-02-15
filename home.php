<?php
    session_start();

    if (!isset($_SESSION['is_admin'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: https://tech4pakistan.com/ctms/home.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='https://tech4pakistan.com/ctms/account.php'>Login here</a>";
        } 
        else {

            include 'header.php';
            include 'nav.php';

?>

<section class="Sliderone">
    <!-- <div class="Slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/main_banner.jpg" alt="Slider" class="img-responsive">
                        <div class="carousel-caption">
                            <div class="SliderText wow fadeInLeft">
                                <h1>Grap The oppourtunity. </h1>
                                <h2>Get Register To Your Own Team.</h2>
                                <p>Lorem ipsum dolor sit amet consecteture adipisicing eliat eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->

    <video autoplay muted loop id="myVideo" height="500">
        <source src="images/video-1.mp4" type="video/mp4">
    </video>
</section>

<!-- team point section here -->

<section class="team_point_section">
    <div class="container ">

        <div class="row">

            <?php

                include 'database/connection.php';

                $query = "SELECT * FROM `fixtures` ORDER BY fixtureid DESC LIMIT 1";

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

            <div class="col-md-4">
                <div class="red_box">
                    <h3>Recent Result</h3>
                </div>
                <div class="next_match_box recent_match_box">
                    <div class="row">
                        <?php

include 'database/connection.php';

$query = "SELECT * FROM `recent_results` ORDER BY id DESC LIMIT 3";

$queryfire = mysqli_query($con, $query);

while ($res = mysqli_fetch_array($queryfire)) {

?>
                        <div class="col-md-12">
                            <div class="row match_date">
                                <div class="col-md-8 txtcolor">
                                    <p><?php echo $res['team_A'] ?> Vs <?php echo $res['team_B'] ?></p>
                                </div>
                                <div class="col-md-4 txtcolor">
                                    <p>02 jan 2022</p>
                                </div>
                            </div>
                            <div class="row match_result">
                                <div class="col-md-12">
                                    <p><?php echo $res['status'] ?></p>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="next_match_box box2">

                    <table class="point_table">
                        <thead class="red_box">
                            <tr>
                                <p class="red_box">Recent Tournament PointsTable</p>
                                <th>TEAM</th>
                                <th>P</th>
                                <th>W</th>
                                <th>D</th>
                                <th>L</th>
                                <th>PTS</th>
                            </tr>
                        </thead>
                        <tbody class="padding">

                            <?php

                              include 'database/connection.php';

                              $id = 1;

                              $query = "SELECT * FROM `points_table` WHERE `tournament_ID` = $id ORDER by `winningPoints` DESC";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td>
                                    <?php
                                        $id = $res['team_ID'];
                                        $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['TeamName'];
                                    ?>
                                </td>
                                <td><?php echo $res['noOfMatches'] ?></td>
                                <td><?php echo $res['winningPoints'] ?></td>
                                <td><?php echo $res['tied'] ?></td>
                                <td><?php echo $res['loosingPoints'] ?></td>
                                <td><?php echo $res['points'] ?></td>
                            </tr>

                            <?php

                              }

                            ?>


                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</section>



<section class="center_body_design">
    <div class=" container">
        <div class="row">

            <div class="col-md-9">

                <!-- team section here -->

                <section class="teams">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="team_txt">Teams</h2>
                        </div>
                        <?php

                                include 'database/connection.php';

                                $query = "select * from team ORDER BY TeamId asc LIMIT 6";

                                $queryfire = mysqli_query($con, $query);

                                while ($res = mysqli_fetch_array($queryfire)) {

                            ?>
                        <div class="col-md-4">
                            <div class="thumbnail team_card text_align_center">
                                <img src="<?php echo $res['TeamLogo'] ?>" alt="logo" height="60">
                                <div class="caption">
                                    <h3><?php echo $res['TeamName'] ?></h3>
                                    <p><a href="player.php?id=<?php echo $res['TeamId'];?>" class=" btn btn-block"
                                            role="button">Team Profile</a></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 text-center mt-2 mb-2">
                            <p><a href="teams.php" class="btn viewmorebtn" role="button">View More Teams</a></p>
                        </div>
                    </div>
                </section>

                <!-- Tournamnet Section Here -->


                <section class=" tournament_sec">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="team_txt">Hurry Up !!! Register Your Team In Upcoming Tournamnet</h2>
                        </div>
                        <?php

                                include 'database/connection.php';

                                $query = "select * from tournament";

                                $queryfire = mysqli_query($con, $query);

                                while ($res = mysqli_fetch_array($queryfire)) {

                            ?>
                        <div class="col-md-4">
                            <div class="tournament_main_div text_align_center">
                                <img src="images/tournamentPoster.jpeg" alt="logo" width="60%">
                                <div class="caption">
                                    <h3><?php echo $res['tournamentName'] ?></h3>
                                    <p>
                                        Location: <?php echo $res['venue'] ?>
                                    </p>
                                    <p>
                                        <a href="tournamnet-reg.php?id=<?php echo $res['id'];?>"
                                            class="btn btn-tournament" role="button">Register Here </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </section>

                <!-- news section here -->

                <section class="news">
                    <div class="row">

                        <br><br>

                        <div class="col-md-12 text_align_center">
                            <h2>Latest News</h2>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut
                                labore et dolore</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="blogslid">

                            <div class="ser_main wow zoomIn" data-wow-duration="2s">
                                <div class="serv text_align_center">
                                    <img src="images/blog-1.jpg" class="img-responsive">
                                    <h5>Heading Here</h5>
                                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod
                                        tempor
                                        incididunt ut labore et dolore</p>
                                </div>
                                <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                            </div>

                            <div class="ser_main wow zoomIn" data-wow-duration="2s">
                                <div class="serv text_align_center">
                                    <img src="images/blog-1.jpg" class="img-responsive">
                                    <h5>Heading Here</h5>
                                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod
                                        tempor
                                        incididunt ut labore et dolore</p>
                                </div>
                                <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                            </div>

                            <div class="ser_main wow zoomIn" data-wow-duration="2s">
                                <div class="serv text_align_center">
                                    <img src="images/blog-1.jpg" class="img-responsive">
                                    <h5>Heading Here</h5>
                                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod
                                        tempor
                                        incididunt ut labore et dolore</p>
                                </div>
                                <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                            </div>

                            <div class="ser_main wow zoomIn" data-wow-duration="2s">
                                <div class="serv text_align_center">
                                    <img src="images/blog-1.jpg" class="img-responsive">
                                    <h5>Heading Here</h5>
                                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod
                                        tempor
                                        incididunt ut labore et dolore</p>
                                </div>
                                <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                            </div>

                            <div class="ser_main wow zoomIn" data-wow-duration="2s">
                                <div class="serv text_align_center">
                                    <img src="images/blog-1.jpg" class="img-responsive">
                                    <h5>Heading Here</h5>
                                    <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod
                                        tempor
                                        incididunt ut labore et dolore</p>
                                </div>
                                <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 text_align_center">
                            <h2>Latest Video</h2>
                        </div>

                    </div>

                    <div class="row">
                        <div class="videoslid">

                            <div class="hvideo-box">
                                <div class="hv_box_inner">
                                    <!--<span class="vtime">02:10</span>-->
                                    <img src="images/video_new.jpg" alt="">
                                    <div class="hv-info">
                                        <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                            data-caption="My caption" class="play">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                                data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="hvideo-box">
                                <div class="hv_box_inner">
                                    <!--<span class="vtime">02:10</span>-->
                                    <img src="images/video_new.jpg" alt="">
                                    <div class="hv-info">
                                        <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                            data-caption="My caption" class="play">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                                data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="hvideo-box">
                                <div class="hv_box_inner">
                                    <!--<span class="vtime">02:10</span>-->
                                    <img src="images/video_new.jpg" alt="">
                                    <div class="hv-info">
                                        <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                            data-caption="My caption" class="play">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                                data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="hvideo-box">
                                <div class="hv_box_inner">
                                    <!--<span class="vtime">02:10</span>-->
                                    <img src="images/video_new.jpg" alt="">
                                    <div class="hv-info">
                                        <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                            data-caption="My caption" class="play">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                                data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="hvideo-box">
                                <div class="hv_box_inner">
                                    <!--<span class="vtime">02:10</span>-->
                                    <img src="images/video_new.jpg" alt="">
                                    <div class="hv-info">
                                        <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                            data-caption="My caption" class="play">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                                data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <br><br>

                </section>

                <!-- php code not mention here -->
                <!-- best player section here -->

                <section class="player">

                    <br><br>

                    <div class="row">

                        <div class="col-md-6 text_white">
                            <h2 style="letter-spacing: 2px;">Best Player's in the Season</h2>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt
                                ut labore et dolore</p>
                        </div>

                        <div class="col-md-6 text_white">
                            <!--<button class="tean_btn"><a href="player.php">View More</a></button>-->
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            include 'database/connection.php';

                            $query = "select * from performance ORDER BY id DESC LIMIT 3";

                            $queryfire = mysqli_query($con, $query);

                            while ($res = mysqli_fetch_array($queryfire)) {

                        ?>

                            <div class="player-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="images/player_icon.png" alt="player_img" width="240" height="300">
                                    </div>
                                    <div class="col-md-7 player-txt">
                                        <!--<span class="star-tag"><i class="fa fa-star"></i></span>-->
                                        <h3>
                                            <?php
                                                $id = $res['player_ID'];
                                                $query1 = "SELECT playerName FROM `players` WHERE playerId = $id";
                                                $queryfire1 = mysqli_query($con, $query1);
                                                $res1 = mysqli_fetch_array($queryfire1);
                                                echo $res1['playerName'];
                                            ?>
                                        </h3>
                                        <strong class="player-desi">South Captain</strong>
                                        <p> Hi, I am <?php echo $res1['playerName']; ?> the captain of the
                                            southern. </p>
                                        <ul>
                                            <li>29 <span>Age</span></li>
                                            <li><?php echo $res['noOfMatches'] ?> <span>Matches</span></li>
                                            <li><?php echo $res['runs'] ?> <span>Runs</span></li>
                                            <li><?php echo $res['wickets'] ?> <span>Wickets</span></li>
                                            <li><?php echo $res['noOfSixes'] ?> <span>No Of Sixes</span></li>
                                            <li><?php echo $res['noOfFours'] ?> <span>No Of Fours</span></li>
                                        </ul>
                                        <!--<a class="playerbio" href="#">Player Biography <i-->
                                        <!--        class="fa fa-arrow-alt-circle-right"></i></a> <a href="#"-->
                                        <!--    class="follow">Follow</a>-->
                                    </div>

                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>

                </section>

            </div>


            <div class="col-md-3">


                <img src="images/tournamentPoster.jpeg" alt="sidebar_poster" width="100%" class="sidebar_poster">

                <img src="images/sidebar-new-1.jpg" alt="sidebar_poster" width="100%" class="sidebar_poster">

                <img src="images/sidebar-new-2.jpg" alt="sidebar_poster" width="100%" class="sidebar_poster">

                <img src="images/sidebar-new-3.jpg" alt="sidebar_poster" width="100%" class="sidebar_poster">

                <img src="images/sidebar-new-4.jpg" alt="sidebar_poster" width="100%" class="sidebar_poster">

                <img src="images/sidebar-new-5.jpg" alt="sidebar_poster" width="100%" class="sidebar_poster">




            </div>

        </div>
    </div>
</section>



<?php


include 'footer.php';
    }
}

    
?>