<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title> Features </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		
		<div id="container2">
			<div class="notFoundDisplay">
				<h3> Sorry, this page is not available yet.</h3>
			</div>	
			<div class="clear"></div>
		</div>
		
		<!--
			Including the Footer
		-->
		<?php include('Footer.php');?>
	</section>
</body>
</html>