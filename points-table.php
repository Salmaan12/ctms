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
        <h1 data-generated="Contact">Points Table</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="point-table.php" class="active"> Points Table </a> </li>
            </ul>
        </div>
    </div>
</section>

<section style="margin:5% 0%;">
    <div class="container marginleftright">
        <div class="row">
            <div class="col-md-12">
                <table class="standings-table standings-table--full ">
                    <tbody>
                        <tr class="standings-table__header">
                            <th class="u-left-text standings-table__freeze">Team</th>
                            <th class="standings-table__padded">Pld</th>
                            <th class="standings-table__optional">Won</th>
                            <th class="standings-table__optional">Lost</th>
                            <th class="standings-table__optional">Tied</th>
                            <th>Pts</th>
                            <th>Form</th>
                        </tr>

                        <?php

                              include 'database/connection.php';

                              $id = intval($_GET['id']);

                              $query = "SELECT * FROM `points_table` WHERE `tournament_ID` = $id ORDER by `winningPoints` DESC";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                        <tr>
                            <td class="standings-table__team standings-table__freeze">
                                <i class="table__logo tLogo40x32 DC"></i>
                                <a href="teams.php">
                                    <span class="standings-table__team-name js-team">
                                        <?php
                                        $id = $res['team_ID'];
                                        $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['TeamName'];
                                    ?>
                                    </span>
                                </a>
                            </td>
                            <td class="standings-table__padded"><?php echo $res['noOfMatches'] ?></td>
                            <td class="standings-table__optional"><?php echo $res['winningPoints'] ?></td>
                            <td class="standings-table__optional"><?php echo $res['loosingPoints'] ?></td>
                            <td class="standings-table__optional"><?php echo $res['tied'] ?></td>
                            <!-- <td class="standings-table__optional">0</td>
                            <td>+0.547</td>
                            <td class="standings-table__optional">1,325/150.2</td>
                            <td class="standings-table__optional">1,320/159.4</td> -->
                            <td class="standings-table__highlight js-points"><?php echo $res['points'] ?></td>
                            <td>
                                <ul class="standings-table__form">
                                    <?php 
                                    $winPoints = $res['winningPoints'];
                                    $lossPoints = $res['loosingPoints'];
                                    for($i = 0; $i < $winPoints; $i++) { ?>
                                    <li class="standings-table__outcome standings-table__outcome--win">
                                        W
                                    </li>
                                    <?php
                                    } 
                                    ?>
                                    <?php 
                                    for($i = 0; $i < $lossPoints; $i++) { ?>
                                    <li class="standings-table__outcome standings-table__outcome--loss">
                                        L
                                    </li>
                                    <?php
                                    } 
                                    ?>
                                </ul>
                            </td>
                        </tr>

                        <?php

                              }

                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.php';
    }
}
?>