


<?php
	include('database.php'); 
	$id = $_GET['id'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor list</title>
	<link rel="stylesheet" href="CSS/doctorlist.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="topnav">
	<form  method="post" action="#">
		<a class="active" href="index.php">Home</a>
		<div class="search-container">
		<label style="color:white"><b>Day</b></label>
		<select style="font-size:25px" name="day" method="post">

		<option value=""></option>
		<option value="SATURDAY">Saturday</option>
		<option value="SUNDAY">Sunday</option>
		<option value="MONDAY">Monday</option>
		<option value="TUESDAY">Tuesday</option>
		<option value="WEDNESDAY">Wednesday</option>
		<option  value="THURSDAY">Thursday</option>
		<option  value="FRIDAY">Friday</option>
	</select>
	
	
		<label style="color:white"><b>Location</b></label>
		<input  type="text" name="location">
		<button type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
	</form>
</div>
<br>
</div>
<div class="vertical-menu">
	<?php
echo '<br>';
		$day = "";
		$loc = "";

		if( isset($_POST['submit'])){
			$day = $_POST['day'];
			$loc = $_POST['location'];
			$loc = trim($loc);
			$loc = strtoupper($loc);
		}


		$query='SELECT DISTINCT `U_ID`, `FIRST_NAME`, `LAST_NAME`
					FROM `user`,`d_category`,`schedule` 
					WHERE C_ID = '.$id.' AND d_category.D_ID = U_ID AND d_category.D_ID = schedule.D_ID AND DAY LIKE "%'.$day.'%" AND LOCATION LIKE "%'.$loc.'%"'
					.'ORDER BY FIRST_NAME;';

			
			//echo $query;

		$result = mysqli_query($conn, $query);

		while($row = mysqli_fetch_assoc($result)){
			$u_id =$row['U_ID'];
			$output ='<tr><td><a href="userpage.php?id='.$u_id.'"><h4>'.$row['FIRST_NAME']." ".$row['LAST_NAME'].'<h4></a></td></tr><br>';
			echo $output;		
		}
		
	?>
	</div>
</body>
</html>