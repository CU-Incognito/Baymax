 <!DOCTYPE html>
<html>
<head>
<style>
body {
  background: url("okay.jpg");
}
</style>
</head>
<body>
	
	<?php
	echo '<a href="index.php">Home</a><br>';
		include('database.php');

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		$query = 'INSERT INTO `user` ( `FIRST_NAME`, `LAST_NAME`, `AGE`, `GENDER`,`CONTACT`, `EMAIL`, `PASSWORD`)
				  VALUES ("'.$first_name.'","'.$last_name.'",'.$age.',"'.$gender.'","'.$contact.'","'.$email.'","'.$password.'");';

		 $result = mysqli_query($conn, $query);

		 if($result){
		 	session_start();
		 	 $_SESSION['login_user'] = $email;
	         header("Location: index.php");

		 }
		 else{
		 	header("Location: signup.php");	
		 }

		 

		
	?>
</body>
</html> 