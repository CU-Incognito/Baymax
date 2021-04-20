<?php
	include('database.php');
	$u_id = $_GET['u_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointment with Doctor</title>
	<link rel="stylesheet" href="CSS/appointmentdoctor.css" type="text/css">
</head>
<body>
<div class="topnav"> <a class="active" href="index.php">Home</a> </div><br>
	<?php
		$query= 'SELECT userappointment.*,concat (FIRST_NAME," ",LAST_NAME) AS DOCTOR, concat(START," - ",END) AS SCHEDULE,schedule.*
				FROM userappointment
				INNER JOIN user ON userappointment.D_ID = user.U_ID
				INNER JOIN schedule ON userappointment.S_ID = schedule.S_ID
				WHERE userappointment.U_ID='.$u_id.';';
        
		$result = mysqli_query($conn, $query);

		echo '<table id="customers">'.'<tr>'.
				'<th>Doctor name</th>'.
				'<th>Location</th>'.
				'<th>Day</th>'.
				'<th>Schedule</th>'.
				'<th>Serial</th>'.
				'<th>Prescription</th>'.
				'<th>Check-in</th>'.
				'<th>Check-out</th>'.
				'</tr>';

       
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr><td><a href = "userpage.php?id='.$row['D_ID'].'">'.$row["DOCTOR"].'</a></td><td>'.$row["LOCATION"].'</td><td>'.$row["DAY"].'</td><td>'.$row["SCHEDULE"].'</td>';
			echo '<td>'.$row["SERIAL"].'</td><td>'.$row["PRESCRIPTION"].'</td><td>'.$row["CHECK_IN"].'</td><td>'.$row["CHECK_OUT"].'</td></tr>';
		}
		echo '</table>';

	?>


</body>
</html>