<?php

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}

	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: upload.php");
		exit;
	}


	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	}

	function handle_login() {
		//print_r($_POST);
		$username = empty($_POST['uname']) ? '' : $_POST['uname'];
		$password = empty($_POST['pwd']) ? '' : $_POST['pwd'];
	
		if ($username == "test" && $password == "pass") {
			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
			$_SESSION['loggedin'] = $username;
			header("Location: upload.php");
			exit;
		} else {
			$error = 'Login failed.  Please enter your username and password.';
		}		
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Geo Photos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="startbootstrap-stylish-portfolio-1.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="startbootstrap-stylish-portfolio-1.0.0/css/stylish-portfolio.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz3ZJzghImC8_vAl5cYYewtQyjDY0V6oM"></script>
		<script type="text/javascript"></script>
		<style>
			
		</style>
	</head>

	<body>
		<div class="container, header">
			<div>
				<h1>Welcome to GeoPhotos!</h1>
				<div class = "container" id="loginBox">
			      	<h3>Please log in to upload a photo</h3>
			      	<form name="Login" action="login.php" method="POST" role="form">
			      		<input type="hidden" name="action" value="do_login">
			        	<div class="form-group">
			         		<label for="uname">Username:</label>
			          		<input type="" class="form-control" name ="uname" placeholder="Enter username">
			        	</div>
			        	<div class="form-group">
			          		<label for="pwd">Password:</label>
			          		<input type="password" class="form-control" name="pwd" placeholder="Enter password">
			        	</div>
			        	<button type="submit" name="submit" value="submit" class="btn btn-dark-hover">Submit</button>
			      	</form>
				</div>
			</div>
		</div>
	</body>
</html


<?php
	
?>