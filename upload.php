<?php

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}

	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	}

	require("phpfuncs.php");
	$pageTitle="Upload a photo";

	require("header.php");
?>
<!--	Start HTML after header	-->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="panel-body col-md-8">
					<form action="upload.php" method="post" enctype="multipart/form-data">
					    <h4 class="sm">Select image to upload:</h4>
					    <input class="file" type="file" name="fileToUpload" id="fileToUpload">
					    <input type="submit" value="Upload Image" name="submit">
					</form>
					<div>
						<?php
							$target_dir = "uploads/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							$uploadOk = 1;
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							//Error check if image, size, locatiion data, etc.
							if(isset($_POST["submit"])) $uploadOk = checkFile();

							if ($uploadOk == 0) {
						   		echo "<div class='alert-danger'>Sorry, your file was not uploaded.</div>";
							// if everything is ok, try to upload file
							} else {
								$conn = connectDB();
								if($conn){
								    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								        echo "<div class='alert-success'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</div>";
								    } else {
								        echo "<div class='alert-danger'>Sorry, there was an error uploading your file.</div>";
								    }
								    //insert data into database
								    $query = "INSERT INTO geoPhotos.photo VALUES(default, $1, $2, $3, default);";
								    $lat = rand(-90, 90);
								    $long = rand(-180, 180);
								    $result = pg_prepare($conn, "insertPhoto", $query)or die('Prepare failed: ' . pg_last_error());
									$result = pg_execute($conn, "insertPhoto", array($target_dir.($_FILES["fileToUpload"]["tmp_name"]), $lat, $long))or die('Execute failed: ' . pg_last_error());
								}
								else{	echo "<div class='alert-danger'>Could not connect to database</div>";	}
							}
							
							function checkFile(){

							    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							    //print_r($_FILES);
							    if($check == false) {
							        echo "<div class='alert-danger'>File is not an image.</div>";
							        return 0;
							    }
							   	// Check if file already exists
								if (file_exists($target_file)) {
								    echo "<div class='alert-danger'>Sorry, file already exists.</div>";
								    return 0;
								}
								 // Check file size
								if ($_FILES["fileToUpload"]["size"] > 5000000) {
								    echo "<div class='alert-danger'>Sorry, your file is too large.</div>";
								    return 0;
								}
								return 1;

								//Check if image has location metadata
								//$array=exif_read_data($_FILES["fileToUpload"]["tmp_name"]);
								//print_r($array);
							}
						?>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
					<div id="modal" class="modal col-md-8">  
					    <div class = "container modal-content col-md-4" id="loginBox">
					      	<h3 class="modal-header">Please log in to upload a photo</h3>
					      	<form class="modal-body"name="Login" action="upload.php" method="POST" role="form">
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
					      	<div>
					      		<?php
					      			function handle_login() {
										//print_r($_POST);
										$username = empty($_POST['uname']) ? '' : $_POST['uname'];
										$password = empty($_POST['pwd']) ? '' : $_POST['pwd'];
									
										if ($username == "test" && $password == "pass") {
											// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
											$_SESSION['loggedin'] = $username;
											closeModal();
											exit;
										} else {
											$error = "<div class='alert-danger'>Login failed.  Please enter your username and password.</div>";
											echo $error;
										}		
									}
					      		?>
					      	</div>
						</div> 
						<div class="col-md-4"> </div> 
					</div>  
				<div class="col-md-2"></div>
				</div>
			<div class="col-md-12"id="footer">
				<p>Contact: crmmx2@mail.missouri.edu</p>
			</div>
	</body>
</html>

<script type="text/javascript">
	function openModal(){
		$('#modal').modal();
	};
	function closeModal(){
		$('#modal').hide();
	};
</script>


<?php

if (!$loggedIn) {
		//header("Location: login.php");
		//call modal to pop up
		echo "<script>openModal();</script>";
		exit;
	}

?>
