<?php
	include('database.php');
	$s_id = $_GET['s_id'];
	$u_id = $_GET['u_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Schedule</title>
	<link rel="stylesheet" href="CSS/deleteschedule.css" type="text/css">
</head>
<body>
	
	
	
	<?php
		echo '<h5>Are you sure?</h5><br>';
		echo '<h5><button class="button button2"><a href="deletedone.php?s_id='.$s_id.'&u_id='.$u_id.'">Yes</a></button>';
		echo '<button class="button button2"><a href="userpage.php?id='.$u_id.'">No</a></button></h5>';
	?>
</body>
</html>