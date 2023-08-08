<?php
if(!isset($_SESSION)){
   session_start();  
}
	$con = mysqli_connect('localhost','root','','products') or die("We couldn't connect to the server Please try again.");
	$con2 = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		if(isset($_POST['product'])){
			$product = $_POST['product'];
			$inventory = $_POST['inventory'];
			$query = "DELETE from productlist WHERE Seller = '$username' AND ProductName = '$product' AND Inventory = '$inventory'"; //select the row that match the condition
			$query2 = "DELETE from cartinfos WHERE Seller = '$username' AND ProductName = '$product'"; //select the row that match the condition
			mysqli_query($con,$query);
			mysqli_query($con2,$query2);
		}
	}
?>
