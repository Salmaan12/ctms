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
            <a href="#" class="h1"><b>Performance</b></a>
        </div>
        <div class="card-body">
            <form method="POST" action="database/performanceform.php" id="performanceForm"
                enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="number" name="noOfMatches" id="noOfMatches" class="form-control"
                        placeholder="No Of Matches" required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="runs" id="runs" class="form-control" placeholder="Runs" required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="wickets" id="wickets" class="form-control" placeholder="Wickets"
                        required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="noOfSixes" id="noOfSixes" class="form-control" placeholder="No Of Sixes"
                        required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="noOfFours" id="noOfFours" class="form-control" placeholder="No Of Fours"
                        required>
                </div>

                <div class="input-group mb-3">
                    <select name="player_ID">
                        <option disabled selected>-- Select Player Name --</option>
                        <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select playerId,playerName from players");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['playerId'] . "'>" . $data['playerId'] . ' -- ' . $data['playerName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" id="performance" class="btn btn-primary btn-block">Submit</button>
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
                                    aria-label="Browser: activate to sort column ascending">No Of Matches</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Runs</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Wickets</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">No Of Sixes</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">No Of Fours</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Player Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from performance";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['noOfMatches'] ?></td>
                                <td><?php echo $res['runs'] ?></td>
                                <td><?php echo $res['wickets'] ?></td>
                                <td><?php echo $res['noOfSixes'] ?></td>
                                <td><?php echo $res['noOfFours'] ?></td>
                                <td>
                                    <?php
                                        $id = $res['player_ID'];
                                        $query1 = "SELECT playerName FROM `players` WHERE playerId = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['playerName'] 
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

<script type="text/javascript">
// user registration form data ajax

$("#performance").click(function() {

    if ($("#player_ID").val() == '' || $("#noOfFours").val() == '' || $("#noOfSixes").val() == '' ||
        $("#wickets").val() == '' || $("#runs").val() == '' || $('#noOfMatches').val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#performanceForm").attr("action"), $("#performanceForm :input").serializeArray(), function(
        info) {
        $("#result").html(info);
    });
});
$("#performanceForm").submit(function() {
    // alert('form was submitted');
    return false;
});

// $("#performance").click(function() {
//     var x = $("#performanceForm").serializeArray();
//     $.each(x, function(i, field) {
//         if (field.name == '' || field.value == '') {
//             toastr.error("Please Fill The Complete Form");
//         } else {
//             $("#performanceForm").submit(function() {
//                 return false;
//             });
//         }
//     });
// });
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>