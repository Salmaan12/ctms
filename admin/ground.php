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
            <a href="#" class="h1"><b>Ground</b></a>
        </div>
        <div class="card-body">
            <form method="POST" action="database/groundform.php" id="groundForm" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="text" name="groundName" id="groundName" class="form-control"
                        placeholder="Enter Ground Name" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="groundLocation" id="groundLocation" class="form-control"
                        placeholder="Enter Ground Location" required>
                </div>
                <div class="input-group mb-3">
                    <select name="sponser_id">
                        <option disabled selected>-- Select Sponser --</option>
                        <?php
                            include 'database/connection.php';
                            $records = mysqli_query($con,"select sponser_id,SponserName from sponser");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['sponser_id'] . "'>" . $data['sponser_id'] . ' -- ' . $data['SponserName'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" id="ground" class="btn btn-primary btn-block">Submit</button>
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
                                    aria-label="Browser: activate to sort column ascending">Ground Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Ground Location</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Sponser</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from ground";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['ground_id'] ?></td>
                                <td><?php echo $res['groundName'] ?></td>
                                <td><?php echo $res['groundLocation'] ?></td>
                                <td>
                                    <?php
                                        $id = $res['sponser_id'];
                                        $query1 = "SELECT SponserName FROM `sponser` WHERE sponser_id = $id";
                                        $queryfire1 = mysqli_query($con, $query1);
                                        $res1 = mysqli_fetch_array($queryfire1);
                                        echo $res1['SponserName'] 
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

// $("#ground").click(function() {
//     var x = $("#groundForm").serializeArray();
//     $.each(x, function(i, field) {
//         if (field.name == '' || field.value == '') {
//             toastr.error("Please Fill The Complete Form");
//         } else {
//             $("#groundForm").submit(function() {
//                 return false;
//             });
//         }
//     });
// });

$("#ground").click(function() {

    if ($("#sponser_id").val() == '' || $("#groundLocation").val() == '' || $("#groundName").val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#groundForm").attr("action"), $("#groundForm :input").serializeArray(), function(
        info) {
        $("#result").html(info);
    });
});
$("#groundForm").submit(function() {
    return false;
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>