<?php
	function connectDB()
	{
		//connect to DB
		include("../secure/database.php");
		$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
		if($conn){	/*echo "<p>Successfully connected to DB</p>";*/		} 
		else{	echo "<p>Failed to connect to DB</p>";	exit;	}
		return $conn;
	}
?>