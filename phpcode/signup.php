<!DOCTYPE html>
<html>
 <head>
	<title>Sign up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/signupp.css" type="text/css">
 </head>
  <body>

    <div class="container">
	   <form style="font-size:20px" action="adduser.php" method="post" >
		  
		  <label for="first_name" >First Name</label>
		  <input type="text" name="first_name" id="first_name" placeholder="First Name">
		  <label for="last_name" >Last Name</label>
		  <input type="text" name="last_name" id="last_name" placeholder="Last Name">
		  <label for="age" >Age</label>
		  <input type="int" name="age" id="age" placeholder="Age">
		  <label for="gender">Gender</label>
		  <br>
		  <select style="font-size:20px;border-radius: 7px;border: 1px solid #483D8B" name="gender" id="gender">
             <option value="MALE">Male</option>
             <option value="FEMALE">Female</option>
          </select>
		  <br>
  		  <label for="contact" >Contact</label>
		  <input type="text" name="contact" placeholder="Contact">
		  <label for+"email" >Email address</label>
		  <input type="email" name="email" placeholder="Email">
		  <label for="password">Password</label>
          <input type="password" id="password" name="password"
		  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number
		  and one uppercase and lowercase letter, and at least 8 or more characters" required>
		  <label for="register">Register as Doctor</label><br>
		  <select style="font-size:20px;border-radius: 7px;border: 1px solid #483D8B" name="register" id="register">
             <option value="YES">Yes</option>
             <option value="NO">No</option>
          </select>
		  <input type="submit" name="submit" value="Sign up">
	   </form>
	</div>
	<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script type="text/javascript" src="JS/signup.js"></script>
</body>
</html>