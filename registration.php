<html>
<style>
</style>
	<head>
		<title> Registration Page </title>
		<link rel="stylesheet" type"text/css" href="styles.css">
	</head>
	<body>
	
		<form action="/action_page.php">
		  <div class="registrationContainer">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>
			
			<label><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<label><b>Repeat Password</b></label>
			<input type="password" placeholder="Repeat Password" name="psw-repeat" required>
			<input type="checkbox" checked="checked"> Remember me

			<div class="formButtons">
			  <button type="button"  class="cancelbtn">Cancel</button>
			  <button type="submit" class="signupbtn">Sign Up</button>
			</div>
		  </div>
		</form>
	</body>
</html>
<?php
	//Variables
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "user_information";
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//Check for Failure
	if(mysqli_connect_errno()){
		echo "Failed to connnect to MySQL: " . mysqli_connect_errno();
	}
	
	//Checks if login is set.
	if(isset($_POST['register'])){
		
		//Check that passwords match
		if($_POST['pass'] != $_POST['confirm_pass']){
			echo "Passwords do not match <br>";
			return;
		}
		//Strip html and php tags from user and pass
		$user_email = $_POST['email'];
		$user_name = strip_tags(trim($_POST['name']));
		$user_pass = strip_tags(trim($_POST['pass']));	
	}
	
	$add_user = "INSERT INTO login_information (user_name, user_pass, user_email) VALUES ('$user_name', '$user_pass', '$user_email')";
	
	$attempt_add = mysqli_query($con, $add_user);
	
	if($attempt_add){
		echo "Successful!";
		echo "<script>webpage.open('home.php', '_self');</script>";
	}
	else{
		echo "Failed to add new user.";
	}
	
?>
