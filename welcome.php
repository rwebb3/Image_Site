<?php 

Session_Start();




?> 

<html>
 <head>
  <title>Welcome </title>
  <link rel="stylesheet" type="text/css" href="./css/imageSite.css">
 </head>

 <body>


<div id ="main">

<?php 

include_once "nav.php";
include_once "utils.php";


?> 

<p style='text-align:center'><?php echo "Welcome back, ", $_SESSION['user'], ".", "<br />"; ?>

</p>
<script>window.location = "index.php"</script>


<?php include_once "footer.php"; ?>
</div>

 </body>
</html>
