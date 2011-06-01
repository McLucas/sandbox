<?php

if(isset($_GET['image_id']) && is_numeric($_GET['image_id'])) {
	
	$imageID = $_GET['image_id'];
	//connect to the db
	$link = mysql_connect("localhost", "root", "admin") or die("Could not connect: " . mysql_error());

	// select our database
	mysql_select_db("site") or die(mysql_error());

	// get the image from the db
	$sql = "SELECT data FROM image WHERE image_id = ${imageID}";

	// the result of the query
	$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());

	// set the header for the image
	header("Content-type: image/jpeg");
	echo mysql_result($result, 0);

	// close the db link
	mysql_close($link);
}
else {
	echo 'Please use a real id number';
}

?>