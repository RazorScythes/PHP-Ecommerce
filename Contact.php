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
	<title> Contact </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		<!-- Contact Form -->
		<div id="container2">
			<div class="clear"></div>
			<section class="contact">
				<h1> Contact Us! </h1>
				<h5> If you have any concern about our website, Please fill this form. </h6>
				<form method="POST" action="Contact.php">
					<input type="text" name= "a" placeholder="Name">
					<input type="text" name= "b" placeholder="Email" required>
					<input type="text" name= "c" placeholder="Message" maxlength="200">
					<input type="submit" name="input" value="Lets Talk!">
				</form>
			</section>
		</div>
		
		<!--
			Including the Footer
		-->
		<?php include('Footer.php');?>
	</section>
</body>
</html>
