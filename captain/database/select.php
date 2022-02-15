<?php  
include 'connection.php';

// $con = new mysqli($server, $user, $password, $database);

// $con = new mysqli($server, $user, $password, $database);

$output = "";

 if(isset($_POST["playerId"]))  
 {  
    $id = $_POST["playerId"];
      $query = "select * from players where playerId = $id";  
      $result = mysqli_query($con, $query);  
      $output .= '<div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Player Name</label></td>  
                     <td width="70%">'.$row['playerName'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Player Stats</label></td>  
                     <td width="70%">'.$row['playerStats'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Player Contact Number</label></td>  
                     <td width="70%">'.$row['playerContactNo'].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>