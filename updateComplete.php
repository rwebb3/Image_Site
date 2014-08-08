<?php
session_start();
//Name: Timothy DeVille
//Class: ITEC325
//Assignment: project

//require_once('funcs.php');
ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');


  $host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);


	$username = $_SESSION['user'];

 if( (!empty($_POST['displayNameU']))) 
 
    {
      //echo $_POST['displayNameU'];
     $displayN =mysql_real_escape_string($_POST['displayNameU']);
	 
	 
	  $DisplayU = "Update Users Set DisplayName = '$displayN' 
	   where Username ='$username'";
	 
	 $result = mysql_query($DisplayU,$connect);
	 
	 }
	 
 if( (!empty($_POST['emailN']))) 
 
    {
	
      //echo $_POST['emailN'];
     $emailU =mysql_real_escape_string($_POST['emailN']);
	 
	 
	  $emailN = "Update Users Set Email = '$emailU' 
	   where Username ='$username'";
	 
	 $result = mysql_query($emailN,$connect);
	 
	 }
	 


 if( (!empty($_POST['passwordU']))) 
 
    {
	
     // echo $_POST['passwordU'];
     $passU =mysql_real_escape_string($_POST['passwordU']);
	 
	 
	  $passN = "Update Users Set Password = '$passU' 
	   where Username ='$username'";
	 
	 $result = mysql_query($passN,$connect);
	 
	 }








?>












<html>

<head>
  <title>User Update  complete</title>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
</head>

<body>
<div id="main">

<?php 
 
 $content=file_get_contents('./nav.php');
 echo $content;
 
 ?>
	

 

  <h1>User Update Conformation</h1>
  
  <hr>

  <table align='center'><tr><td>
    <h1 align='center'>User Succesfully Update his account</h1>
  </td></tr>
  <tr><td><a align='center' href='./index.php'>HOME</a></td></tr>
  </table>
 </div> 
</body>
<?php 	mysql_close($connect)  ?>
</html>
