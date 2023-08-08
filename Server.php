<?php
	session_start();
	$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
	mysqli_select_db($con,'userprofile');
	$success = "";
		if(isset($_POST['Create'])){
			$fname = mysqli_real_escape_string($con,$_POST['firstname']);
			$mname = mysqli_real_escape_string($con,$_POST['middlename']);
			$lname = mysqli_real_escape_string($con,$_POST['lastname']);
			
			$dob = mysqli_real_escape_string($con,$_POST['month'] . '-' . $_POST['year'] . '-' . $_POST['day']);
			$user = mysqli_real_escape_string($con,$_POST['user']);			
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['psw']);
			$confirmpassword = mysqli_real_escape_string($con,$_POST['confpsw']);
			$sql_u = "Select * from user where Username='$user'";
			$sql_e = "Select * from user where Email='$email'";
			$res_u = mysqli_query($con, $sql_u) or die(mysqli_error($con));
			$res_e = mysqli_query($con, $sql_e) or die(mysqli_error($con));
			
			if(mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_e) > 0){
				$valid_error = "Error: Username and Email has already taken.";
			}
			else if(mysqli_num_rows($res_e) > 0){
				$valid_error = "Error: Email already been used.";
			}
			else if(mysqli_num_rows($res_u) > 0){
				$valid_error = "Error: Username already taken.";
			}
			else if($password != $confirmpassword){
				$valid_error = "Error: Password does not match.";
			}
			else{	
				$userDir = "UserData/".$user;
				$userDir2 = "UserData/".$user."/Upload";
				if (!file_exists($userDir))
					mkdir($userDir);
				if (!file_exists($userDir2))
					mkdir($userDir2);
				$encrypt = md5($password);
				$query = "insert into user(First_Name,Middle_Name,Last_Name,Username,Email,Password,Birthday) values ('$fname','$mname','$lname','$user','$email','$encrypt','$dob')";
				$result = mysqli_query($con,$query) or die (mysqli_error($con));
				$success = "Registration success!";
				header("Location: Login.php?$success");
			}
		}
		// LOGIN USER
		if (isset($_POST['login_user'])) {
			$user = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['psw']);
			$sql_u = "Select * from user where Username='$user'";
			$sql_p = "Select * from user where Username='$password'";
			$res_u = mysqli_query($con, $sql_u) or die(mysqli_error($con));
			$res_p = mysqli_query($con, $sql_p) or die(mysqli_error($con));

			$password1 = md5($password);
			$query = "SELECT * FROM user WHERE Username='$user' AND Password='$password1'";
			$results = mysqli_query($con, $query);
			if (mysqli_num_rows($results) == 1) {
			  $username = mysqli_query($con, "Select * from user where Username='$user'");
			  $row = mysqli_fetch_array($username);
			  $_SESSION['username'] = $row['Username'];
			  $_SESSION['success'] = "Success";
			  header('location: index.php');
			}else {
				$valid_error = "Unknown Username and password.";
			}
		}
?>