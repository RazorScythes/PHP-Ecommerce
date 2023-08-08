<?php
 if(!isset($_SESSION)){
    session_start();  
 }
	$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
	$con2 = mysqli_connect('localhost','root','','products') or die("We couldn't connect to the server Please try again.");
	try{
		if(isset($_SESSION['username'])){
			$username = $_SESSION['username'];
			$userDir = "UserData/".$username."/Upload";
			$query = "SELECT * from user WHERE Username = '$username'"; //select the row that match the condition
			$results = mysqli_query($con,$query);
			$row = mysqli_fetch_assoc($results);
			if(isset($_POST['image'])){			
				if (!file_exists($userDir))
					mkdir($userDir);
				else{
					$image = $_POST['image'];
					$picture = $row['Picture'];
					if($picture != '')
						unlink($userDir."/".$picture); //delete the current image uploaded
					if(!empty($image)){
						$image = $_POST['image'];
						$sql = "UPDATE user SET Picture = '$image' WHERE Username = '$username'";
						mysqli_query($con,$sql);
					}
				}
			}
			else if(isset($_POST['Update'])){	
				$fname = mysqli_real_escape_string($con,$_POST['fname']);
				$mname = mysqli_real_escape_string($con,$_POST['mname']);
				$lname = mysqli_real_escape_string($con,$_POST['lname']);
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$dob = mysqli_real_escape_string($con,$_POST['month'] . '-' . $_POST['year'] . '-' . $_POST['day']);
				if($fname == '')
					$fname = $row['First_Name'];
				if($mname == '')
					$mname = $row['Middle_Name'];
				if($lname == '')
					$lname = $row['Last_Name'];
				if($email == '')
					$email = $row['Email'];
				if($dob == '')
					$dob = $row['Birthday'];
				
				$sql = "UPDATE user SET First_Name = '$fname', Middle_Name = '$mname', Last_Name = '$lname', Email = '$email', Birthday = '$dob' WHERE Username = '$username'";
				mysqli_query($con,$sql);
			}
			else if(isset($_POST['delete'])){	
				unlink(delete_directory("UserData/".$username));
				$sql2 = "DELETE FROM cartinfos WHERE Username = '$username'";
				$sql3 = "DELETE from productlist WHERE Seller = '$username'"; //select 
				$sql = "DELETE FROM user WHERE Username = '$username'";
				mysqli_query($con,$sql);
				mysqli_query($con,$sql2);
				mysqli_query($con2,$sql3);
				session_destroy();
				unset($_SESSION['username']);
				header("Location: login.php");
			}
		}
		else{
			throw new Exception("No existing username!");
		}
	}
	catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	//delete folder dir and the files in it.
	function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}
?>