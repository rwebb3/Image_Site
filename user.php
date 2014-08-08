<?php 
Session_Start();

  

    $host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);
    $username = $_SESSION['user'];
    //$DisplayU = "Select DisplayName from Users where Username ='$username'";
    $resultU = mysql_query($DisplayU,$connect);
	$DisplayR = mysql_fetch_row($resultU);
	$EmailU = "Select Email from Users where Username ='$username'";
    $resultE = mysql_query($EmailU,$connect);
	$EmailR = mysql_fetch_row($resultE);
	 
?>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">

<html>
 <head>
	<title>User Settings</title>
	  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
	  <script src="./scripts/imageSiteU.js" type="text/javascript"></script>
 </head>
 <body>
  <div id="main">
 <?php 

 /*$content=file_get_contents('./nav.php');
 echo $content;*/
 include_once "nav.php";
 include_once "login.php";
 include_once "utils.php";
     if(isset($_SESSION['user'])){
	   
     // echo "Hi, ", $_SESSION['user'], ".", "<br />";
	include_once"userUpdateBox.php";
	   
    }
   else{
 
   echo "Please Login to have access to the full site";
   }
 
 
 ?>
 
 
  </body>
</html>
