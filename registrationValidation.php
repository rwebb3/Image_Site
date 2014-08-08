<?php
ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');


function test( $act, $exp ) {
  if ($act === $exp) {
    echo "."; //Test passed.
  }
  else {
    echo "Test failed: '$act' !== '$exp'.\n";
  }
}

function valUserName($data){
  $un = $data["userName"];
  $valid = true;
  //unique
  
  //non empty
  if(strlen($un) < 1){
    $valid = false;
    showError("User name must be filled out");
  }
  
  //min 3 characters
  if(strlen($un) < 3){
    $valid = false;
    showError("User name must be at least 3 characters long: " . $un);
  }
  
  //max 15 characters
  if(strlen($un) > 15){
    $valid = false;
    showError("User name must be less than 15 characters long: " . $un);
  }
  
  return $valid;
}


function valPassword($data){
  $pw = $data["password"];
  $valid = true;
  
  //non empty
  if(strlen($pw) < 1){
    $valid = false;
    showError("Password must be filled out");
  }
  
  //min 3 characters
  if(strlen($pw) < 3){
    $valid = false;
    showError("Password must be at least 3 characters long");
  }
  
  //max 15 characters
  if(strlen($pw) > 15){
    $valid = false;
    showError("Password must be less than 15 characters long");
  }
  
  //1 digit
  if(!(preg_match("/\d/",$pw))){
    $valid = false;
    showError("Password must contain at least 1 digit");
  }
  
  //1 symbol
  if(!(preg_match("/[!@#$%^&*()_+]/",$pw))){
    $valid = false;
    showError("password must contain at least 1 symbol (!@#$%^&*()_+)");
  }
  
  return $valid;
}



function valPasswordConfirm($data){
  $pw = $data["password"];
  $pwc = $data["passwordConfirm"];
  $valid = true;
  
  //matches
  if(!($pw == $pwc)){
    $valid = false;
    showError("password missmatch");
  }
  
  return $valid;
}


function valEmail($data){
  $em = $data["email"];
  $valid = true;
  
  //unique
  
  //valid email
  if(!(preg_match("/\S+@\S+\.\S+/",$em))){
    $valid = false;
    showError("Email must have valid format: " . $em);
  }
  
  return $valid;
}


function valEmailConfirm($data){
  $em = $data["email"];
  $emc = $data["emailConfirm"];
  $valid = true;
  
  //match email
  if($em !== $emc){
    $valid = false;
    showError("Email missmatch");
  }
  
  return $valid;
}

function valWholeRegistration($data){
  $valid = true;
  if(valUserName($data) == false){$valid = false;}
  if(valPassword($data) == false){$valid = false;}
  if(valPasswordConfirm($data) == false){$valid = false;}
  if(valEmail($data) == false){$valid = false;}
  if(valEmailConfirm($data) == false){$valid = false;}
  
  return $valid;
}


function showError($message){
  echo("<span class='error'>" . $message . "</span>");
  echo(" <br>");
}

?>