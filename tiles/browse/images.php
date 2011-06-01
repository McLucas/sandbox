<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Width</th>
			<th>Height</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
	
	<?php


	

	//connect to the db
	$link = mysql_connect("localhost", "root", "admin") or die("Could not connect: " . mysql_error());

	// select our database
	mysql_select_db("site") or die(mysql_error());

	// get the image from the db
	$sql = "SELECT image_id, name, file_type, data, height, width FROM image";

	// the result of the query
	$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());

	
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	
		echo '<tr>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td><img src="image.php?image_id='.$row[0].'"/></td>';
		echo '</tr>';
	
	
	}

	// close the db link
	mysql_close($link);


?>
	
	
	</tbody>
</table>