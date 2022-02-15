<?php  
include 'connection.php';

$con = new mysqli($server, $user, $password, $database);

// $con = new mysqli($server, $user, $password, $database);

$output = "";

 if(isset($_POST["playerId"]))  
 {  
    $id = $_POST["playerId"];
      $query = "select * from players where playerId = $id";  
      $result = mysqli_query($con, $query);  
      // $row = mysqli_fetch_array($result);  
      // echo json_encode($row);
      $output .= '<form action="database/update_Player.php" method="post" id="updatePlayerForm">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
           <input type="text" name="playerId" id="playerId" hidden value="'.$row['playerId'].'" class="form-control" />
           <br />
           <label>Player Name</label>
           <input type="text" name="playerName" id="playerName" value="'.$row['playerName'].'" class="form-control" />
           <br />
           <label>Player Stats</label>
           <input type="text" name="playerStats" id="playerStats" value="'.$row['playerStats'].'" class="form-control"></input>
           <br />
           <label>Player Contact No</label>
           <input type="number" name="playerContactNo" id="playerContactNo" value="'.$row['playerContactNo'].'" class="form-control" />
           <br />
           <input type="submit" name="update" id="updatePlayer" value="Update" class="btn btn-success" />  
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

jQuery("#updatePlayer").click(function() {
    jQuery.post(jQuery("#updatePlayerForm").attr("action"), jQuery("#updatePlayerForm :input").serializeArray(),
        function(info) {
            jQuery("#result").html(info);
        });
});
jQuery("#updatePlayerForm").submit(function() {
    return false;
});
</script>