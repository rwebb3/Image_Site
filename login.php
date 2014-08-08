<?php 
//login php function

//ob_start();
    $host = 'localhost';
	$user = 'proj1'; #account name
	$passwd = 'rtm#db';
	$database = 'proj1';
	$connect = mysql_connect($host,$user,$passwd);
	$db = mysql_select_db($database, $connect);



if(isset($_POST['submitted']) )
{
 if( (!empty($_POST['user'])) && (!empty($_POST['psd'])) )
 
    {
	  
	  $user =mysql_real_escape_string($_POST['user']);
	  $psd =mysql_real_escape_string($_POST['psd']);
	  $qry = "Select * from Users where Username ='$user' and Password ='$psd'";
	  
	  $result = mysql_query($qry,$connect);
	 
	  if(  mysql_fetch_assoc($result))  //if successfull login found
	  {
	     
		  session_start();
		  
		  $_SESSION['user'] = $_POST['user'];
		 
		 header ('Location: welcome.php');
		  exit();
	   }
		 
		else{
		print '<p>Either the  Username or Password or both do not match those on file! Please Try Again. </p>';
		
		}
	}
	else
	{
	print '<p> Please enter both your username and password. Please Try Again. </p>';
	
	}
 }
  
  else  
  {
    // print '<p> Please Login to Have full access to the site! </p>';
  }
  


mysql_close($connect) 
?>



