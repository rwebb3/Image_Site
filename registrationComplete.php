<?php
//Name: Timothy DeVille
//Class: ITEC325
//Assignment: project

//require_once('funcs.php');
ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');
?>

<script src="./scripts/imageSite.js" type="text/javascript"></script>

<html>

<head>
  <title>image site Registration complete</title>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
</head>

<body>
<div id="main">

<?php 
 
 $content=file_get_contents('./nav.php');
 echo $content;
 
 ?>
	

 

  <h1>Image Site Registration Conformation</h1>
  
  <hr>

  <table align='center'><tr><td>
    <h1 align='center'>Congratulations! You're registered.</h1>
  </td></tr>
  <tr><td><a align='center' href='./index.php'>HOME</a></td></tr>
  </table>
 </div> 
</body>
</html>
