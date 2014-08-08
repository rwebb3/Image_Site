<?php

session_start();
//ini_set('display_errors', True);
//error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');

$userName = $_SESSION['user'];
//$userName = 'rwebb3';
?>
<html>
  <head>
   <title>Confirmation</title>
  </head>
  <body>
   <div id="main">
<?php
  include_once "nav.php";
  include_once "utils.php";
if($userName != ''){
	$allowedExts = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	$file_name = preg_replace('/\.[^.]*$/','',$_FILES["file"]["name"]);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] <  5000000)
	&& in_array($extension, $allowedExts)){
	  if ($_FILES["file"]["error"] > 0){
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	  }
	  else{
		  /*
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		   */

		while(file_exists("upload/" . $file_name . "." . $extension)){
			$file_name .= rand(100,200);
		}

		$_POST['title'] = mysqli_real_escape_string($_POST['title']);
		$_POST['desc'] = mysqli_real_escape_string($_POST['desc']);
		$file_name = "upload/" . $file_name . "." . $extension;
		move_uploaded_file($_FILES["file"]["tmp_name"],$file_name);
		//	echo "Stored in: $file_name";
		$conn = mysqli_connect("localhost", "proj1", ("rtm" . "#db"), "proj1");

		$insert = "INSERT INTO `proj1`.`Images` (`ID`, `DateTime`, `Title`, `Location`, `Description`, `Owner`)
		   	VALUES (NULL, CURRENT_TIMESTAMP, '$_POST[title]' , '$file_name', '$_POST[desc]', '$userName')";
	
		mysqli_query($conn,$insert);

		//get the newly set ID in order to redirect user to the new image page
		$get_id = "SELECT id FROM `proj1`.`Images` WHERE owner = '$userName' AND location = '$file_name'";

		$results = mysqli_query($conn,$get_id);
		$row = mysqli_fetch_array($results);
		$ID = $row['id'];

		echo "<p>if you are not redirected to the image page <a href=\"./imgpage.php?imgID=$ID\">Click Here</a></p>";
		echo "<script>window.location = \"./imgpage.php?imgID=$ID\"</script>";


	  }
	}
	else{
	  echo "<p>Invalid file<br/>";
	  echo "Image must be a gif, jpg, or png and cannot be larger than 1mB</p>";
	}
}
else{
  echo "Plese Login.";
}
?> 
