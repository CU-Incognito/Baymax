<?php
	include('database.php');
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor page</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="CSS/userpage.css" type="text/css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="topnav"> <a class="active" href="index.php">Home</a> </div><br>


     

	 <?php
		if(isset($_GET['msg'])) echo $_GET['msg'];
  
        

		//login session
   		session_start();
   		$loggedin = true;
   		if(isset($_SESSION['login_user'])){
   			$user_check = $_SESSION['login_user'];

   			$query = 'SELECT *
					FROM `user`
					WHERE EMAIL="'.$user_check.'";';

			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);

			if($loggedin){
				$u_id = $row['U_ID'];
			}

			if($count != 1) $loggedin= false;
   		}
	   	else $loggedin= false;


		//check if doctor
		$dctr = false;
		$check = "SELECT *
				FROM  `doctor`
				WHERE D_ID=".$id.";";
		
		$result = mysqli_query($conn, $check);
		$row = mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);
		$occu="Patient";
		if($count){
			$dctr= true;
			$query= "SELECT *
					FROM  `user`,`doctor`
					WHERE U_ID=".$id." AND D_ID=".$id.";";
		    $occu="Doctor";
		}
		else{
			$query= "SELECT *
					FROM  `user`
					WHERE U_ID=".$id.";";
					$occu="Patient";
		}
		
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		
		$name = $row['FIRST_NAME'];
		$lname=$row['LAST_NAME'];
		$age = $row['AGE'];
		$gender = $row['GENDER'];
		$contact = $row['CONTACT'];
		$email = $row['EMAIL'];
		echo '<figure class="snip0057 red hover">';
        echo '<figcaption>';
		echo "<br>".'<h2>'.$name.'<span>'.$lname.'</span></h2>';
		if($dctr) echo '<p >'.$row['INFO'].'<br></p>';
		echo '<p><b>'.'Age:'.$age.'</b>';
		echo '<b>'.'| Gender:'.$gender.'</b>'.'<br>';
		echo '<b>'.'<i class="fa fa-phone">'.'<b>'.'&nbsp'.'&nbsp'.$contact.'  |  </b>'.'</i>'.'</b>';
		echo '<i class="fa fa-envelope">'.'<b>'.'&nbsp'.'&nbsp'.$email.'</b>'.'</i>'.'<br>';
		if($id==$u_id) echo '<p><b><a href="editprofile.php?u_id='.$u_id.'">Edit Profile</a></b><br></p>';
		if($dctr){
			$d_id = $id;
			
			echo '<b>'.'<p style="font-size:20px">Fee:Tk.'.$row['FEE'].'<br>'.'</b>';
			echo '<b>'.'<i style="color: green;font-size:20px">Rating:'.$row['RATING'].'/5</i>'.'<br>'.'</b></p>';
		}
		echo '</figcaption>';
						if($dctr)
						{ if($gender=="MALE")
							echo '<div class="image"><img src="doctorm1.jpg" alt="sample4"/></div>';
						else echo '<div class="image"><img src="doctorf.jpg" alt="sample4"/></div>';}
					else{
						if($gender=="MALE")
							echo '<div class="image"><img src="male.png" alt="sample4"/></div>';
						else echo '<div class="image"><img src="female.png" alt="sample4"/></div>';
					}
  echo '<div class="position" style="font-size: 20px">'.$occu.'</div>
