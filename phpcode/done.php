<?php 
	include('database.php');
	$s_id = $_GET['s_id'];
	$u_id = $_GET['u_id'];
	$d_id= $_GET['d_id'];
	$serial = $_GET['serial'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment Taken</title>
	<link rel="stylesheet" href="CSS/donne.css" type="text/css">
</style>
</head>
<body>
	<?php

		$query2 = 'SELECT *
					FROM `appointment`
					WHERE S_ID = '.$s_id.' AND U_ID = '.$u_id.';';


		$result = mysqli_query($conn, $query2);
		$count = mysqli_num_rows($result);
		if($count==0){
			$query1 = "INSERT INTO `appointment`(`D_ID`, `U_ID`, `S_ID`, `SERIAL`) VALUES (".$d_id.",".$u_id.",".$s_id.",".$serial.");";
			$result = mysqli_query($conn, $query1);
			$query2 = "INSERT INTO `userappointment`(`D_ID`, `U_ID`, `S_ID`, `SERIAL`) VALUES (".$d_id.",".$u_id.",".$s_id.",".$serial.");";
			$result2 = mysqli_query($conn, $query2);
			if($result2){
				echo "<h5>Your appointment has been taken.<br>";
				echo 'Go back to <button class="button"><span><a href = "index.php">Home</a></span></button><br></h5>';
			}
			
		}
		else{
			$msg = "<h5>Sorry! You already have appointment on this schedule!</h5><br>";
			header("Location: userpage.php?id=".$d_id."&msg=".$msg);
		}
	?>
</body>
</html>