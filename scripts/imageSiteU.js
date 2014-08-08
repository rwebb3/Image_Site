

/**
 *
 */
function handleRegSubmitU(){
  var wholeValid = true;
  
  //resetErrorRegU();
  
   if((valPasswordU() == false))
   {
   
    wholeValid = false;
  }
  else return true;
  
    if((valConfirmPasswordU() == false))
	
	{
    wholeValid = false;
  }
  else return true;
  
   if((valEmailN()== false))
   {
    wholeValid = false;
  }
  else return true;
  
    if(!(valConfirmEmail())){
    wholeValid = false;
  }
 
  return wholeValid;
}



function showErrorRegU(thingId){
  var target = document.getElementById(thingId);
  if(target !== null){
    target.setAttribute("style","color: red");
  }
}

function resetErrorRegU(){
  document.getElementById("nameUniqueU").setAttribute("style","color: grey");
  document.getElementById("nameMinU").setAttribute("style","color: grey");
  document.getElementById("nameMaxU").setAttribute("style","color: grey");
  document.getElementById("passMinU").setAttribute("style","color: grey");
  document.getElementById("passMaxU").setAttribute("style","color: grey");
  document.getElementById("passDigitU").setAttribute("style","color: grey");
  document.getElementById("passSymbolU").setAttribute("style","color: grey");
  document.getElementById("passMatchU").setAttribute("style","color: grey");
  document.getElementById("uniqueEmailN").setAttribute("style","color: grey");
  document.getElementById("emailCorrectN").setAttribute("style","color: grey");
  document.getElementById("emailConfirmMatchN").setAttribute("style","color: grey");
  document.getElementById("emailConfirmLabelN").setAttribute("style","color: black");
  document.getElementById("emailLabelN").setAttribute("style","color: black");
  document.getElementById("nameLabelU").setAttribute("style","color: black");
  document.getElementById("passLabelU").setAttribute("style","color: black");
  document.getElementById("passConfirmLabelU").setAttribute("style","color: black");
  
  //document.getElementById("").setAttribute("class","greyText");  
}






/**handles the validation of a password
 *
 */
function valPasswordU(){
  var givenPass = document.getElementById("passwordU").value;
  var valid = true;
  
  if(givenPass.length > 0)
  {
     
  if(givenPass.length < 3){
    showErrorRegU("passMinU");
    valid = false;
  }
  
  if(givenPass.length > 15){
    showErrorRegU("passMaxU");
    valid = false;
  }
  if(!(givenPass.match(/\d/))){
    showErrorRegU("passDigitU");
    valid = false;
  }
  if(!(givenPass.match(/[!@#$%^&*()_+]/))){
    showErrorRegU("passSymbolU");
    vaild = false;
  }
  
  }
  
  return valid;
}



/**handles the confirmation of a password
 *
 */
function valConfirmPasswordU(){
  var pass = document.getElementById("passwordU").value;
  var pass2 = document.getElementById("passwordConfirmU").value;
  var valid = true;
  
 
  
  
  if(!(pass == pass2)){
    showErrorRegU("passMatchU");
    valid = false;
  }
  
  
  
  return valid;
}



/**handles validation of an email
 *
 */
 
function valEmailN(){
  var email = document.getElementById("emailN").value;
  var valid = true;
  
  if(email.length == 0){
     //showErrorRegU("emailLabelN");
     valid = false;
  }
  if(!(email.match(/\S+@\S+\.\S+/))){
    showErrorRegU("emailCorrectN");
    vaild = false;
  }
  
  return valid;
}


/**handles the confirmation of an email
 *
 */
 
function valConfirmEmailN(){
  var email = document.getElementById("emailN").value;
  var email2 = document.getElementById("emailConfirmN").value;
  var valid = true;
  
  
  
  if(!(email == email2)){
    showErrorRegU("emailConfirmMatchN");
    valid = false;
  }
  
  return valid;
}










