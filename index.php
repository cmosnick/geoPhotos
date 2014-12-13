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
	        var mapOptions = {
	          center: { lat: 0, lng: 0},
	          zoom:2
	        };
	        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	      	}
	      	google.maps.event.addDomListener(window, 'load', initialize);

	      	/*document.getElementById("upload").onclick = function () {
        		location.href = "localhost:3000/upload.php";
	   		}*/
    	</script>
		<style>
			.map-canvas{
				width: 100%;
				height: 50%;
			}
		</style>

	</head>
	
	<body>
		<div class="header">
			<div class="container, row">
				<h1>Welcome to GeoPhotos!</h1>
				<button class="btn btn-dark" id="upload" onclick="location.href = '/upload.php';" >Upload a photo!</button>
				<button class="btn btn-dark" id="video" onclick="location.href = '/video.html';" >Watch a video!</button>
			<div class="map, map-canvas, container-fluid" id="media">	<!--Import google maps API-->
				<div id='map-canvas' style="width: 100%; height: 500px">
				</div>
			</div>
			<div id="footer">
				<p>Contact: crmmx2@mail.missouri.edu</p>
			</div>
	</body>
</html>