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
            <a href="#" class="h1"><b>User</b></a>
        </div>
        <div class="card-body">
            <br>


            <form action="database/userregform.php" method="POST" id="regForm" enctype="multipart/form-data">


                <div class="input-group mb-3">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="repass" id="re_type_pass" class="form-control"
                        placeholder="Re Type Password" required>
                </div>

                <div class="row">
                    <!-- <div class="col-8">
            <div class="icheck-primary">
              <input id="img" name="img" type="file">
            </div>
          </div> -->
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" id="createAcct" name="submit"
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
                                    aria-label="Browser: activate to sort column ascending">First Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Last Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Password</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Re Type Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                          include 'database/connection.php';

                          $query = "select * from user";

                          $queryfire = mysqli_query($con, $query);

                          while ($res = mysqli_fetch_array($queryfire)) {

                        ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['fname'] ?></td>
                                <td><?php echo $res['lname'] ?></td>
                                <td><?php echo $res['email'] ?></td>
                                <td><?php echo $res['password'] ?></td>
                                <td><?php echo $res['re_type_pass'] ?></td>
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


$("#createAcct").click(function() {

    if ($("#re_type_pass").val() == '' || $("#password").val() == '' || $("#email").val() == '' ||
        $("#lname").val() == '' || $("#fname").val() == '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#regForm").attr("action"), $("#regForm :input").serializeArray(), function(info) {
        $("#result").html(info);
    });
});
$("#regForm").submit(function() {
    return false;
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>