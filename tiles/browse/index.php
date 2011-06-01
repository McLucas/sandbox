<html>
	<head>
	</head>
	<body>
	
		<?php
		
			if(isset($_GET['image_id'])){
				include 'image.php';
			
			} else {
				include 'images.php';
			}
		
		?>
	
	
	</body>
</html>