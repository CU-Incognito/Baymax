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
		$query= 'SELECT concat (FIRST_NAME," ",LAST_NAME) AS DOCTOR,PRESCRIPTION,D_ID
				FROM userappointment
				INNER JOIN user ON userappointment.D_ID = user.U_ID
				WHERE userappointment.U_ID='.$u_id.' AND userappointment.PRESCRIPTION IS NOT NULL;';
        
		$result = mysqli_query($conn, $query);

		echo '<table id="customers">'.'<tr>'.
				'<th>Doctor name</th>'.
				'<th>Prescription</th>'.
				'</tr>';

       
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr><td><a href = "userpage.php?id='.$row['D_ID'].'">'.$row["DOCTOR"].'</a></td><td>'.$row["PRESCRIPTION"].'</td></tr>';
		}
		echo '</table>';

	?>


</body>
</html>