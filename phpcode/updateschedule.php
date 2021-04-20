<?php
	include('database.php');
	$d_id = $_GET['d_id'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Schedule</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/signup.css" type="text/css">
	<link rel="stylesheet" href="CSS/index.css" type="text/css">
	<style>
body {
  background-color: #191970;
}
</style>
</head>
<body>
 <div class="topnav">	
      <a class="active" href="index.php">Home</a>
	</div>
	<?php
	echo '<div class="container">';
	echo '<h1>Update Schedule</h1>';
	echo '<form action="addschedule.php?d_id='.$d_id.'" method="post">';
	?>

		<label style="font-size:20px">Day</label><br>
		<select name="day" method="post">

		<option style="font-size:20px" value="SATURDAY">Saturday</option>
		<option style="font-size:20px" value="SUNDAY">Sunday</option>
		<option style="font-size:20px" value="MONDAY">Monday</option>
		<option style="font-size:20px" value="TUESDAY">Tuesday</option>
		<option style="font-size:20px" value="WEDNESDAY">Wednesday</option>
		<option style="font-size:20px" value="THURSDAY">Thursday</option>
		<option style="font-size:20px" value="FRIDAY">Friday</option>
		</select>
		<br>
		<label style="font-size:20px">Start Time</label>
		<br>
		<input style="font-size:20px" type="time" name="start" class="start"  >
		<br>
		<label style="font-size:20px">End Time</label>
		<br>
		<input style="font-size:20px" type="time" name="end" class="end">
		<br>
		<label style="font-size:20px">Location</label>
		<br>
		<input style="font-size:20px" type="text" name="location">
		<br>
		<label style="font-size:20px">Number of Patients to attend</label>
		<br>
		<input style="font-size:20px" type="int" name="max_p">
		<br>
		
		<input style="font-size:20px" type="submit" name="submit" value="Add Schedule">
	</form>
	</div>
</body>
</html>