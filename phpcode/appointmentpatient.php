<?php
	include('database.php');
	$d_id = $_GET['d_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointment with Patient</title>
	<link rel="stylesheet" href="CSS/appointmentdoctor.css" type="text/css">
</head>
<body>
<div class="topnav"> <a class="active" href="index.php">Home</a> </div><br>
	<?php
		$day =  array("SATURDAY","SUNDAY","MONDAY", "TUESDAY" , "WEDNESDAY" , "THURSDAY" , "FRIDAY");
		echo '<table id="customers">'.'<tr>'.
				'<th>Day</th>'.
				'<th>Patient name</th>'.
				'<th>Location</th>'.
				'<th>Schedule</th>'.
				'<th>Serial</th>'.
				'<th>Prescription</th>'.
				'<th>Check-in</th>'.
				'<th>Check-out</th>'.
				'<th></th>'.
				'</tr>';


		for ($i=0; $i < 7; $i++) { 
				$query= 'SELECT appointment.*,concat (FIRST_NAME," ",LAST_NAME) AS PATIENT, concat(START," - ",END) AS SCHEDULE,schedule.*
						FROM appointment
						INNER JOIN user ON appointment.U_ID = user.U_ID
						INNER JOIN schedule ON appointment.S_ID = schedule.S_ID
						WHERE appointment.D_ID='.$d_id.' AND DAY LIKE "%'.$day[$i].'%"
						ORDER BY START;';


				$result = mysqli_query($conn, $query);
				$n = mysqli_num_rows($result);
				$daydone = false;
				$deletedone = false;
				
				
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>';
					if(!$daydone){
						echo '<td rowspan = "'.$n.'">'.$day[$i].'</td>';
						$daydone = true;
					}
					echo '<td><a href = "userpage.php?id='.$row['U_ID'].'">'.$row["PATIENT"].'</a></td> 
						<td>'.$row["LOCATION"].'</td>
						<td>'.$row["SCHEDULE"].'</td>
						<td>'.$row["SERIAL"].'</td>
						<td>'.$row["PRESCRIPTION"].'</td>
						<td>'.$row["CHECK_IN"].'</td>
						<td>'.$row["CHECK_OUT"].'</td>';
					if(!$deletedone){
						echo '<td rowspan = "'.$n.'"><a href = "deleteappointment.php?d_id='.$d_id.'&day='.$day[$i].'">  Clear</a></td>';
						$deletedone = true;
					}
					echo '</tr>';
				}
			}
			echo '</table>';


	?>


</body>
</html>