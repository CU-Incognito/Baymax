

<?php
	include('database.php'); 
	$s_id = $_GET['s_id'];
	$u_id = $_GET['u_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Take appointment</title>
	<link rel="stylesheet" href="CSS/appointmentformm.css" type="text/css">
</head>
<body>
	<?php
		$query_1 = "SELECT COUNT(D_ID)
					AS number
					FROM `appointment`
					WHERE S_ID=".$s_id.";";
		
     
		$result = mysqli_query($conn, $query_1);
		$row = mysqli_fetch_assoc($result);
		$serial = $row['number'];

		$query_2 = "SELECT `MAX_P`, `D_ID`,`date`
					FROM `schedule`
					WHERE S_ID = ".$s_id.";";

		$result = mysqli_query($conn, $query_2);
		$row = mysqli_fetch_assoc($result);
		$d_id = $row['D_ID'];
		$date=$row['date'];
		
		if($row['MAX_P']<=$serial){
			
			echo '<h1>We are Sorry!</h1><br>
			 	<h1>This schedule is filled up. If you want to try any other schedule please go back to previous page.<h1>';

		}

		else{

			echo '<h1>Your serial will be '.($serial+1).'<br>Your appointment date is '.$date.
			'<br> Please click the YES button to ensure your appointment.<br></h1>';
			echo '<h1><a href = "done.php?s_id='.$s_id.'&u_id='.$u_id.'&d_id='.$d_id.'&serial='.($serial+1).'"><button class="button"><span>YES</span></button></a></h1>';
		}	



	?>
</body>
</html>
