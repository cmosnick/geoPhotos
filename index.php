<?php
	$pageTitle="Welcome to GeoPhotos!";
	$customStyle ="
		@map-canvas{
			width: 100%;
			height: 75%;
		}
		.infWin{
			margin: 0px;

		}";
	require("header.php");
?>
<!--	Start html after header is importd	-->
			<div class="map map-canvas container-fluid" id="media">	<!--Import google maps API-->
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
		$arr=array("message"=>"yay");
		echo arr;
	}
?>

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
			'<img id="" src="uploads/20140805_164542.jpg" alt="Mountain View" style="width:50px;height:50px;">'+
			'</div>';
      	var infowindow = new google.maps.InfoWindow({
		    content: contentString,
		    maxWidth: 50
		});

		var marker = new google.maps.Marker({
		    position: myLatlng,
		    map: map,
		    title: 'Kitten!'
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







