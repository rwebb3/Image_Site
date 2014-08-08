<?php 

session_start();


?>

<html>
 <head>
	<link rel="stylesheet" type="text/css" href="./css/imageSite.css"/>
	<title>Upload</title>
 </head>
 <body>
  <div id="main">
 <?php 
	include_once "nav.php";
	include_once "login.php";
	include_once "utils.php";

    if(isset($_SESSION['user']) ){
    	echo "Hi, ", $_SESSION['user'], ".", "<br />";
    	include_once "uploadBox.php";
    }
    else{
		echo "Please Login to have access to the full site";
	}

	include_once "footer.php";
 ?>
   </div> 
  </body>
</html>
