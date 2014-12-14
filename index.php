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
		<script type="text/javascript">
		    function initialize() {
		        var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
		        var mapOptions = {
		          center: { lat: 0, lng: 0},
		          zoom:2
				};
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				//Get array of objects from php using ajax
				var options = {action: "getPhotos"};
				var arr = $.ajax("index.php", options);
				console.dir(arr);
				var contentString = '<div class="infWin">'+
					'<img id="" src="uploads/21st-Birthday-1.png" alt="Mountain View" style="width:50px;height:50px;">'+
					'</div>';
		      	var infowindow = new google.maps.InfoWindow({
				    content: contentString,
				    maxWidth: 50
				});

				var marker = new google.maps.Marker({
				    position: myLatlng,
				    map: map,
				    title: 'Hello World!'
				});

				google.maps.event.addListener(marker, 'click', function() {
    				infowindow.open(map,marker);
  				});
		    }
	      		google.maps.event.addDomListener(window, 'load', initialize);
	   		/*$('.pull-down').each(function() {
				$(this).css('margin-top', $(this).parent().height()-$(this).height())
			});*/
    	</script>
		<style>
			@map-canvas{
				width: 100%;
				height: 75%;
			}
			.infWin{
				margin: 0px;

			}
		</style>

	</head>
	
	<body>
		<div class="header">
			<div class="container-fluid, row-fluid">
				<div class="col-md-9">
					<h1>Welcome to GeoPhotos!</h1>
				</div>
				<div class="col-md-3 container-fluid">
					<button class="btn btn-dark pull-right pull-down" id="upload" onclick="location.href = 'upload.php';" >Upload a photo!</button>
					<button class="btn btn-dark pull-right pull-down" id="video" onclick="location.href = 'video.html';" >Watch a video!</button>
				</div>
			<div class="map, map-canvas, container-fluid" id="media">	<!--Import google maps API-->
				<div id='map-canvas' style="width: 100%; height: 700px;">
				</div>
			</div>
			<div id="footer">
				<p>Contact: crmmx2@mail.missouri.edu</p>
			</div>
	</body>
</html>

<?php
	if($_GET['action']=="getPhotos"){
		$arr=["message"=>"yay"];
		echo arr;
	}



?>







