<?php
ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');

  echo("<p>attempting to rate...</p>\n");
  
  if((isset($_GET['imgID'])) && (isset($_GET['pts'])) && (isset($_GET['user']))){
    
    $con = mysqli_connect("localhost", "proj1", ("rtm" . "#db"), "proj1");

    $rateQ = "INSERT INTO Likes (User, Image, Value) " . 
             "VALUES ('" . $_GET['user'] . "'," . $_GET['imgID'] . "," . $_GET['pts'] . ");";

    mysqli_query($con,$rateQ);
    
    mysqli_close($con);
    
    
  } else {
    echo("<p>Rating failed</p>\n");
  }
  
  echo("<p>Returning to image page...");
  
  header(("Location: ./imgpage.php?imgID=" . $_GET['imgID']));
?>