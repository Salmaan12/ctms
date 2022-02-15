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
            <a href="#" class="h1"><b>Fixture</b></a>
        </div>
        <div class="card-body">
            <form method="POST" action="database/fixtureform.php" id="fixtureForm" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <select name="tournament_id">
                        <option disabled selected>-- Select Tournament --</option>
                        <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select id,tournamentName from tournament");
                            // $tournamentId = $_POST['tournament_id'];

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['id'] . "'>" . $data['id'] . ' -- ' . $data['tournamentName'] . "</option>";  // displaying data in option menu
                                // $tournamentId = $data['id'];
                            }
                            ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select name="TeamA">
                        <option disabled selected>-- Team A --</option>
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
                    <select name="TeamB">
                        <option disabled selected>-- Team B --</option>
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
                    <input type="date" name="Date" id="date " class="form-control" placeholder="select date" required>
                </div>

                <div class="input-group mb-3">
                    <input type="time" name="Time" id="time" class="form-control" placeholder="Time" required>
                </div>

                <div class="input-group mb-3">
                    <select name="ground_id">
                        <option disabled selected>-- Select Ground --</option>
                        <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select ground_id,groundName from ground");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['ground_id'] . "'>" . $data['ground_id'] . ' -- ' . $data['groundName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" id="fixture" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <span id="result"></span>
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

                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team A</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team B</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Ground</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tournament</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from fixtures";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['fixtureid'] ?></td>
                                <td>
                                    <?php
                                    $id = $res['teamid1'];
                                    $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['TeamName'] 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $id = $res['teamid2'];
                                    $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['TeamName'] 
                                    ?>
                                </td>
                                <td><?php echo $res['date'] ?></td>
                                <td><?php echo $res['time'] ?></td>
                                <td>
                                    <?php
                                    $id = $res['venueId'];
                                    $query1 = "SELECT groundName FROM `ground` WHERE ground_id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['groundName'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $id = $res['tournamentid'];
                                    $query1 = "SELECT tournamentName FROM `tournament` WHERE id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['tournamentName'];
                                    ?>
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
    </div>
    <!-- /.card-body -->
</div>

<!-- <script>
$("select[name='tournament_id']").change(function() {
    var TourID = $(this).val();
    if (TourID) {
        $.ajax({
            url: "database/selectTeam.php",
            dataType: 'Json',
            data: {
                'tournament_id': TourID
            },
            success: function(data) {
                $('select[name="TeamA"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="TeamA"]').append('<option value="' + key + '">' +
                        value + '</option>');
                });
            }
        });


    } else {
        $('select[name="TeamA"]').empty();
    }
});
</script> -->

<script type="text/javascript">
// user registration form data ajax

$("#fixture").click(function() {
    var x = $("#fixtureForm").serializeArray();
    $.each(x, function(i, field) {
        if (field.name == '' || field.value == '') {
            toastr.error("Please Fill The Complete Form");
        } else {
            $("#fixtureForm").submit(function() {
                return false;
            });
        }
    });
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>