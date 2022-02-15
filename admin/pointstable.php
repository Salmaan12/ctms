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

<div class="container col-md-5">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Points Table</b></a>
        </div>
        <div class="card-body">
            <br>


            <form method="POST" action="database/pointstableform.php" id="pointstableform"
                enctype="multipart/form-data">


                <div class="input-group mb-3">
                    <input type="number" name="loosingPoints" id="loosingPoints " class="form-control"
                        placeholder="Loosing Points" required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="winningPoints" id="winningPoints" class="form-control"
                        placeholder="Winning Points" required>
                </div>

                <div class="input-group mb-3">
                    <select name="Team_ID">
                        <option disabled selected>-- Select Team --</option>
                        <?php
                            include 'database/connection.php';
                            $success = "success";
                            $records = mysqli_query($con,"select * from tournament_teams where status = '$success'");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['team_id'] . "'>" . $data['tournamnet_id'] . ' -- ' . 
                                $id = $data['team_id'];
                                $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                $queryfire1 = mysqli_query($con, $query1);
                                $res1 = mysqli_fetch_array($queryfire1);
                                echo $res1['TeamName'] . "</option>";  // displaying data in option menu
                            }
                        ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="noOfMatches" id="noOfMatches" class="form-control"
                        placeholder="No Of Matches" required>
                </div>

                <!-- <div class="input-group mb-3">
                    <input type="number" step=any name="run_rate" id="run_rate" class="form-control"
                        placeholder="Run Rate" required>
                </div> -->

                <div class="input-group mb-3">
                    <input type="number" name="tied" id="tied" class="form-control" placeholder="Tied" required>
                </div>

                <!-- <div class="input-group mb-3">
                    <input type="number" name="points" id="points" class="form-control" placeholder="Points" required>
                </div> -->
                <div class="input-group mb-3">
                    <select name="Tournament_ID">
                        <option disabled selected>-- Select Tournament --</option>
                        <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select id,tournamentName from tournament");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['id'] . "'>" . $data['id'] . ' -- ' . $data['tournamentName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                    </select>
                </div>



                <div class="row">
                    <!-- <div class="col-8">
            <div class="icheck-primary">
              <input id="img" name="img" type="file">
            </div>
          </div> -->
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" id="pointsTable" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>

                <br>



            </form>
            <span id="result"></span>
            <!-- /.social-auth-links -->

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<br>




<div class="card">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tournament Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">No Of Matches</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Win</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Loss</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tied</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "SELECT * FROM `points_table` ORDER by `winningPoints` DESC";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td>
                                    <?php
                                    $id = $res['tournament_ID'];
                                    $query1 = "SELECT tournamentName FROM `tournament` WHERE id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['tournamentName'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $id = $res['team_ID'];
                                    $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['TeamName'] 
                                    ?>
                                </td>
                                <td><?php echo $res['noOfMatches'] ?></td>
                                <td><?php echo $res['winningPoints'] ?></td>
                                <td><?php echo $res['loosingPoints'] ?></td>
                                <td><?php echo $res['tied'] ?></td>
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
    <!-- /.card-body -->
</div>

<script type="text/javascript">
// user registration form data ajax

// $("#pointsTable").click(function() {
//     var x = $("#pointstableform").serializeArray();
//     $.each(x, function(i, field) {
//         if (field.name == '' || field.value == '') {
//             toastr.error("Please Fill The Complete Form");
//         } else {
//             $("#pointstableform").submit(function() {
//                 return false;
//             });
//         }
//     });
// });


$("#pointsTable").click(function() {

    if ($("#loosingPoints").val() == '' || $("#winningPoints").val() == '' || $("#Team_ID").val() == '' ||
        $("#noOfMatches").val() == '' || $("#tied").val() == '' ||
        $("#Tournament_ID").val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#pointstableform").attr("action"), $("#pointstableform :input").serializeArray(), function(
        info) {
        $("#result").html(info);
    });
});
$("#pointstableform").submit(function() {
    return false;
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>