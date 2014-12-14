<!DOCTYPE html>
<html>
	<head>
			<title>Geo Photos</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="startbootstrap-stylish-portfolio-1.0.0/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="startbootstrap-stylish-portfolio-1.0.0/css/stylish-portfolio.css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="startbootstrap-stylish-portfolio-1.0.0/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz3ZJzghImC8_vAl5cYYewtQyjDY0V6oM"></script>
			<script type="text/javascript">
				function openModal(){
					$('#modal').modal('show');
				};
				function closeModal(){
					$('#modal').hide();
				};
			</script>
			<style>

			.panel-header{
				background-color: rgba(211, 211, 211, 0.8);
				border-radius: 10px;
			}
			.panel-body{
				background-color: rgba(211, 211, 211, 0.6);
				border-radius: 5px;
				margin:20px;
			}
			.video{
				margin: 20px;
			}
			<?php

				echo $customStyle;
			?>
			</style>
	</head>
	
	<body>
		<div class="header container-fluid row-fluid">
			<div class="panel-header container-fluid">
				<div class="col-md-9">
					<h1><?php 	echo $pageTitle;	?></h1>
				</div>
				<div class="col-md-3 container-fluid">
					<button class="btn btn-dark pull-right pull-down" id="upload" onclick="location.href = 'upload.php';" >Upload a photo!</button>
					<button class="btn btn-dark pull-right pull-down" id="video" onclick="location.href = 'video.php';" >Watch a video!</button>
				</div>
			</div>