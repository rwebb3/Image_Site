<?php 
//ob_start();

Session_Start();
$userName = $_SESSION['user'];


?>



	<link rel="stylesheet" type="text/css" href="./css/imageSite.css"> 
    <div id = 'nav'>
	 <div id = 'left'>
	  Image Site
	 </div>
	 <div id ="right">
	   <a href="index.php">Homepage</a>
	   <a href="upload.php">Upload</a>
       <a href="gallery.php">Image Gallery</a>
	   <a href="user.php">User Settings</a>
	    <a href="logout.php">Logout</a>
	  </div>
	    <form  method="post">
     
	 <?php
       if($userName == NULL){
          include_once("loginBox.php");
      }
     ?>
	   
	   </form>
	  
	</div>
    <hr id ='hrN'/>
	
	<?php //print(ob_end_clean()); ?>
