<?php  
include 'connection.php';

$con = new mysqli($server, $user, $password, $database);

// $con = new mysqli($server, $user, $password, $database);

$output = "";

 if(isset($_POST["id"]))  
 {  
    $id = $_POST["id"];
      $query = "select * from tournament_teams where id = $id";  
      $result = mysqli_query($con, $query);  
      // $row = mysqli_fetch_array($result);  
      // echo json_encode($row);
      $output .= '<form action="database/update_TRS.php" method="post" id="updateRegistrationStatus">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
           <input type="text" name="trId" id="trId" hidden value="'.$row['id'].'" class="form-control" />
           <br />
           <label>Current Status</label>
           <input type="text" name="status" id="status" value="'.$row['status'].'" class="form-control" />
           <br />
           <input type="submit" name="update" id="updateStatus" value="Update" class="btn btn-success" />  
           ';  
      }  
      $output .= '  
      </form> 
      ';
      echo $output;
 }
 ?>

<script type="text/javascript">
// user registration form data ajax

jQuery("#updateStatus").click(function() {
    jQuery.post(jQuery("#updateRegistrationStatus").attr("action"), jQuery("#updateRegistrationStatus :input")
        .serializeArray(),
        function(info) {
            jQuery("#result").html(info);
        });
});
jQuery("#updateRegistrationStatus").submit(function() {
    return false;
});
</script>