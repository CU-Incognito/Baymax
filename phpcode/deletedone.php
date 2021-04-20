<?php
	include('database.php');
	$s_id = $_GET['s_id'];
	$u_id = $_GET['u_id'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$query = 'DELETE 
					FROM `schedule`
					WHERE S_ID='.$s_id.';';
       
		$result = mysqli_query($conn, $query);
		header("Location: userpage.php?id=".$u_id);


	?>

</body>
</html>