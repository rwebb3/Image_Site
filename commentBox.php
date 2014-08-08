 <table align='center'>
   <tr>
     <td>
       <p>Feel free to comment <?php echo($_SESSION['user']); ?>.</p>
       <p id='commentEmpty'>but be sure to actually fill the comment out</p>
       <form action='imgpage.php?imgID=<?php echo($imgID);?>' method='post'
             onSubmit='return validateComment()'>
         <textarea cols='40' rows='5' name='commentTA' 
                   id='commentTA'/></textarea><br>
         <input type='submit' value='submit comment'>
         <input type='reset'>
       </form>
     </td>
   </tr>
 </table>
 