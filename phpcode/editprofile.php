<?php
	include('database.php');
	$u_id = $_GET['u_id'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/signup.css" type="text/css">
	<link rel="stylesheet" href="CSS/index.css" type="text/css">
	<style>
body {
  background-color: #197070;
}
</style>
</head>
<body>
    <div class="topnav">	
      <a class="active" href="index.php">Home</a>
	</div>
	<?php
		$query = 'SELECT *
				FROM `user`
				WHERE U_ID = '.$u_id.';';
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
        echo '<div class="container">';
		echo '<h1>Edit Profile</h1>';
		echo '<form action="saveprofile.php?u_id='.$u_id.'" method="post">';
		echo '<label>First Name</label><br>';
		echo '<input type="text" name="first_name" class="input inp-firstname" id="firstname" placeholder="First Name" value="'.$row['FIRST_NAME'].'"><br>';
		echo '<label>Last Name</label><br>';
		echo '<input type="text" name="last_name" class="input inp-lastname" placeholder="Last Name" value="'.$row['LAST_NAME'].'"><br>';
		echo '<label>Age</label><br>';
		echo '<input type="int" name="age" placeholder="Age" value="'.$row['AGE'].'"><br>';
		echo '<label>Gender</label><br>';

		if($row['GENDER']=="MALE"){
		  echo '<select name="gender" id="gender">';
          echo '<option value="MALE">Male</option>';
          echo '<option value="FEMALE">Female</option>';
          echo '</select>';
		  echo '<br>';
		}
		else{
		  echo '<select name="gender" id="gender">';
          echo '<option value="FEMALE">Female</option>';
          echo '<option value="MALE">Male</option>';
          echo '</select>';
		  echo '<br>';
		}
		echo '<br>';
		echo '<label>Contact</label><br>';
		echo '<input type="text" name="contact" placeholder="Contact" value="'.$row['CONTACT'].'"><br>';
		echo '<label>Email address</label><br>';
		echo '<input type="email" name="email" placeholder="Email" value="'.$row['EMAIL'].'"><br>';
		echo '<input type="submit" name="submit" value="Save"></form>';
		echo '</div>';


	?>
		
		
		
		
  		
  		
		
		
		
		
		
		
</body>
</html>