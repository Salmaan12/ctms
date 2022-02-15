<?php  
include 'connection.php';

// $con = new mysqli($server, $user, $password, $database);

// $con = new mysqli($server, $user, $password, $database);

$output = "";

 if(isset($_POST["id"]))  
 {  
    $id = $_POST["id"];
      $query = "select * from tournament_teams where id = $id";  
      $result = mysqli_query($con, $query);  
      $output .= '<div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>id</label></td>  
                     <td width="70%">'.$row['id'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tournament Name</label></td>  
                     <td width="70%">'.$row['tournamnet_id'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Team Name</label></td>  
                     <td width="70%">'.$row['team_id'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row['description'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$row['status'].'</td>  
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