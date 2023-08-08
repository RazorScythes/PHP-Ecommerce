<?php include('Server.php');?>
<?php
  if(isset($_SESSION['username'])){
	 header("Location: Index.php");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title> Home </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
	<link rel="stylesheet" type="text/css" href="Css/Header.css">
	<link rel="stylesheet" type="text/css" href="Css/Login.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
			<!-- Login Form -->
			<a href="Index.php" class="back">< Back</a>
			<div class="loginbox">
			<img src="Images/Avatar.png" class="Usericon">
			<h1> Login </h1>
			<?php if(isset($valid_error)): ?>
			<span><?php echo $valid_error; ?></span>
			<?php endif ?>
			<?php if(isset($success)): ?>
			<span><?php echo $success; ?></span>
			<?php endif ?>
			<form method="POST" action="Login.php">
				<label>Username</label><br>
				<input type="text" name="user" placeholder="Enter Username" maxlength="30" autocomplete="off">
				<label>Password</label>
				<input type="password" name="psw" placeholder="Enter Password" maxlength="30" autocomplete="off">
				<input type="submit" name="login_user" value="Login">
				<a href="ForgotPassword.php">Forgot Password</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp||&nbsp&nbsp&nbsp&nbsp&nbsp
				<a href="Registration.php">Register</a>
			</form>
			</div>	
</body>
</html>
<script>
	/*
		to prevent a resubmit on refresh and back button.
	*/
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>