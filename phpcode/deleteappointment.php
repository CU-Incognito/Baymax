<?php
	include('database.php');
	$d_id = $_GET['d_id'];
	$day = $_GET['day'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Appointment</title>
</head>
<body>
	<?php
		$query1 = 'SELECT `S_ID`
					FROM `schedule`
					WHERE D_ID='.$d_id.' AND DAY = "'.$day.'";';
		//echo $query1;
	
		$result = mysqli_query($conn, $query1);
		while($row = mysqli_fetch_assoc($result)){
			$query2 = 'DELETE FROM `appointment` WHERE S_ID='.$row['S_ID'].';';
			//echo $query2;
			$delete = mysqli_query($conn, $query2);
		}
		header("Location: appointmentpatient.php?d_id=".$d_id);

	?>

</body>
</html>