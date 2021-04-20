<?php
	include('database.php');
	$d_id = $_GET['d_id'];
	echo '<a href="index.php">Home</a><br>';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor page</title>
	<style>
body {
  background-color: #197070;
}
</style>
</head>
<body>
	<?php
		if(isset($_GET['msg'])) echo $_GET['msg'];



		//login session
   		session_start();
   		$loggedin = true;
   		if(isset($_SESSION['login_user'])){
   			$user_check = $_SESSION['login_user'];

   			$query = 'SELECT *
					FROM `user`
					WHERE EMAIL="'.$user_check.'";';

			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			if($loggedin) $u_id = $row['U_ID'];

			if($count != 1) $loggedin= false;
   		}
	   	else $loggedin= false;
		


		$query= "SELECT *
				FROM `doctor`, `user`
				WHERE U_ID=".$d_id." AND D_ID=".$d_id.";";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		
		$name = $row['FIRST_NAME']." ".$row['LAST_NAME'];
		$info = $row['INFO'];
		$gender = $row['GENDER'];
		$contact = $row['CONTACT'];
		$email = $row['EMAIL'];
		$rating = $row['RATING'];
		$fee = $row['FEE'];

		echo $name,"<br>";
		echo "Other Info: ",$info,"<br>";
		echo "Gender: ",$gender,"<br>";
		echo "Contact No: ", $contact,"<br>";
		echo "Email: ",$email."<br>";
		echo "Fee: ",$fee,"<br>";

		echo "Schedule: <br>";
		
		$day =  array("SATURDAY","SUNDAY","MONDAY", "TUESDAY" , "WEDNESDAY" , "THURSDAY" , "FRIDAY");
		

		echo "<table><tr>
				<th>Day</th>
				<th>Start</th>
				<th>End</th>
				<th>Location</th>
				<th>Click for Appointment</th>
				</tr>";

		for ($i=0; $i < 7; $i++) { 
			
			$schedule = 'SELECT * 
					FROM `schedule`
					WHERE D_ID='.$d_id.' AND DAY LIKE "%'.$day[$i].'%"
					ORDER BY START;';

			$result = mysqli_query($conn, $schedule);

			
			//echo mysqli_num_rows($result);
			while($row = mysqli_fetch_assoc($result)){
				$s_id = $row['S_ID'];
				if($loggedin) $page = '"appointmentform.php?s_id='.$s_id.'&u_id='.$u_id.'"';
				else{
					$msg = "Please Log in first!";
					$page = '"login.php?msg='.$msg.'"';
				}

				echo '<tr><td>'.$day[$i].'</td> <td>'.$row['START'].'</td> <td>'.$row['END'].'</td> <td>'.$row['LOCATION'].'</td> <td><a href='.$page.'>Appointment</a></td></tr>';
			}


			
		}
		echo "</table>";

	?>
	
</body>
</html>