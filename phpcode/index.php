<?php
 include('database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>e-Doc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/index.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="topnav">
    <?php
	echo '<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
	echo '<a  href="index.php" class="active">Home</a><br><br><br>';
	    session_start();
        //login session e jhamela
		   if (isset($_POST['submit'])){
    
        $myemail = $_POST['email'];
        $mypassword = $_POST['password'];
        $query = 'SELECT U_ID
                  FROM `user`
                  WHERE EMAIL="'.$myemail.'" AND PASSWORD="'.$mypassword.'";';

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count == 1){
		$_SESSION['login_user'] = $myemail;}
		else{

			  echo '<div class="alert">'.'<span class="closebtn">x</span>'.'<strong>'.
			  '<i class="fa fa-warning">   Incorrect username or password!</i>'.'</strong>
			  '.'</div>';
              echo '<script type="text/javascript" src="JS/index_incorrect.js"></script>';
			    }
		   }
		   
		if (isset($_SESSION['login_user'])){


   			$user_check = $_SESSION['login_user'];
			$query = 'SELECT U_ID
					FROM `user`
					WHERE EMAIL="'.$user_check.'";';
   
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
		
			if($count == 1){
				
			
				$query = 'SELECT *
						FROM  `user`
						WHERE EMAIL="'.$user_check.'";';
			
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				
				$name =  $row['FIRST_NAME'] ." ". $row['LAST_NAME'];
				//echo $name;
				$u_id =  $row['U_ID'];
				echo '<a class="active" href = "appointmentdoctor.php?u_id='.$u_id.'">Appointment with Doctors</a><br><br><br>';
				
				//check if doctor
				$dctr = false;
				$check = "SELECT *
						FROM  `doctor`
						WHERE D_ID=".$u_id.";";
			
				$result = mysqli_query($conn, $check);
				$row = mysqli_fetch_assoc($result);
				$count = mysqli_num_rows($result);
				if($count){
					$dctr = true;
					echo '<a class="active" href = "appointmentpatient.php?d_id='.$u_id.'">Appointment with Patient</a><br><br><br>';
					echo '<a class="active"><button class="openn-button" onclick="openForm()">Working Hour</button></a><br><br><br><br>';
					echo '<div class="formm-popup" id="myForm">';
					echo '<form  method="post" class="formm-container">
					<select style="font-size: 30px" name="day" method="post" id="'.$u_id.'" onchange="onSelect()">
						<<option style="background-color: green "value="#">Choose a day</option>
						<option value="SATURDAY">Saturday</option>
						<option value="SUNDAY">Sunday</option>
						<option value="MONDAY">Monday</option>
						<option value="TUESDAY">Tuesday</option>
						<option value="WEDNESDAY">Wednesday</option>
						<option value="THURSDAY">Thursday</option>
						<option value="FRIDAY">Friday</option>
					</select>';
					echo '<br><br><button type="button" class="btn cancel" onclick="closeForm()">Close</button></form>';
					echo '</div>';
					echo '<script type="text/javascript" src="JS/index.js"></script>';
					echo '<script type="text/javascript" src="JS/index_open.js"></script>';
					     }
		        echo '<a class="active" href="prescription.php?u_id='.$u_id.'">Prescriptions</a>';
				echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>
				<br><br><br><a class="active" href="userpage.php?id='.$u_id.'">'.$name.'</a><br><br><br>';
				echo '<a class="active" href="logout.php">Log out</a>';
			
			                }	
							
			
		}
	
		//if not logged in
		if(! isset($u_id)){
			echo '<a  class="active" href="signup.php">Sign up</a><br><br><br>';	
			echo '<a class="active"><button class="open-button" onclick="openForm()">Login</button></a>';

			//login form pop up
			echo '<div class="form-popup" id="myForm">';
			echo '<form  action="index.php" class="form-container" method="post">';
			echo '<h1 style="color:#483D8B">Login Here</h1>';
			echo '<label>Email address</label>';	
			echo '<br>';
			echo '<input type="email" name="email" placeholder="Email">';
			echo '<br>';
			echo '<label>Password</label>';
			echo '<br>';
			echo '<input type="password" name="password" placeholder="Password">';
			echo '<br>';
			echo '<button type="submit" name="submit" class="btn">Login</button>';
			echo '<button type="button" class="btn cancel" onclick="closeForm()">Close</button>';
			echo '</form>';
			echo '</div>';
			echo '<script type="text/javascript" src="JS/index_login.js"></script>';
		}
		echo '</div>';
		echo '</div>';
    ?> 
	<div id="main">
	<span style="font-size:35px;cursor:pointer;font-family:'Lato',sans-serif;color:#483D8B;text-shadow:1px 1px 2px #6495ED" onclick="openNav()">&#9776;&nbsp;<b>Baymax </b><br><i style="font-size:25px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	We make your healthcare easier.</i></span>
	
	<div class="container">
       <img src="baymaxx.jpg" alt="Avatar" class="image" >
        <div class="middle">
        <div class="text" style="font-size:20px"><b style="font-size:28px">Hi!I'm Baymax
		</div>
	</div>
    </div>
	
	<button class="open-buttton" id="myBtn">Why Baymax?</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Baymax is an appointment sytem website that allows you to take appointment
	with specialists just by the help of internet.<br><br> This is specially for the doctors who
	can manage their appointments with the help of Baymax. They can update their schedule
	and location online so that patient can take appointment without having to go to the hospitals
	or go anywhere!</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	
	
	
	
	    <?php
		$query ="SELECT `NAME`,`C_ID`
				 FROM `category`
			 	ORDER BY `NAME`;";
        	echo '<div class="row">
               <div class="left" style="background-color:#B0C4DE;font-size:18px">
               <h2>Find a Doctor</h2>
              <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
       <ul id="myMenu">';
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)){
			$id =$row['C_ID'];
			echo '<li><a href="doctorlist.php?id='.$id.'">'.$row['NAME'].'</a></li>';
					
		}
		echo '</ul></div></div>';
		echo '<script>
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
';
		?>
		</div>
		<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>

