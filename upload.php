<?php

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}

	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
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
		
	</body>
</html>