<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	$msg = "";
	if (isset($_POST['upload'])) {

		$target = "images/".basename($_FILES['image']['name']);
		$db = mysqli_connect("localhost","root","manager","lr");
		$image = $_FILES['image']['name'];
		$text = $_POST['text'];

		$sql = "INSERT INTO images (image, text) VALUES ('$image','$text')";
		mysqli_query($db,$sql);
		var_dump($_FILES['image']['tmp_name']);
		if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
			$msg = "Image Upload Successful...";
			# code...
		}
		else
		{
			$msg = "Failed";
		}
		echo "$msg";
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Images</title>
	<link rel ="stylesheet" type = "text/css" href ="style.css">
</head>
<body>

<div id = "content">
<form method = "post" action = "upload.php" enctype ="multipart/form-data">
		<input type = "hidden" name = "size" value = "10000000000">
		<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name = "text" cols="40" rows="4" placeholder="Say something about this image..."></textarea>
		</div>
		<div>
			<input type="submit" name="upload" value="Upload Image">
		</div>
	</form>
</div>
</body>
</html>
