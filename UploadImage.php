<?php
//upload.php
if(!isset($_SESSION)){
    session_start();  
 }
$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
if($_FILES["file"]["name"] != '')
{
	if(isset($_SESSION['username'])){
		 $username = $_SESSION['username'];
		 $test = explode('.', $_FILES["file"]["name"]);
		 $ext = end($test);
		 $img = $_FILES["file"]["name"];
		 $name = $img;
		 $location = "UserData/".$username."/Upload/".$name;  
		 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	}
}
?>