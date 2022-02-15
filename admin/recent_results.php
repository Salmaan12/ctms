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
            <a href="#" class="h1"><b>Recent Result Record</b></a>
        </div>
        <div class="card-body">
            <br>


            <form method="POST" action="database/recentResultform.php" id="recentResultform"
                enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <input type="text" name="team_A" id="team_A " class="form-control" placeholder="Enter Team A Name"
                        required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="team_B" id="team_B " class="form-control" placeholder="Enter Team B Name"
                        required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="team_A_score" id="team_A_score " class="form-control"
                        placeholder="Enter Team A Score" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="team_B_score" id="team_B_score" class="form-control"
                        placeholder="Enter Team B Score" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" id="recentResult" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>

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
                                    aria-label="Browser: activate to sort column ascending">Team A Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team B Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team A Score</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Team B Score</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tied</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "SELECT * FROM `recent_results`";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['team_A'] ?></td>
                                <td><?php echo $res['team_B'] ?></td>
                                <td><?php echo $res['team_A_score'] ?></td>
                                <td><?php echo $res['team_B_score'] ?></td>
                                <td><?php echo $res['status'] ?></td>
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
$("#recentResult").click(function() {

    if ($("#status").val() == '' || $("#team_B_score").val() == '' || $("#team_A_score").val() == '' ||
        $("#team_B").val() == '' || $("#team_A").val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#recentResultform").attr("action"), $("#recentResultform :input").serializeArray(), function(
        info) {
        $("#result").html(info);
    });
});
$("#recentResultform").submit(function() {
    return false;
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>