</figure>';
if($dctr){
if(isset($_SESSION['login_user']) ){
				if(	$d_id==$u_id){		
			echo '<button class="open-button" onclick="openForm()">Add additional information</button>';
			echo '<div class="form-popup" id="myForm">';
			echo '<form  action="" class="form-container" method="post">';
			echo '<label>Category</label>';	
			echo '<br>';
			echo '<input type="text" name="cat" placeholder="Category">';
			echo '<br>';
			echo '<label>Educational Information</label>';
			echo '<br>';
			echo '<input type="text" name="info" >';
			echo '<br>';
			echo '<label>Fee</label>';
			echo '<br>';
			echo '<input type="text" name="fee" >';
			echo '<br>';
			echo '<button type="submit" name="submitt" class="btn">Submit</button>';
			echo '<button type="button" class="btn cancel" onclick="closeForm()">Close</button>';
			echo '</form>';
			echo '</div>';
			echo '<script type="text/javascript" src="JS/index_loginn.js"></script>';
			if (isset($_POST['submitt'])){
				$edu=$_POST['info'];
				$cat=$_POST['cat'];
				$fee=$_POST['fee'];
				$queryy3 = 'UPDATE `doctor` SET `INFO`="'.$edu.'",`FEE`='.$fee.'
			WHERE D_ID='.$d_id.';';
			$result3 = mysqli_query($conn, $queryy3);
			$queryy4 = 'SELECT `C_ID` FROM `category` WHERE `NAME` LIKE  UPPER("%'.$cat.'%");';
			$result4 = mysqli_query($conn, $queryy4);
			$count = mysqli_num_rows($result4);
			if($count==0)
			{
				$queryy6 = 'INSERT INTO `category` (`NAME`) VALUES (UPPER("'.$cat.'"));';
			    $result6 = mysqli_query($conn, $queryy6);
				$queryy7 = 'SELECT `C_ID` FROM `category` WHERE `NAME` LIKE  UPPER("%'.$cat.'%");';
			    $result4 = mysqli_query($conn, $queryy7);
			}
	
			while($row1 = mysqli_fetch_assoc($result4)){
			$cid =$row1['C_ID'];
			$queryy5 = 'INSERT INTO `d_category` (`D_ID`,`C_ID`) VALUES ('.$d_id.','.$cid.');';
			$result5 = mysqli_query($conn, $queryy5);
			}
				
			}}
       
			if(isset($_SESSION['login_user'])){
			if($u_id!=$id){
			echo '<div class="w3-container" style="background-color: #B0C4DE;right: 100px"><b style="color: #483D8B;font-size:25px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rate:</b>';

            echo '<form action="" method="post">';
            echo '<div class="stars" >';
            echo '<input class="star star-5" id="star-5" type="radio" name="star-5" value="1"/>';
            echo '<label class="star star-5" for="star-5"></label>';
            echo '<input class="star star-4" id="star-4" type="radio" name="star-4" value="1"/>';
            echo '<label class="star star-4" for="star-4"></label>';
            echo '<input class="star star-3" id="star-3" type="radio" name="star-3" value="1"/>';
            echo '<label class="star star-3" for="star-3"></label>';
            echo '<input class="star star-2" id="star-2" type="radio" name="star-2" value="1"/>';
            echo '<label class="star star-2" for="star-2"></label>';
            echo '<input class="star star-1" id="star-1" type="radio" name="star-1" value="1"/>';
            echo '<label class="star star-1" for="star-1"></label>';
			echo '<input style="background-color: #483D8B;font-size: 20px;color: white" type="submit" name="submit" id="submit" value="Done"/></div></form></div>';
	        if (isset($_POST['submit'])){
		         $rating=0;
		           if (isset($_POST['star-1'])){           
				      $star1=$_POST['star-1'];
	                  if($star1=="1")
				         $rating=$rating+1;
		                                       } 
		           if (isset($_POST['star-2'])){
		              $star2=$_POST['star-2'];
	                 if($star2=="1")
				        $rating=$rating+1;}
		           if (isset($_POST['star-3'])){
		              $star3=$_POST['star-3'];
			         if($star3=="1")
				        $rating=$rating+1;}
		           if (isset($_POST['star-4'])){
		              $star4=$_POST['star-4'];
		             if($star4=="1")
				        $rating=$rating+1;}
		           if (isset($_POST['star-5'])){
			          $star5=$_POST['star-5'];
			         if($star5=="1")
		                $rating=$rating+1;}
	
			$queryy = 'SELECT `RATING_N`,`RATING_SUM`
					   FROM `doctor` WHERE D_ID="'.$d_id.'";';
       
			$result1 = mysqli_query($conn, $queryy);
			$row = mysqli_fetch_assoc($result1);
			$n=$row['RATING_N'];
			$sum=$row['RATING_SUM'];
			$n=$n+1;
			$sum=$sum+$rating;
	
			$queryy2 = 'UPDATE `doctor` 
			           SET `RATING_N`='.$n.',
			               `RATING_SUM`='.$sum.'
			WHERE D_ID='.$d_id.';';
			$result2 = mysqli_query($conn, $queryy2);
			}

			
		}
			}
		}
		
		}
		if($dctr){
			

			echo '<a href="">'.'<button class="btn success"><b>Schedule</b></button>'.'</a>';
			$day =  array("SATURDAY","SUNDAY","MONDAY", "TUESDAY" , "WEDNESDAY" , "THURSDAY" , "FRIDAY");
			
			echo '<div id="down">'.'<table id="customers">'.'<tr>'.
					'<th>Day</th>'.
					'<th>Start</th>'.
					'<th>End</th>'.
					'<th>Location</th>'.
					'<th></th>
					</tr>';

			for ($i=0; $i < 7; $i++) { 
				
				$schedule = 'SELECT * 
						FROM `schedule`
						WHERE D_ID='.$d_id.' AND DAY LIKE "%'.$day[$i].'%"
						ORDER BY START;';

				$result = mysqli_query($conn, $schedule);

				
				//echo mysqli_num_rows($result);
				while($row = mysqli_fetch_assoc($result)){
					$s_id = $row['S_ID'];

					//if logged is user is doctor
					if($loggedin){
						if($u_id==$id){
							 $page = '"deleteschedule.php?s_id='.$s_id.'&u_id='.$u_id.'"';
							 $str = '<i style="background-color:F0F8FF"class="fa fa-trash"></i></a></td></tr>';
						}
						else{
							$page = '"appointmentform.php?s_id='.$s_id.'&u_id='.$u_id.'"';
							$str = 'Take Appointment Now</a></td></tr>';
						} 
					}
					else{
						$msg = "Please Log in first!";
						$page = '"index.php?msg='.$msg.'"';
	
						$str = 'Please Log in first!</a></td></tr>';
					}

					echo '<tr><td>'.$day[$i].'</td> <td>'.$row['START'].'</td> <td>'.$row['END'].'</td> <td>'.$row['LOCATION'].'</td> <td><a href='.$page.'<button class="button">'.'<span>'.$str.'</span>'.'</button>'.'<br>';
				}
			}
			echo '</table>'.'</div>';

			if($loggedin && $id==$u_id){
				echo '<li style="position:fixed;bottom: 180px;left: 1030px;"><a href = "updateschedule.php?d_id='.$d_id.'">Update Schedule</a></li>';
			}

		}

?>

</body>
</html>