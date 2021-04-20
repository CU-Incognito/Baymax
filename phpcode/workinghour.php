<?php
	include('database.php');
	$d_id = $_GET['d_id'];
	$day = $_GET['day'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Working Hour</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/workinghourr.css" type="text/css">
</head>
<body>
	<?php

			echo '<div class="topnav"><a class="active" href="index.php">Home</a></div><br>';

			//schedule query
			$schedule = 'SELECT * 
					FROM `schedule`
					WHERE D_ID='.$d_id.' AND DAY LIKE  "%'.$day.'%"
					ORDER BY START;';
			$result = mysqli_query($conn, $schedule);
			$select_id = $d_id."#".$day;
			echo '<label><h1 style="color: #483D8B">'.$day.'</h1></label><br>';
			echo '<select name="Schedule" id="'.$select_id.'" onchange="onSelect()">';
			echo '<option value="None"></option>';
			
			while($row = mysqli_fetch_assoc($result)){
				echo '<option value="'.$row['S_ID'].'">'.$row['START'].'-'.$row['END'].'</option>';
			}

			echo '</select>';



		/*$query= 'SELECT appointment.*,concat (FIRST_NAME," ",LAST_NAME) AS PATIENT, concat(START," - ",END) AS SCHEDULE,schedule.*,AGE,GENDER
				FROM appointment
				INNER JOIN user ON appointment.U_ID = user.U_ID
				INNER JOIN schedule ON appointment.S_ID = schedule.S_ID
				WHERE appointment.D_ID='.$d_id.' AND DAY LIKE "%'.$day.'%"
				ORDER BY START;';
		//echo $query;
		$result = mysqli_query($conn, $query);

		
		if(!isset($_GET['SERIAL'])){
			$i=0;
			while($row = mysqli_fetch_assoc($result)){
				$serials[$i] = $row['SERIAL'];
				$userid[$i] = $row['U_ID'];
				$i = $i+1;
			}
		}
		else $i = $_GET['serial']+1;*/


		//after choosing schedule
		if(isset($_GET['s_id'])){
			
			$s_id = $_GET['s_id'];
			//if its the 1st patient
			if(!isset($_GET['serial'])) $serial = 0;
			else $serial = $_GET['serial']-1;

			$query = 'SELECT *,concat (FIRST_NAME," ",LAST_NAME) AS PATIENT
					FROM `appointment`,`user`
					WHERE appointment.U_ID = user.U_ID AND S_ID='.$s_id.' AND SERIAL>'.$serial
					.' ORDER BY SERIAL;';
			
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			if(!$row){
				echo "<br><h3 >You don't have any more appoitment in this schedule.</h3>";
			}
			else{
				$serial = $row['SERIAL'];
				$u_id =  $row['U_ID'];
                echo  '<br><br>';
				echo '<h1 style="color: #483D8B">'. $row['PATIENT'].'</h1>';
				echo '<hr class="dashed"><br>';
                echo '<h3 style="color: #483D8B">Age: '. $row['AGE'].'</h3>';
				echo '<hr class="dashed"><br>';
				echo '<h3 style="color: #483D8B">Gender: '. $row['GENDER'].'</h3>';
				echo '<hr class="dashed"><br>';
				echo '<h3 style="color: #483D8B">Check in: '. $row['CHECK_IN'].'</h3>';
				echo '<hr class="dashed"><br>';
				echo '<h3 style="color: #483D8B">Prescription:</h3><p style="font-size:20px;color: #483D8B" class="c"> '. $row['PRESCRIPTION'].'</p>';
				echo '<hr class="dashed"><br>';
				echo '<h3 style="color: #483D8B">Check out: '. $row['CHECK_OUT'].'</h3>';
				echo '<hr class="dashed"><br>';
				

				echo '<h1 style="font-size:30px;color: #483D8B">Update prescription</h1>';
				echo '<div class="container"><form action="saveprescription.php?d_id='.$d_id.'&day='.$day.'&serial='.$serial.'&s_id='.$s_id.'&u_id='.$u_id.'" method="post">';
				echo '<label>Prescription</label><br>';
				echo '<input  type="text" name="prescription" value="'.$row['PRESCRIPTION'].'"><br>';
				echo '<label>Check in</label><br>';
				echo '<input type="time" name="checkin" value="'.$row['CHECK_IN'].'"><br>';
				echo '<label>Check Out</label><br>';
				echo '<input type="time" name="checkout" value="'.$row['CHECK_OUT'].'"><br>';
				echo '<input type="submit" name="save_prescription" value="Save"></form></div>';

				//next and previous patient link
				echo '<br>';
				echo '<button class="button button2"><a href="workinghour.php?d_id='.$d_id.'&day='.$day.'&s_id='.$s_id.'&serial='.($serial-1).'">Previous</a></button>';
				echo '<button class="button button2"><a href="workinghour.php?d_id='.$d_id.'&day='.$day.'&s_id='.$s_id.'&serial='.($serial+1).'">Next</a></button>';

				//piyal! ei part ta design e pashe list akare dite parbi?
				$query = 'SELECT *,concat (FIRST_NAME," ",LAST_NAME) AS PATIENT
						FROM `appointment`,`user`
						WHERE appointment.U_ID = user.U_ID AND S_ID='.$s_id
						.' ORDER BY SERIAL;';
				
				$result = mysqli_query($conn, $query);
				echo '<div class="vertical-menu">';
				while($row = mysqli_fetch_assoc($result)){
					if($row){
						if(!isset($done)){
							echo '<br><a href="#" class="active" >Patient list:</a>';
							$done=true;
						}
						echo '<br><a href="workinghour.php?d_id='.$d_id.'&day='.$day.'&s_id='.$s_id.'&serial='.$row['SERIAL'].'">'.$row['PATIENT'].'</a>';
					}
					
				}
				echo '</div>';

				
			}
		}

	?>
	<script type="text/javascript" src="JS/workinghourr.js"></script>
</body>
</html>