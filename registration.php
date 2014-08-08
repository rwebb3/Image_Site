<?php
//Name: Timothy DeVille
//Class: ITEC325
//Assignment: project

//require_once('funcs.php');


  session_start(); 


ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');
?>

<meta http-equiv="Content-type" content="text/html;charset=UTF-8">

<script src="./scripts/imageSite.js" type="text/javascript"></script>

<html>

<head>
  <title>image site Registration</title>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
</head>

<body>
<div id="main">
	
<?php
  //don't let logged on users register
  require('registrationValidation.php');
  
  if ( array_key_exists('i-came-from-form', $_POST) ) {
    if(valWholeRegistration($_POST) == true){
      
      $conn = mysqli_connect("localhost", "proj1", ("rtm" . "#db"), "proj1");
      
      $insert = "INSERT INTO Users (Username,DisplayName,Password,Email)
                 VALUES ( '" . $_POST['userName'] . "' , 'uhh' , '" . 
                               $_POST['password'] . "' , '" .                               
                               $_POST['email'] . "');";                          
      
      
      
      mysqli_query($conn,$insert);    
    
      mysqli_close($conn);
      
      require('registrationComplete.php');
    } else {
      require('registrationBody.php');
    }
  } else {
    require('registrationBody.php');
  }
?>
  

  
</div>

</body>
</html>
