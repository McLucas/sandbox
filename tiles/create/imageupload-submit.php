<?php

if(!isset($_FILES["file"])){
	echo 'file not set';
} else if ($_FILES["file"]["error"] > 0) {
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else { 




	list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
	
	$imgData =addslashes (file_get_contents($_FILES['file']['tmp_name']));

	
	mysql_connect("localhost", "root", "admin") OR DIE (mysql_error());
	mysql_select_db ("site") OR DIE ("Unable to select db".mysql_error());

	
	$sql = "INSERT INTO image
			(name ,data, width, height, file_type)
			VALUES
			('NAMES!!', '{$imgData}', '{$width}', '${height}', '${type}')";

	// insert the image
	if(!mysql_query($sql)) {
		echo 'Unable to upload file';
		
	}
	
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br/>";
	echo "width:" . $width. "<br/>";
	echo "height:" . $height. "<br/>";
	echo "type:" . $type. "<br/>";
	echo "attr:" . $attr. "<br/>";

	
}
?> 