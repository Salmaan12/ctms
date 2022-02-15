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
            <a href="#" class="h1"><b>Tournament</b></a>
        </div>
        <div class="card-body">
            <br>


            <form method="POST" action="database/tournamentregform.php" id="tournamentRegForm"
                enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="text" name="tournamentName" id="TournamentName " class="form-control"
                        placeholder="Tournament Name" required>
                </div>
                <div class="input-group mb-3">
                    <input type="date" name="tournamentStartDate" id="TournamentStartDate" class="form-control"
                        placeholder="Tournament Start Date" required>
                </div>
                <div class="input-group mb-3">
                    <input type="date" name="tournamentEndDate" id="TournamentEndDate" class="form-control"
                        placeholder="Tournament Endt Date" required>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="noOfMatches" id="NoOfMatches" class="form-control"
                        placeholder="No Of Matches" required>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="noOfTeams" id="NoOfTeams" class="form-control"
                        placeholder="Maximum Team Limit" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="venue" id="venue" class="form-control" placeholder="Venue" required>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="winningPrice" id="winningPrice" class="form-control"
                        placeholder="Winning Price" required>
                </div>
                <div class="row">
                    <!-- <div class="col-8">
            <div class="icheck-primary">
              <input id="img" name="img" type="file">
            </div>
          </div> -->
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" id="createTournament" name="submit"
                            class="btn btn-primary btn-block">Submit</button>
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

                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tournament Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tournament Start Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tournament End Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">No Of Matches</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">No Of Teams Allowed</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Venue</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Winning Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from tournament";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['tournamentName'] ?></td>
                                <td><?php echo $res['tournamentStartDate'] ?></td>
                                <td><?php echo $res['tournamentEndDate'] ?></td>
                                <td><?php echo $res['noOfMatches'] ?></td>
                                <td><?php echo $res['noOfTeams'] ?></td>
                                <td><?php echo $res['venue'] ?></td>
                                <td><?php echo $res['winningPrice'] ?></td>
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

<br><br><br><br>


<script type="text/javascript">
// user registration form data ajax

$("#createTournament").click(function() {

    if ($("#winningPrice").val() == '' || $("#venue").val() == '' || $("#NoOfTeams").val() == '' ||
        $("#NoOfMatches").val() == '' || $("#TournamentEndDate").val() == '' || $("#TournamentStartDate")
        .val() == '' || $("#TournamentName")
        .val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#tournamentRegForm").attr("action"), $("#tournamentRegForm :input").serializeArray(), function(
        info) {
        $("#result").html(info);
    });
});
$("#tournamentRegForm").submit(function() {
    return false;
});
</script>


<?php 
include('footer-bashboard.php');
          
          }
      }
?>