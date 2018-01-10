<?php
include("includes/addPhotoScript.php");

if(isset($_POST['submit'])) {
		$main_img = $_FILES['main_img']['name'];
		$description = $_POST['description'];
		$photographerName = $_POST['photographer_name'];
		
		$uploadMovie = addPhoto($main_img, $description, $photographerName);
		
		$message = $uploadMovie;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Photo</title>
</head>
<body>
<h1>Add your new photo here</h1>
<form action="addPhoto.php" method="post" enctype="multipart/form-data">
<label>Main Image:</label><br>
<input type="file" name="main_img" value="" size="32"><br><br>
<label>Description:</label><br>
<input type="text" name="description" value="" size="1000"><br><br>
<label>Photographer Name:</label><br>
<input type="text" name="photographer_name" value="" size="32"><br><br>
<input type="submit" name="submit" value="Add" >
</form>

</body>
</html>