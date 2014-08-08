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

	print "<div id='image_group'>\n";
	$host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);
	
	//get the most popular image
	$SQLcmd = "SELECT id, location FROM `Images` INNER JOIN `Likes` WHERE Images.ID = Likes.Image GROUP BY Images.ID ORDER BY sum(value) desc LIMIT 1";
	$results = mysql_query($SQLcmd, $connect);
	$row = mysql_fetch_array($results);
	$ID = $row['id'];
	$source = $row['location'];
	$whatToScale = howToScale(640,640,$source);
	print "  <div id=\"most_popular\">\n";
    print "   <h2>Most Popular Image This Week</h2>";
	print "   <div class=\"pop_crop\">\n";
	print "   <a href=\"./imgpage.php?imgID=$ID\" >";
	print "    <img src=\"$source\" $whatToScale=\"640\"/>\n";
	print "   </a>";
	print "   </div>\n";
	print "  </div>\n";

	//get the 3 newest images
	$SQLcmd = "SELECT id, location  FROM `Images` ORDER BY `Images`.`DateTime`  DESC LIMIT 3";
	$results = mysql_query($SQLcmd, $connect);
    print "  <div id=\"newest_images\">\n";
	print "   <h2>Newest Images</h2>";
	while ($row=mysql_fetch_array($results)){	
		print "  <div class=\"new_crop\">\n";
		$ID = $row['id'];
		$source = $row['location'];
		$whatToScale = howToScale(200,200,$source);
		print "<a href=\"./imgpage.php?imgID=$ID\" >";
		print "<img src=\"$source\" $whatToScale=\"200\"/>\n";
		print "</a>";
	print "</div>\n";
	}//end while
    print "</div>\n";
	print "</div>\n";
	
    include_once "footer.php";
	?>
   </div>
  </body>
</html>
