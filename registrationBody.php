<?php
ini_set('display_errors', True);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');
?>









<div id="main">

  <h1>Image Site Registration</h1>
  
  <hr>
  
  <form action='registration.php' method='post'
        onsubmit='return handleRegSubmit()'>
  <!-- i removed (onsubmit='return handleRegSubmit()') and need to put it back -->
  
  
  <table class="center">
    <tr>
      <td id="nameLabel"
          class="alignTopRight">
        User Name: 
      </td>
      <td class="alignTop">
        <input  id="userName" name="userName" 
                type="text" maxlength=50
                <?php if(array_key_exists('userName',$_POST)){
                  echo("value='" . htmlspecialchars($_POST['userName']) . "'");} ?>>
      </td>
      <td class="greyText">
        <ul>
          <li id="nameUnique">Name must not already be taken</li>
          <li id="nameMin">minimum 3 characters long</li> 
          <li id="nameMax">maximum 15 characters</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id="passLabel" 
          class="alignTopRight">
        Password:
      </td>
      <td class="alignTop">
        <input id="password" name="password"
               type="password" maxlength=50
               <?php if(array_key_exists('password',$_POST)){
                  echo("value='" . htmlspecialchars($_POST['password']) . "'");} ?>>
      </td>
      <td class="greyText">
        <ul>
          <li id="passMin">minimum 3 characters long</li> 
          <li id="passMax">maximum 15 characters</li>
          <li id="passDigit">at least one digit</li>
          <li id="passSymbol">at least one symbol (!@#$%^&*()_+)</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id="passConfirmLabel"
          class="alignTopRight">
        Confirm Password:
      </td>
      <td class="alignTop">
        <input id="passwordConfirm" name="passwordConfirm"
               type="password" maxlength=50
               <?php if(array_key_exists('passwordConfirm',$_POST)){
                  echo("value='" . htmlspecialchars($_POST['passwordConfirm']) . "'");} ?>>
      </td>
      <td class="greyText">
       <ul>
          <li id="passMatch">Must match password</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id="emailLabel"
          class="alignTopRight">
        Email:
      </td>
      <td class="alignTop">
        <input id="email" name="email"
               type="text" maxlength=50
               <?php if(array_key_exists('email',$_POST)){
                  echo("value='" . htmlspecialchars($_POST['email']) . "'");} ?>>
      </td>
      <td class="greyText">
        <ul>
          <li id="uniqueEmail">Email Must not be tied to another account</li>
          <li id="emailCorrect">Must have valid email format</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id = "emailConfirmLabel"
          class="alignTopRight">
        Confirm Email:
      </td>
      <td class="alignTop">
        <input id="emailConfirm" name="emailConfirm"
               type="text" maxlength=50
               <?php if(array_key_exists('emailConfirm',$_POST)){
                  echo("value='" . htmlspecialchars($_POST['emailConfirm']) . "'");} ?>>
      </td>
      <td class="greyText">
        <ul>
          <li id="emailConfirmMatch">Must match email</li>
        </ul>
      </td>
    </tr>
  </table>
  
  <br><br>
  
  <table class="center">
    <tr><td>
      <input type="submit" value="submit">
      <input type="reset" value="clear form">
    </td></tr>
  </table>
  
  <input type="hidden" name="i-came-from-form" value="true" />
  
  </form>
  
</div>
