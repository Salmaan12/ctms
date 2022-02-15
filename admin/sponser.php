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
            <a href="#" class="h1"><b>Sponser</b></a>
        </div>
        <div class="card-body">
            <form method="POST" action="database/sponserform.php" id="sponserForm" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="text" name="SponserName" id="SponserName " class="form-control"
                        placeholder="Enter Sponser Name" required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="SponserAmount" id="SponserAmount" class="form-control"
                        placeholder="Enter Sponser Amount" required>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="SponserEmail" id="SponserEmail" class="form-control"
                        placeholder="Enter Sponser Email" required>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" id="sponser" class="btn btn-primary btn-block">Submit</button>
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
                                    aria-label="Browser: activate to sort column ascending">Sponser Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Sponser Amount</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Sponser Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from sponser";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['sponser_id'] ?></td>
                                <td><?php echo $res['SponserName'] ?></td>
                                <td><?php echo $res['SponserAmount'] ?></td>
                                <td><?php echo $res['SponserEmail'] ?></td>
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

$("#sponser").click(function() {
    var x = $("#sponserForm").serializeArray();
    $.each(x, function(i, field) {
        if (field.name == '' || field.value == '') {
            toastr.error("Please Fill The Complete Form");
        } else {
            $("#sponserForm").submit(function() {
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