 <!DOCTYPE html>
<html>
<body>
	
	<?php
		include('database.php');
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($_POST['register']=='YES') $dctr=1;
		else $dctr = 0;

		$query1 = 'INSERT INTO `user` ( `FIRST_NAME`, `LAST_NAME`, `AGE`, `GENDER`,`CONTACT`, `EMAIL`, `PASSWORD`)
				  VALUES ("'.$first_name.'","'.$last_name.'",'.$age.',"'.$gender.'","'.$contact.'","'.$email.'","'.$password.'");';
         
		$result= mysqli_query($conn, $query1);
		 if($result){
			 if($dctr){
				 $query2 = 'SELECT U_ID FROM `user` WHERE EMAIL="'.$email.'";';
				 $result = mysqli_query($conn, $query2);
				 $row = mysqli_fetch_assoc($result);
				 
				 $query3 = 'INSERT INTO `doctor`(`D_ID`) VALUES ('.$row['U_ID'].');';
				 
				 $result = mysqli_query($conn, $query3);
			 }
				 session_start();
					$_SESSION['login_user'] = $email;
					header("Location: index.php");
			}
		 else{
		 	/*header("Location: signup.php");*/	
		 }

		 

		
	?>
</body>
</html> 