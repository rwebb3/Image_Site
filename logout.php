<?php 

//loggout page which unsets the session and login



  session_start(); 
  session_unset();
  session_destroy();
  $params = session_get_cookie_params();
  setcookie( session_name(), '', 1, $params['path'] );







?>

<html>
 <head>
	<title>Logout</title>
	  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
 </head>
 <body>
  <div id="main">
 
   <?php  include_once "nav.php"; ?>
   
 
 
 
 
 



<p style = 'text-align:center'> You have been logged out. </p>





	  <?php include_once "footer.php"; ?>
		
 </div>
 </body>
</html> 