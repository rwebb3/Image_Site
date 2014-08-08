<?php
////name: proj1
///pass: RobTimMike$13

session_start();
	

?>

<html>
 <head>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
  <title>homepage</title>
 </head>
  <body>
   <div id="main">
   <?php 
    include_once "login.php";
	include_once "utils.php";
    include_once "nav.php";
	

	/*
	if(isset($_SESSION['user']) ){
	   	echo "Hi, ", $_SESSION['user'], ".", "<br />";
    }
    else{
 		echo "Please Login to have access to the full site";
   }
	 */
	echo "<div id='gallery' />";
	$host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);
	
	//get all images (no more than 100) and display them in a grid 
	$SQLcmd = "SELECT id, location FROM `Images` ORDER BY DateTime desc LIMIT 100";
	$results = mysql_query($SQLcmd, $connect);
	print "   <h2>Gallery of Images</h2>";
	while ($row=mysql_fetch_array($results)){	
		print "  <div class=\"gallery_crop\">\n";
		$ID = $row['id'];
		$source = $row['location'];
		$whatToScale = howToScale(175,175,$source);
		print "<a href=\"./imgpage.php?imgID=$ID\" >";
		print "<img src=\"$source\" $whatToScale=\"175\"/>\n";
		print "</a>";
	print "</div>\n";
	}//end while
    print "</div>\n";
	
    include_once "footer.php";
	?>
   </div>
  </body>
</html>
