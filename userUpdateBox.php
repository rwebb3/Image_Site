<form action='updateComplete.php' method='post'
        onsubmit='return handleRegSubmitU()'>

  <table class="center">
    <tr>
      <td id="nameLabelU"
          class="alignTopRight" >
        User Name: 
      </td>
      <td class="alignTop">
        <input  id="userNameU"
                type="text" disabled="disabled" maxlength=50 value='<?php echo $_SESSION['user']?>'>
      </td>
	</tr>
    <!--
	<tr>
	   <td id="nameLabelU"
          class="alignTopRight">
        Display Name: 
      </td>
	    <td class="alignTop">
        <input  id="displayNameU" name="displayNameU"
                type="text" maxlength=50 value=' <?php echo $DisplayR[0] ?>'>
      </td>
	 </tr>
     -->
	
    <tr>
    <tr>
      <td id="passLabelU" 
          class="alignTopRight">
       New Password:
      </td>
      <td class="alignTop">
        <input id='passwordU' name='passwordU'
               type="password" maxlength=50>
      </td>
      <td class="greyText">
        <ul>
          <li id="passMinU">minimum 3 characters long</li> 
          <li id="passMaxU">maximum 15 characters</li>
          <li id="passDigitU">at least one digit</li>
          <li id="passSymbolU">at least one symbol (!@#$%^&*()_+)</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id="passConfirmLabelU"
          class="alignTopRight">
        Comfirm Password:
      </td>
      <td class="alignTop">
        <input id="passwordConfirmU" name="passwordConfirmU" 
               type="password" maxlength=50>
      </td>
      <td class="greyText">
       <ul>
          <li id="passMatchU">Must match password</li>
        </ul>
      </td>
    </tr>
	<tr>
	 <td id="emailLabelU"
          class="alignTopRight">
      Current Email:
      </td>
	   <td class="alignTop">
        <input id="emailU" name="emailU"
               type="text" disabled="disabled" maxlength=50 value ='<?php echo $EmailR[0] ?>'>
      </td>
    <tr>
      <td id="emailLabelN"
          class="alignTopRight">
      New Email:
      </td>
      <td class="alignTop">
        <input id="emailN" name="emailN"
               type="text" maxlength=50>
      </td>
      <td class="greyText">
        <ul>
          <li id="uniqueEmailN">Email Must not be tied to another account</li>
          <li id="emailCorrectN">Must have valid email format</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td id = "emailConfirmLabelN"
          class="alignTopRight">
        Confirm Email:
      </td>
      <td class="alignTop">
        <input id="emailConfirmN" name="emailConfirmN"
               type="text" maxlength=50>
      </td>
      <td class="greyText">
        <ul>
          <li id="emailConfirmMatchN">Must match New email</li>
        </ul>
      </td>
    </tr>
  </table>
  
  <br><br>
  
  <table class="center">
    <tr><td>
      <input type="submit" value="Update">
      <input type="reset" value="clear form">
    </td></tr>
  </table>
  </form>
	<?php
    include_once "footer.php";	
	mysql_close($connect) 
	?>
  </div>

