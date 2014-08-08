<?php
//Name: Timothy DeVille
//Class: ITEC325
//Assignment: project

//require_once('funcs.php');
Session_Start();
//ini_set('display_errors', True);
//error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New_York');
?>

<script src="./scripts/imageSite.js" type="text/javascript"></script>

<?php
$imgID = '';
$imgLocation = 'Image not found';
$imgTitle = 'Image not found';
$imgOwner = 'None found';
$imgDescr = 'None found';
$liked = false;
$found = false;
$comments = array();
$commentsFound = false;
if(isset($_GET['imgID'])){
  $imgID = $_GET['imgID'];
  $found = true;
  
  $conn = mysqli_connect("localhost", "proj1", ("rtm" . "#db"), "proj1");
  //getting image url
  $qImg = "SELECT location, title, owner, description
          FROM Images
          WHERE ID = '" . $imgID . "';";
  $qResult = mysqli_query($conn ,$qImg);
  
  if($qResult){
    $found = true;
    $resultArray = mysqli_fetch_array($qResult);
    $imgLocation = $resultArray[0];
    $imgTitle = $resultArray[1];
    $imgOwner = $resultArray[2];
    $imgDescr = $resultArray[3];
  }
  
  $qComments = "SELECT User, CommentBody
                FROM Comments
                WHERE Image = " . $imgID . ";";
                
  $qComResult = mysqli_query($conn, $qComments);
  if($qComResult){
    //print("THERE ARE INDEED COMMENTS");
    $commentsFound = true;
    while($commentRow = mysqli_fetch_array($qComResult)){
      //echo($commentRow[0] . $commentRow[1] . "<br>\n");
      //echo("<br><br><br><br><br><br><br><br><br><br><br><br>");
      array_push($comments, $commentRow[0],$commentRow[1]);
    }
  }

  /*
  //THIS IS A WORKING INSERT STATEMENT GUYS
  
  
  $insert = "INSERT INTO Comments (DateTime,User,Image,CommentBody)
             VALUES ( CURRENT_TIMESTAMP() ,  
                     '" . $_SESSION['user'] . "', " .
                     $imgID . ", 
                     'this is a test comment 1');";                     
                     
  mysqli_query($conn,$insert);
  
  */
  
  if((array_key_exists('commentTA',$_POST)) && (isset($_SESSION['user'])) && ($imgID !== '')){
    $insert = "INSERT INTO Comments (DateTime,User,Image,CommentBody) " .
              "VALUES ( CURRENT_TIMESTAMP() , '" . $_SESSION['user'] . "' , " . $imgID . ", '" . $_POST['commentTA'] . "');";
    
    mysqli_query($conn,$insert);
    mysqli_close($conn);
    header(("Location: ./imgpage.php?imgID=" . $_GET['imgID']));
  }
  
  
  if(isset($_SESSION['user']) && ($imgID !== '')){
    $likedQ = "SELECT User " .
              "FROM Likes " . 
              "WHERE User='" . $_SESSION['user'] . "' AND Image=" . $imgID . ";";
              
    $likedQR = mysqli_query($conn, $likedQ);
    
    if($likedQR){
      $likedQRR = mysqli_fetch_array($likedQR);
      if($likedQRR[0] == $_SESSION['user']){
        $liked = true;
      } else {
        $liked = false;
      }
    }
  }
  
  
  
  
  
  mysqli_close($conn);
  
  //echo($insert . "<br>");
  //echo($insert . "<br>");
  
  
  
}
?>


<?php
/*
function like($points){
  echo("grr");
  if(isset($_GET['imgID']) && isset($_SESSION['user'])){
    
    $con = mysqli_connect("localhost", "proj1", ("rtm" . "#db"), "proj1");
    
    if($liked == false){ 
      $rateQ = "INSERT INTO Likes (User, Image, Value) " . 
               "VALUES ('" . $SESSION['user'] . "', '" . $imgID . "', " . $points . ");";

      mysqli_query($con, $insert);
    }
    
    mysqli_close($con);
  }
  
}
*/
?>




<html>

<script type="text/javascript">
function jsLike(){
  window.location = (<?php echo("'./like.php?imgID=" . 
                          $imgID . "&pts=1&user=" . $_SESSION['user'] . "'"); ?>);
}
function jsDislike(){
  window.location = (<?php echo("'./like.php?imgID=" . 
                          $imgID . "&pts=-1&user=" . $_SESSION['user'] . "'"); ?>);
}
</script>


<head>
  <title><?php echo($imgTitle); ?></title>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
</head>

<body>
<div id="main">
 <?php 
 
 /*$content=file_get_contents('./nav.php');
echo $content;*/
 include_once "nav.php";
 include_once "login.php";
	include_once "utils.php";
	

     if(isset($_SESSION['user']) )
	 {

    echo "Hi, ", $_SESSION['user'], ".", "<br />";
    }
   else{
 
   echo "Please Login to have access to the full site";
   }
 
 ?>


  
  <h1><?php echo($imgTitle); ?></h1>
  <h3 align='center'><?php echo($imgOwner); ?></h3>
  <hr>
  
  <table class="imgTable">
    <tr>
      <td>
		<?php if($imgLocation !== 'Image not found'){
            $whatToScale = howToScale(600,600,$imgLocation); 
            echo "<img src=\"$imgLocation\" $whatToScale=\"600\" alt=\"IMAGE NAME\" />";
          } else {
            echo("Image not found");
          }
            
	    ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php if(isset($_SESSION['user']) && $imgID !== ''){
                if($liked == false){
                  echo("<button type='button' onclick='jsLike()'>+1 to image</button>\n" . 
                       "<button type='button' onclick='jsDislike()'>-1 to image</button>\n");
                } else {
                  echo("<p>Image already rated.</p>\n");
                }
              } else {
                if($imgID !== ''){
                  echo("<p>Log in to rate image</p>\n");
                }
              }
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php if($imgDescr !== 'None found'){
                echo("<p>" . $imgDescr . "</p>\n");
              }
        ?>
      </td>
    </tr>
  </table>
  
  <hr>
  
<?php


//print(count($comments));
if(count($comments) > 0){
  echo("<table align='center'><tr><td>\n");
  for($i=0; $i<count($comments); $i=$i+2){
    echo("<table class='comment'>\n");
    echo("  <tr>\n");
    echo("    <td>");
    echo($comments[$i]);
    echo(": </td>\n");
    echo("    <td>");
    echo($comments[$i+1]);
    echo("</td>\n");
    echo("  </tr>\n");
    echo("</table>\n");
    echo("<br>\n");
  }
  echo("</td></tr></table>\n");
}

echo"<hr>\n";

if(isset($_SESSION['user']) && $imgID !== ''){
  require('commentBox.php');
}
?>
  
  
 <?php include_once "footer.php"; ?> 
</body>

<html>
