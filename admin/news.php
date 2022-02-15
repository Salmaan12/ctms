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
            <a href="#" class="h1"><b>News</b></a>
        </div>
        <div class="card-body">
            <br>


            <form method="POST" action="database/newsForm.php" id="newsForm" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <input type="text" name="heading" id="heading" class="form-control" placeholder="News Heading"
                        required>
                </div>
                <div class="input-group mb-3">
                    <textarea name="description" id="description" class="form-control" placeholder="News Content"
                        required></textarea>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="image" name="image" type="file">
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" id="news" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <span id="result"></span>
            <!-- /.social-auth-links -->

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

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
                                    aria-label="Browser: activate to sort column ascending">Heading</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';

                              $query = "select * from news";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['heading'] ?></td>
                                <td><?php echo $res['description'] ?></td>
                                <td><?php echo $res['image'] ?></td>
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
$(document).ready(function() {
    $("#news").click(function(e) {
        e.preventDefault();

        if ($("#heading").val() == '' || $("#description").val() == '' || $("#image").val() == '') {
            toastr.error("Please Fill The Complete Form");
            return;
        }

        $.ajax({
            url: 'database/newsForm.php',
            //data: Object.fromEntries(new FormData($("#newsForm")[0]).entries()),
            data: new FormData($("#newsForm")[0]),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(e) {
                toastr.success("News Has Been Published On Web");
                $("#newsForm").submit(function() {
                    return false;
                });
            }
        });
        return false;
    });
});
</script>

<?php 
include('footer-bashboard.php');
          
          }
      }
?>