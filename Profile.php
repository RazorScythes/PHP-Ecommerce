<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if(!isset($_SESSION['username'])){
	  header("Location: Index.php");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Profile </title>
<link rel="stylesheet" type="text/css" href="Css/Main.css">	
<link rel="stylesheet" type="text/css" href="Css/Profile.css">
<script src="Js/jquery.min.js"></script>
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		<!-- Getting all the information of the user and can modify it's info-->
		<div id="container2">
			<div class="clear"></div>
			<div id="profileBox">
				<?php include('ProfileData.php');?>
				<p id="success"></p>
				<?php
					$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
					if(isset($_SESSION['username'])){
							$username = $_SESSION['username'];
							$query = "SELECT * from user WHERE Username = '$username'";
							$results = mysqli_query($con,$query);
							$row = mysqli_fetch_assoc($results);
								$user = $row['Username'];
								$image = $row['Picture'];
								$fn = $row['First_Name'];
								$ln = $row['Last_Name'];
							echo "<img id='uploadImage' src='UserData/".$username."/Upload/".$image."'/>";
							echo "<p id='fullName'>".$fn." ".$ln."</p>";
					}
					else{
							echo "<img id='uploadImage'/>
								  <p id='fullName'></p>";
					}
				?>
					<input type='file' name='file' id='file' accept='image/x-png,image/gif,image/jpeg' onchange="viewImage(event)" style='display:none;'/>
					<label for='file'><i class='fa fa-camera' aria-hidden='true'></i><br>Upload Image</label>
					<input type='submit' style='position: absolute; left: -9999px; width: 1px; height: 1px;' tabindex='-1' />
				<button onclick="profile()">Profile</button>
				<button onclick="updateProfile()">Update Profile</button>
				<button onclick="changePassword()">Change Password</button>
				<button onclick="deleteAccount()">Delete Account</button>
				<button><a href="index.php?logout='1'">Logout</a></button>
			</div>
			<div id="Info">
				<?php
					$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
					if(isset($_SESSION['username'])){
						$username = $_SESSION['username'];
						$query = "SELECT * from user WHERE Username = '$username'";
						$results = mysqli_query($con,$query);
						
						$row = mysqli_fetch_assoc($results);
						$user = $row['Username'];
						$fullname = $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
						$dob = $row['Birthday'];
						$email = $row['Email'];
						echo "<div id='con1'>";
						echo "<h1 class='title'>Profile</h1>";
						echo "<p class='details'>Full Name: ".$fullname."</p>";
						echo "<p class='details'>Username: ".$user."</p>";
						echo "<p class='details'>Email: ".$email."</p>";
						echo "<p class='details'>Birthday: ".$dob."</p>";
						echo "</div>";
					}
				?>
				<div id="con2">
					<h1 class="title">Update</h1>
					<form method="POST" action="Profile.php">
						<label>First Name: </label><input type="text" name="fname" maxlength="15" autocomplete="off" >
						<label>Middle Name: </label><input type="text" name="mname" maxlength="15" autocomplete="off">
						<label>Last Name: </label><input type="text" name="lname" maxlength="15" autocomplete="off">
						<label>Email: </label><input type="email" name="email" class="email" maxlength="30" autocomplete="off"><br>
						<label class="Birthday"> Birthday </label><br><br><br>
						<select name = "month">
						<option value = "January"> Month </option>
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
						<option value = "01"> Day </option>
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
						<option value = "2000"> Year </option>
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
						</select>
						<input type="submit" class="update" name="Update" value="Save Changes"><br>
					</form>
				</div>
				<div id="con3">
					<h2>Change Password</h2>
					<form method="POST" action="Profile.php">
						<label>Current Password: </label><input type="password" name="current" autocomplete="off" required/>
						<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNew Password: </label><input type="password" name="current" autocomplete="off" required/>
						<label>Confirm Password: </label><input type="password" name="current" autocomplete="off" required/>
						<input type="submit" name="changepass" class="changepass" value="Confirm" disabled/>
					</form>
				</div>
				<div id="con4">
					<h2> DELETE ACCOUNT </h2>
					<p> All your images and information will be deleted permanently </p>
					<form method="POST" action="Profile.php">
						<input type="submit" name="delete" class="delete" value="Confirm"/>
					</form>
				</div>
			</div>
		</div>	
		
		<!--
			Including the Footer
		-->
		<?php include('Footer.php');?>
</section>
</body>
</html>
<script src="Js/Profilequery.js"></script>