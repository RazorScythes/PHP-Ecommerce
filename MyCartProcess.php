<?php
if(!isset($_SESSION)){
   session_start();  
}
	$con = mysqli_connect('localhost','root','','products') or die("We couldn't connect to the server Please try again.");
	$con2 = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		if(isset($_POST['products'])){
			$id = $_POST['id'];
			$buyer = $_POST['buyer'];
			$product = $_POST['products'];
			$seller = $_POST['sliced'];
			$price = $_POST['intconvert'];
			$sql = "SELECT * FROM productlist WHERE Seller = '$seller' AND ProductName= '$product' AND Price = '$price'";
			$sql2 = "SELECT * FROM cartinfos WHERE Username = '$buyer' AND ProductName= '$product'";
			$results = mysqli_query($con,$sql);
			$results2 = mysqli_query($con2,$sql2);
			$row = mysqli_fetch_assoc($results);
			$row2 = mysqli_fetch_assoc($results2);
			if(mysqli_num_rows($results2) > 0){
				$quantity = 1 + $row2['Quantity'];
				$query = "UPDATE cartinfos set Quantity = '$quantity' WHERE Username = '$buyer' AND ProductName= '$product' AND Price = '$price'";
				mysqli_query($con2,$query);
			}
			else{
				$category = $row['Category'];
				$query = "INSERT INTO cartinfos(ID,ProductName,Seller,Category,Quantity,Price,Username) values ('$id','$product','$seller','$category','1','$price','$username')"; //select the row that match the condition
				mysqli_query($con2,$query);
			}
		}
		if(isset($_POST['product'])){
			$buyer = $_POST['buyer'];
			$product = $_POST['product'];
			$seller = $_POST['seller'];
			$costconv = $_POST['costconv'];
			$query = "DELETE FROM cartinfos WHERE Username = '$buyer' AND ProductName= '$product' AND Price = '$costconv'";
			mysqli_query($con2,$query);
		}
		if(isset($_POST['quantityconv'])){
			$buyer = $_POST['buyer'];
			$product = $_POST['product'];
			$seller = $_POST['seller'];
			$quantityconv = $_POST['quantityconv'];
			$sql = "SELECT * FROM productlist WHERE Seller = '$seller' AND ProductName= '$product'";
			$results = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($results);
			$inventory = $row['Inventory'] - $quantityconv;
			$purchased = $row['Purchased'] + $quantityconv;
			$update = "UPDATE productlist SET Purchased = '$purchased', Inventory = '$inventory' WHERE Seller = '$seller' AND ProductName = '$product'";
			mysqli_query($con,$update);
			$query = "DELETE FROM cartinfos WHERE Username = '$buyer' AND ProductName= '$product'";
			mysqli_query($con2,$query);
		}
	}
?>