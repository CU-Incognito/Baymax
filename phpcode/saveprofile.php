 <!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>
	
	<?php
	
		include('database.php');
		$u_id = $_GET['u_id'];
	

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		

		$query= 'UPDATE `user` SET `FIRST_NAME`="'.$first_name.
				'",`LAST_NAME`="'.$last_name.'",`AGE`='.$age.',`GENDER`="'.$gender.'",`EMAIL`="'.$email.'",`CONTACT`="'.$contact.
				'" WHERE `U_ID`='.$u_id.';';
		echo $query;

		 $result = mysqli_query($conn, $query);

		 if($result){
		 	session_start();
		 	 $_SESSION['login_user'] = $email;
	         header("Location: userpage.php?id=".$u_id);

		 }
		 else{
		 	//header("Location: saveprofile.php?");	
		 }

		 

		
	?>
</body>
</html> 