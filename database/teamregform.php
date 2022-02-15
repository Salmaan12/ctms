<?php

        include 'connection.php';
        //echo '<script> $(document).ready(function(){ toastr.error("'+$_POST+'"); }); </script>';
        $teamName = $_POST['teamname'];
		$captainName = $_POST['captainname'];
		$captainEmail = $_POST['captainemail'];
		$captainNo = $_POST['captainno'];
		$teamLogo = $_FILES['teamlogo'];
		// $teamlogo = $_FILES['teamlogo'];

		// Process the image that is uploaded by the user
	  
		$target_dir = "../images/";
		$target = "images/";
		$target_file = $target_dir  . basename($_FILES['teamlogo']["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	  
		if (move_uploaded_file($_FILES['teamlogo']["tmp_name"], $target_file)) {
		//   echo "The file has been uploaded.";
		  echo '<script> $(document).ready(function(){ toastr.success("The file has been uploaded."); }); </script>';
		} else {
		  echo '<script> $(document).ready(function(){ toastr.success("Sorry, there was an error uploading your file."); }); </script>';
		}
		$teamLogo = $target_file; // used to store the filename in a variable

        echo($teamName . $captainName . $captainNo . $teamLogo);

		$player1Name = $_POST['playername1'];
		$player1Stats = $_POST['player1'];
		$player2Name = $_POST['playername2'];
		$player2Stats = $_POST['player2'];
		$player3Name = $_POST['playername3'];
		$player3Stats = $_POST['player3'];
		$player4Name = $_POST['playername4'];
		$player4Stats = $_POST['player4'];
		$player5Name = $_POST['playername5'];
		$player5Stats = $_POST['player5'];
		$player6Name = $_POST['playername6'];
		$player6Stats = $_POST['player6'];
		$player7Name = $_POST['playername7'];
		$player7Stats = $_POST['player7'];
		$player8Name = $_POST['playername8'];
		$player8Stats = $_POST['player8'];
		$player9Name = $_POST['playername9'];
		$player9Stats = $_POST['player9'];
		$player10Name = $_POST['playername10'];
		$player10Stats = $_POST['player10'];
		$player11Name = $_POST['playername11'];
		$player11Stats = $_POST['player11'];

		$subject = "Welcome to CTMS Family";

		function randomPassword() {
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}

		$passwordCaptain = randomPassword();

		$msg = "Dear Captain.. $captainName now you can access your portal for changing in team members... Your Email: $captainEmail  Your Password: $passwordCaptain";

		if(mail($captainEmail, $subject, $msg)) {
			echo '<script> $(document).ready(function(){ toastr.success("Email successfully sent to ' + $captainEmail+'"); }); </script>';
		} else {
			echo '<script> $(document).ready(function(){ toastr.error("Email not send"); }); </script>';
		}

		// echo $teamName.$captainName.$captainEmail.$captainNo.$teamLogo.$player1Name.$player1Stats.$msg;

		$sql = "insert into team(`TeamName`,`TeamLogo`,`CaptainName`,`CaptainEmail`,`CaptainContactNo`) VALUES ('$teamName','$teamLogo','$captainName','$captainEmail','$captainNo')";
		if ($con->query($sql) == TRUE) {
			$last_id = $con->insert_id;
			// echo $last_id;

			$sql1 = "insert into players(`playerName`, `playerStats`,`team_id`) 
				VALUES ('$player1Name','$player1Stats',$last_id),
				('$player2Name','$player2Stats',$last_id),
				('$player3Name','$player3Stats',$last_id),
				('$player4Name','$player4Stats',$last_id),
				('$player5Name','$player5Stats',$last_id),
				('$player6Name','$player6Stats',$last_id),
				('$player7Name','$player7Stats',$last_id),
				('$player8Name','$player8Stats',$last_id),
				('$player9Name','$player9Stats',$last_id),
				('$player10Name','$player10Stats',$last_id),
				('$player11Name','$player11Stats',$last_id)";
			// echo $sql1;
			if ($con->query($sql1) == TRUE) {

				$sql2 = "insert into `captain`(`captainName`, `email`, `contactNumber`, `password`, `team_id`) VALUES ('$captainName','$captainEmail','$captainNo','$passwordCaptain','$last_id')";

				if ($con->query($sql2) == TRUE) {

				// header('Location:http://localhost/ctms/index.php');
                echo '<script> $(document).ready(function(){ toastr.success("Team has been Created Successfully"); }); </script>';
				echo '<script> $(document).ready(function(){ toastr.success("Heyy! Captain please check your Email"); }); </script>';
			}
			// header('location:comdatainsert.php');
		}
	 }
	  else {
			// echo "Error: " . $sql . "<br>" . $sql1 . "<br>" . $con->error;
            echo '<script> $(document).ready(function(){ toastr.error("Error: " . $sql . "<br>" . $sql1 . "<br>" . $con->error); }); </script>';
            // echo '<script type="text/javascript">alert("' . "Your Email Already Exist!" . '");</script>';
		}

?>