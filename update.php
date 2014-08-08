<?php //update 







//ob_start();
    $host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);


	$username = $_SESSION['user'];

if(isset($_POST['submittedU']) )
{
 if( (!empty($_POST['displayNameU']))) 
 
    {

     $displayN =mysql_real_escape_string($_POST['displayNameU']);
	 
	 
	  $DisplayU = "Update Users Set DisplayName = '$displayN' 
	   where Username ='$username'";
	 
	 $result = mysql_query($DisplayU,$connect);
	 
	 }
	 
}






	mysql_close($connect) 



?>