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
        <h1 data-generated="Contact">Team Register</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="team-reg.php" class="active"> Team Register </a> </li>
            </ul>
        </div>
    </div>
</section>


<div class="team-reg">
    <div class="container marginleftright">
        <div class="row">
            <div class="col-md-12">
                <h3 class="decorated" style="margin: 5% 0%;"><span>Register Your Cricket Team</span></h3>
            </div>
            <div class="col-md-8 col-sm-12">
                <form action="database/teamregform.php" method="POST" id="TeamRegForm" enctype="form-data/multipart">
                    <div class="form-group">
                        <label for="exampleInputTeamName">Team Name</label>
                        <input type="text" name="teamname" id="teamname" class="form-control" placeholder="Team Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Team Logo</label>
                        <input type="file" id="exampleInputFile" name="teamlogo" id="teamlogo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTeamName">Captain's Name</label>
                        <input type="text" name="captainname" id="captainname" class="form-control"
                            placeholder="Captain's Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTeamName">Captain's Email</label>
                        <input type="email" name="captainemail" id="captainemail" class="form-control"
                            placeholder="Captain's Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTeamName">Captain's Contact Number</label>
                        <input type="text" name="captainno" id="captainno" class="form-control"
                            placeholder="03XXXXXXXXXX" required>
                    </div>
                    <h3>Team Player's Name With Stats</h3>
                    <p style="color: red;">** You can select Maximum 5 batsman, 3 All Rounders & 5 Bowlers in a Team</p>
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">1</span>
                                    <input type="text" name="playername1" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player1">
                                    <option value="batsman">Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">2</span>
                                    <input type="text" name="playername2" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player2">
                                    <option value="batsman">Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">3</span>
                                    <input type="text" name="playername3" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player3">
                                    <option value="batsman">Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">4</span>
                                    <input type="text" name="playername4" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player4">
                                    <option value="batsman">Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">5</span>
                                    <input type="text" name="playername5" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player5">
                                    <option value="batsman">Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">6</span>
                                    <input type="text" name="playername6" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player6">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler" disabled>Bowler</option>
                                    <option value="allrounder">All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">7</span>
                                    <input type="text" name="playername7" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player7">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler">Bowler</option>
                                    <option value="allrounder">All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">8</span>
                                    <input type="text" name="playername8" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player8">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler">Bowler</option>
                                    <option value="allrounder">All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">9</span>
                                    <input type="text" name="playername9" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player9">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler">Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">10</span>
                                    <input type="text" name="playername10" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player10">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler">Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- input player name with stats  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">11</span>
                                    <input type="text" name="playername11" class="form-control"
                                        aria-describedby="playername1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="player11">
                                    <option value="batsman" disabled>Batsman</option>
                                    <option value="bowler">Bowler</option>
                                    <option value="allrounder" disabled>All-Rounder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <div class="checkbox">
                        <label><input type="checkbox" name="">
                            <p>By creating an account, You agree to our <span class="t&policy"><a href="">Term &
                                        Condition</a></span></p>
                        </label>
                        <!-- <span><a href="">Forgot Password?</a></span> -->
                    </div>
                    <button id="createTeam" name="confirmTeam" class="btn btn_teamconfirm btn-block"
                        type="submit">REQUEST FOR TEAM REGISTRATION</button>
                </form>
                <!-- <span id="result"></span> -->
            </div>
            <div class="col-md-4" style="margin-top: 28%;">
                <img src="https://i.gifer.com/origin/aa/aaf644505b7662c316c53ef935370bc6.gif" alt="" width="430">
            </div>
        </div>
    </div>
</div>


<br><br>

<script type="text/javascript">
$(document).ready(function() {
    $("#createTeam").click(function(e) {
        e.preventDefault();

        if ($("#teamname").val() == '' || $("#teamlogo").val() == '' || $("#captainname").val() == '' ||
            $("#captainemail").val() == '' || $("#captainno").val() == '') {
            toastr.error("Please Fill The Complete Form");
            return;
        }

        $.ajax({
            url: 'database/teamregform.php',
            //data: Object.fromEntries(new FormData($("#TeamRegForm")[0]).entries()),
            data: new FormData($("#TeamRegForm")[0]),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(e) {
                toastr.success("Team has been Created Successfully");
            },
            error: function(e) {
                toastr.error(e);
            }

        });
        return false;
    });
    $("#TeamRegForm").submit(function() {
        return false;
    });
});
</script>

<?php 
include 'footer.php';
        }
    }
    ?>