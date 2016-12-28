<?php
  session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>SharpSpring Pre-employment Project</title>
	<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
	<meta name="robots" content="index, nofollow" />

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="jscript.js"> </script>
	<link rel="stylesheet" type="text/css" href="sharpSpring.css" />
  </head>


    <body>

<?php
session_unset(); 

session_destroy(); 

echo session_id();
?>


	  <h1> You have successfully logged out!</h1>

    <a href="index.php">Home</a>
	
