 <div id='upload'>
  <p>
   Browse your computer for an image.
  </p>
  <form action="upload_image.php" method="post"
   enctype="multipart/form-data">
   <table>
	<tr>
     <td><label for="title">Image Title:</label></td>
     <td><input type="input" name="title" id="title"></td>
    </tr>
    <tr>
     <td><label for="file">Filename:</label></td>
     <td><input type="file" name="file" id="file"></td>
    </tr>
    <tr>
     <td colspan="2"><textarea name="desc" cols="38" rows="5" placeholder="Enter Description..."></textarea>
    <tr>
     <td><input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
  </form>
  </div>
