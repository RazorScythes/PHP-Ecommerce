<?php include('Server.php') ?>
<?php
  if(isset($_SESSION['username'])){
	 header("Location: Index.php");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title> Registration </title>
	<link rel="stylesheet" type="text/css" href="Css/Registration.css">
</head>
<body>
	<div id="container4">
		<div class="registerbox">
		<h1> Create Account </h1>
		<?php if(isset($valid_error)): ?>
			<span><?php echo $valid_error ?></span>
		<?php endif ?>
			<form method="POST" action="Registration.php">
				<label> Full Name </label><br>
				<input type="text" class="Fullname" name="firstname" maxlength="15" autocomplete="off" placeholder="First Name"required>
				<input type="text" class="Fullname" name="middlename" maxlength="15" autocomplete="off" placeholder="Middle Name">
				<input type="text" class="Fullname" name="lastname" maxlength="15" autocomplete="off" placeholder="Last Name" required><br>
				<label> Username </label><br>
				<input type="text" name="user" placeholder="Enter Username" class="EmailandPass" maxlength="30" autocomplete="off" required> 
				<label> Email Address </label><br>
				<input type="email" name="email" placeholder="Enter Email" class="EmailandPass" autocomplete="off" required> 
				<label> Password </label><br>
				<input type="password" name="psw" maxlength="30" placeholder="Password" class="EmailandPass" autocomplete="off" required>
				<label> Confirm Password </label><br>
				<input type="password" name="confpsw" maxlength="30" placeholder="Confirm Password" autocomplete="off" class="EmailandPass" required>
				<label> Birthday </label><br>
				<select name = "month">
				<option value = "month"> Month </option>
				<option value = "January"> January </option>
				<option value = "February"> February </option>
				<option value = "March"> March </option>
				<option value = "April"> April </option>
				<option value = "May"> May </option>
				<option value = "June"> June </option>
				<option value = "July"> July </option>
				<option value = "August"> August </option>
				<option value = "September"> September </option>
				<option value = "October"> October </option>
				<option value = "November"> November </option>
				<option value = "December"> December </option>
				</select>
				<select name = "day">
				<option value = "day"> Day </option>
				<option value = "01"> 01 </option>
				<option value = "02"> 02 </option>
				<option value = "03"> 03 </option>
				<option value = "04"> 04 </option>
				<option value = "05"> 05 </option>
				<option value = "06"> 06 </option>
				<option value = "07"> 07 </option>
				<option value = "08"> 08 </option>
				<option value = "09"> 09 </option>
				<option value = "10"> 10 </option>
				<option value = "11"> 11 </option>
				<option value = "12"> 12 </option>
				<option value = "13"> 13 </option>
				<option value = "14"> 14 </option>
				<option value = "15"> 15 </option>
				<option value = "16"> 16 </option>
				<option value = "17"> 17 </option>
				<option value = "18"> 18 </option>
				<option value = "19"> 19 </option>
				<option value = "20"> 20 </option>
				<option value = "21"> 21 </option>
				<option value = "22"> 22 </option>
				<option value = "23"> 23 </option>
				<option value = "24"> 24 </option>
				<option value = "25"> 25 </option>
				<option value = "26"> 26 </option>
				<option value = "27"> 27 </option>
				<option value = "28"> 28 </option>
				<option value = "29"> 29 </option>
				<option value = "30"> 30 </option>
				<option value = "31"> 31 </option>
				</select>
				<select name = "year">
						<option value = "year"> Year </option>
						<option value = "2000"> 2000 </option>
						<option value = "2001"> 2001 </option>
						<option value = "2002"> 2002 </option>
						<option value = "2003"> 2003 </option>
						<option value = "2004"> 2004 </option>
						<option value = "2005"> 2005 </option>
						<option value = "2006"> 2006 </option>
						<option value = "2007"> 2007 </option>
						<option value = "2008"> 2008 </option>
						<option value = "2009"> 2009 </option>
						<option value = "2010"> 2010 </option>
						<option value = "2011"> 2011 </option>
						<option value = "2012"> 2012 </option>
						<option value = "2013"> 2013 </option>
						<option value = "2014"> 2014 </option>
						<option value = "2015"> 2015 </option>
						<option value = "2016"> 2016 </option>
						<option value = "2017"> 2017 </option>
						<option value = "2018"> 2018 </option>
						<option value = "2019"> 2019 </option>
				</select><br>
				<input type="submit" name="Create" value="Create Account"><br>
				<a href="Login.php">Already have an account? Sign in!</a>		
			</form>	
		</div>
	</div>
</body>
<html>
<script>
	/*
		to prevent a resubmit on refresh and back button.
	*/
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>