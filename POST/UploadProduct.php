<?php
if(!isset($_SESSION)){
   session_start();  
}
	$con = mysqli_connect('localhost','root','','Products') or die("We couldn't connect to the server Please try again.");
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		if(isset($_POST['UploadProduct'])){
			$product = mysqli_real_escape_string($con,$_POST['pname']);
			$desc = mysqli_real_escape_string($con,$_POST['description']);
			$price = mysqli_real_escape_string($con,$_POST['price']);
			$inventory = mysqli_real_escape_string($con,$_POST['inventory']);
			$categ = mysqli_real_escape_string($con,$_POST['category']);
			
			$filetmp = $_FILES["file"]["tmp_name"];
			$filename = $_FILES["file"]["name"];
			$filetype = $_FILES["file"]["type"];
			$filepath = "Images/Product/".$filename;
			move_uploaded_file($filetmp,$filepath);
			
			$query = "INSERT INTO productlist(ProductName,Seller,Description,Price,Category,Image,Inventory)values('$product','$username','$desc','$price','$categ','$filename','$inventory')";
			mysqli_query($con,$query);
		}
	}
	/* OPTIONAL
	echo "<div id='view'>
			<h2>View Products</h2>
			<table id='table'>
				<thead>
					<tr>
						<th id='prodname'>Product Name</th>
						<th id='category'>Category</th>
						<th id='purchased'>Purchased</th>
						<th id='inventory'>Stocks</th>
					</tr>
				</thead>
				<tbody>";
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				$query = "SELECT * FROM productlist WHERE Seller = '$username'";
				$results = mysqli_query($con,$query);	
				$noOFRows = mysqli_num_rows(mysqli_query($con,$query));
				for($num1 = 1; $num1 <= $noOFRows; $num1++){
					$row = mysqli_fetch_array($results);
					$Product = $row['ProductName'];
					$Category = $row['Category'];
					$Purchased = $row['Purchased'];
					$Inventory = $row['Inventory'];
					echo "<tr>";
					echo	"<td>".$Product."</td>";
					echo	"<td>".$Category."</td>";
					echo	"<td>".$Purchased."</td>";
					echo	"<td>".$Inventory."</td>";
					echo "</tr>";
				}
			}
	echo		"<tbody>
			</table>
		  </div>";
	*/
	echo "<div id='manage'>
			<h2>Manage Products</h2>
			<p class='note'>Note: If your product inventory reach 0 below it will not display in the productlist</p>
			<table id='table'>
				<thead>
					<tr>
						<th id='prodname'>Product Name</th>
						<th id='category'>Category</th>
						<th id='purchased'>Purchased</th>
						<th id='inventory'>Stocks</th>
						<th id='action'>Action</th>
					</tr>
				</thead>
				<tbody>";
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				$query = "SELECT * FROM productlist WHERE Seller = '$username'";
				$results = mysqli_query($con,$query);	
				$noOFRows = mysqli_num_rows(mysqli_query($con,$query));
				for($num1 = 1; $num1 <= $noOFRows; $num1++){
					$row = mysqli_fetch_array($results);
					$Product = $row['ProductName'];
					$Category = $row['Category'];
					$Purchased = $row['Purchased'];
					$Inventory = $row['Inventory'];
					echo "<tr>";
					echo	"<td id='productname'>".$Product."</td>";
					echo	"<td>".$Category."</td>";
					echo	"<td>".$Purchased."</td>";
					echo	"<td id='inv'>".$Inventory."</td>";
					echo 	"<td><button type='button' class='btn'>Remove</button></td>";
					echo "</tr>";
				}
			}
	echo		"<tbody>
			</table>
		  </div>";
?>