<?php
	include('database.php');
	$d_id = $_GET['d_id'];
	$u_id = $_GET['u_id'];
	$s_id = $_GET['s_id'];
	$day = $_GET['day'];
	$serial = $_GET['serial'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Save Prescription</title>
</head>
<body>
	<?php

		$query1 = 'UPDATE `appointment` 
				  SET `CHECK_IN`="'.$_POST['checkin']
				  .'",`CHECK_OUT`="'.$_POST['checkout']
				  .'",`PRESCRIPTION`="'.$_POST['prescription'].'" 
				  WHERE S_ID='.$s_id.' AND U_ID='.$u_id.';';
				  echo $query1;
		
		$result1 = mysqli_query($conn, $query1);

		$query2 = 'UPDATE `userappointment` 
				  SET `CHECK_IN`="'.$_POST['checkin']
				  .'",`CHECK_OUT`="'.$_POST['checkout']
				  .'",`PRESCRIPTION`="'.$_POST['prescription'].'" 
				  WHERE S_ID='.$s_id.' AND U_ID='.$u_id.';';
		$result2 = mysqli_query($conn, $query2);

		if($result1 && $result2) header("Location: workinghour.php?d_id=".$d_id."&day=".$day."&s_id=".$s_id."&serial=".$serial);


	?>

</body>
</html>