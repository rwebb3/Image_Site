

function validateComment(){
  var target = document.getElementById('commentTA').value;
  var valid = true;
  if(target.length == 0){ valid = false; }
  if(valid == false){
    document.getElementById('commentEmpty').setAttribute("style","color: red");
  } else {
    document.getElementById('commentEmpty').setAttribute("style","color: black");
  }
  return valid;
}


/**
 *
 */
function handleRegSubmit(){
  var wholeValid = true;
  
  resetErrorReg();
  
  if(!(valUserName())){
    wholeValid = false;
  }
  
  if(!(valPassword())){
    wholeValid = false;
  }
  if(!(valConfirmPassword())){
    wholeValid = false;
  }
  
  if(!(valEmail())){
    wholeValid = false;
  }
  if(!(valConfirmEmail())){
    wholeValid = false;
  }
  
  return wholeValid;
}



function showErrorReg(thingId){
  var target = document.getElementById(thingId);
  if(target !== null){
    target.setAttribute("style","color: red");
  }
}

function resetErrorReg(){
  document.getElementById("nameUnique").setAttribute("style","color: grey");
  document.getElementById("nameMin").setAttribute("style","color: grey");
  document.getElementById("nameMax").setAttribute("style","color: grey");
  document.getElementById("passMin").setAttribute("style","color: grey");
  document.getElementById("passMax").setAttribute("style","color: grey");
  document.getElementById("passDigit").setAttribute("style","color: grey");
  document.getElementById("passSymbol").setAttribute("style","color: grey");
  document.getElementById("passMatch").setAttribute("style","color: grey");
  document.getElementById("uniqueEmail").setAttribute("style","color: grey");
  document.getElementById("emailCorrect").setAttribute("style","color: grey");
  document.getElementById("emailConfirmMatch").setAttribute("style","color: grey");
  document.getElementById("emailConfirmLabel").setAttribute("style","color: black");
  document.getElementById("emailLabel").setAttribute("style","color: black");
  document.getElementById("nameLabel").setAttribute("style","color: black");
  document.getElementById("passLabel").setAttribute("style","color: black");
  document.getElementById("passConfirmLabel").setAttribute("style","color: black");
  
  //document.getElementById("").setAttribute("class","greyText");  
}



/**handles the validation of a userName
 *
 */ 
function valUserName(){
  var givenUN = document.getElementById("userName").value;
  var valid = true;
  
  if(givenUN.length == 0){
    showErrorReg("nameLabel");
    valid = false;
  }
  if(givenUN.length < 3){
    valid = false;
    showErrorReg("nameMin");
  }
  if(givenUN.length > 15){
    valid = false;
    showErrorReg("nameMax");
  }
  
  return valid;
  
}



/**handles the validation of a password
 *
 */
function valPassword(){
  var givenPass = document.getElementById("password").value;
  var valid = true;
  
  if(givenPass.length == 0){
    showErrorReg("passLabel");
    valid = false;
  }
  if(givenPass.length < 3){
    showErrorReg("passMin");
    valid = false;
  }
  if(givenPass.length > 15){
    showErrorReg("passMax");
    valid = false;
  }
  if(!(givenPass.match(/\d/))){
    showErrorReg("passDigit");
    valid = false;
  }
  if(!(givenPass.match(/[!@#$%^&*()_+]/))){
    showErrorReg("passSymbol");
    vaild = false;
  }
  
  return valid;
}



/**handles the confirmation of a password
 *
 */
function valConfirmPassword(){
  var pass = document.getElementById("password").value;
  var pass2 = document.getElementById("passwordConfirm").value;
  var valid = true;
  
  if(pass2.length == 0){
    showErrorReg("passConfirmLabel");
    valid = false;
  }
  
  if(!(pass == pass2)){
    showErrorReg("passMatch");
    valid = false;
  }
  
  return valid;
}



/**handles validation of an email
 *
 */
 //shoot there needs to be more info on email.
function valEmail(){
  var email = document.getElementById("email").value;
  var valid = true;
  
  if(email.length == 0){
     showErrorReg("emailLabel");
     valid = false;
  }
  if(!(email.match(/\S+@\S+\.\S+/))){
    showErrorReg("emailCorrect");
    vaild = false;
  }
  
  return valid;
}


/**handles the confirmation of an email
 *
 */
function valConfirmEmail(){
  var email = document.getElementById("email").value;
  var email2 = document.getElementById("emailConfirm").value;
  var valid = true;
  
  if(email2.length == 0){
    showErrorReg("emailConfirmLabel");
    valid = false;
  }
  
  if(!(email == email2)){
    showErrorReg("emailConfirmMatch");
    valid = false;
  }
  
  return valid;
}

/* check image dimensions to determain how to scale it
 * @param dX the desired X dimension
 * @param dY the desired Y dimension
 * @param source the image source to check
 * @return what to scale by (Width or Height)
 * by rwebb3
 */
function howToScale(dX, dY, source){
	var targetAspect = dX/dY;
	var img = new Image();
		img.src = source;
	var imgAspect = img.width/img.height;
	if (imgAspect > targetAspect){
		return "height";}
	else{
		return "width";}
}












