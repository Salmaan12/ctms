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
                                    aria-label="Browser: activate to sort column ascending">Team Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Payment Id</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Payment Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Payment Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                              include 'database/connection.php';
                            //   $id = $_SESSION['id'];
                              $query = "select tt.id, tt.tournamnet_id, tt.team_id, pc.payment_id, pc.date, pc.payment_status, tt.status from tournament_teams as tt inner join payment_confirmation as pc on tt.id = pc.tournament_team_id";

                              $queryfire = mysqli_query($con, $query);

                              while ($res = mysqli_fetch_array($queryfire)) {

                            ?>

                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td>
                                    <?php
                                    $id = $res['tournamnet_id'];
                                    $query1 = "SELECT tournamentName FROM `tournament` WHERE id = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['tournamentName'] 
                                ?>
                                </td>
                                <td>
                                    <?php
                                    $id = $res['team_id'];
                                    $query1 = "SELECT TeamName FROM `team` WHERE TeamId = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res1 = mysqli_fetch_array($queryfire1);
                                    echo $res1['TeamName'] 
                                ?>
                                </td>
                                <td><?php echo $res['payment_id'] ?></td>
                                <td><?php echo $res['date'] ?></td>
                                <td><?php echo $res['payment_status'] ?></td>
                                <td><?php echo $res['status'] ?></td>
                                <td><button class="btn btn-primary edit_data" name="edit" value="edit"
                                        id="<?php echo $res['id'] ?>">update</button>
                                <td><input type="button" name="view" value="view" id="<?php echo $res['id']; ?>"
                                        class="btn btn-secondary view_data" /></td>
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


<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Team Status</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="fetchData">
                <!-- <form method="post" id="insert_form">
                    <label>Player Name</label>
                    <input type="text" name="playerName" id="playerName" class="form-control" />
                    <br />
                    <label>Player Stats</label>
                    <input type="text" name="playerStats" id="playerStats" class="form-control"></input>
                    <br />
                    <label>Player Contact No</label>
                    <input type="number" name="playerContactNo" id="playerContactNo" class="form-control" />
                    <br />
                    <input type="hidden" name="playerId" id="playerId" />
                    <input type="submit" name="insert" id="insert" value="Update" class="btn btn-success" />
                </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registration Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="employee_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
// user registration form data ajax

jQuery(document).on('click', '.edit_data', function() {
    var id = jQuery(this).attr('id');
    jQuery.ajax({
        url: "database/fetch.php",
        type: 'POST',
        data: {
            id: id
        },
        // dataType: "json",
        success: function(data) {
            jQuery('#fetchData').html(data);
            jQuery('#add_data_Modal').modal('show');
            // console.log(data)
            // var result = JSON.parse(data) || jQuery.parseJSON(data);
            // jQuery('#playerName').val(result.playerName);
            // jQuery('#playerStats').val(result.playerStats);
            // jQuery('#playerContactNo').val(result.playerContactNo);
            // jQuery('#playerId').val(data.playerId);
        }

    });
});

jQuery(document).on('click', '.view_data', function() {
    var id = jQuery(this).attr("id");
    if (id != '') {
        jQuery.ajax({
            url: "database/select.php",
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                jQuery('#employee_detail').html(data);
                jQuery('#dataModal').modal('show');
            }
        });
    }
});
</script>


<?php 
include('footer-bashboard.php');
          
          }
      }
?>